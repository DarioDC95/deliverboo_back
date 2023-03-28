<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'p_iva' => ['required', 'numeric', 'digits:11'],
            'cover_path' => ['nullable', 'max:65535'],
            'address' => ['required', 'max:255'],
            'types' => ['required', 'exists:types,id'],
        ];
    }

    public function messages()
    {
        return [
            'p_iva.required' => 'la P.Iva è obbligatoria',
            'p_iva.numeric' => 'La P.Iva deve essere composta da valori numerici',
            'p_iva.digits' => 'La P.Iva deve essere lunga esattamente 11 caratteri',
            'address.required' => 'L\'indirizzo è obbligatorio',
            'address.max' => 'L\'indirizzo deve avere al massimo :max caratteri',
            'types.exists' => 'Seleziona una tipologia valida',
        ];
    }
}
