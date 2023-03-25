<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            'name' => ['required', 'max:50'],
            'description' => ['nullable', 'max:65535'],
            'ingredients' => ['required', 'max:65535'],
            'image_path' => ['required', 'max:65535'],
            'price' => ['required','between:0,99.99', 'decimal:0,2'],
            'visible' => ['required', 'boolean'],
            'vegetarian' => ['nullable', 'boolean'],
            'vegan' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il nome deve avere al massimo :max caratteri',
            'ingredients.required' => 'Gli ingredienti sono obbligatori',
            'image_path.required' => 'l\'immagine è obbligatoria',
            'image_path.max' => 'Il path dell\'immagine non è valido',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.decimal' => 'Il prezzo deve avere al massimo :decimal numeri',
            'visible.required' => 'Visibilità richiesta',

        ];
    }
}
