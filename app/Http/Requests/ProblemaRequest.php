<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProblemaRequest extends FormRequest
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
            'descripcion' => ['required', 'string', 'max:500'],
            'categoria'   => ['required', 'string', 'max:100'],
            'gravedad'    => ['required', 'in:Leve,Moderado,Grave'],
        ];
    }

    public function messages(): array
    {
        return [
            'descripcion.required' => 'La descripción es obligatoria.',
            'categoria.required'   => 'La categoría es obligatoria.',
            'gravedad.required'    => 'La gravedad es obligatoria.',
            'gravedad.in'          => 'La gravedad seleccionada no es válida.',
        ];
    }
}
