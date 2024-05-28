<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnuncioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo'    => ['required', 'min:5'],
            'cidade'    => ['required'],
            'precotipo' => ['required'],
            'preco'     => ['required'],
            'anuncio'   => ['required', 'min:5'],
            'fotos.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ];
    }
}
