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
            'name' => ['required', 'max:100'],
            'p_iva' => ['required', 'max:20'],
            'cover_path' => ['required', 'max:65535'],
            'address' => ['required', 'max:255'],
            'types' => ['nullable', 'exists:types,id'],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il nome deve avere al massimo :max caratteri',
            'p_iva.required' => 'la P.Iva è obbligatoria',
            'p_iva.max' => 'La P.Iva deve avere al massimo :max caratteri',
            'cover_path.required' => 'l\'immagine è obbligatoria',
            'cover_path.max' => 'Il path dell\'immagine non è valido',
            'address.required' => 'L\'indirizzo è obbligatorio',
            'address.max' => 'L\'indirizzo deve avere al massimo :max caratteri',
            'types.exists' => 'Seleziona una tipologia valida',

        ];
    }
}
