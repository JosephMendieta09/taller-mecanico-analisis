<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepuestoRequest extends FormRequest
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
            'nombre'          => ['required', 'string', 'max:255'],
            'precio_unitario' => ['required', 'numeric', 'min:0'],
            'stock_actual'    => ['required', 'integer', 'min:0'],
            'stock_minimo'    => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'          => 'El nombre es obligatorio.',
            'precio_unitario.required' => 'El precio unitario es obligatorio.',
            'precio_unitario.numeric'  => 'El precio unitario debe ser un número.',
            'precio_unitario.min'      => 'El precio unitario no puede ser negativo.',
            'stock_actual.required'    => 'El stock actual es obligatorio.',
            'stock_actual.integer'     => 'El stock actual debe ser un número entero.',
            'stock_actual.min'         => 'El stock actual no puede ser negativo.',
            'stock_minimo.required'    => 'El stock mínimo es obligatorio.',
            'stock_minimo.integer'     => 'El stock mínimo debe ser un número entero.',
            'stock_minimo.min'         => 'El stock mínimo no puede ser negativo.',
        ];
    }
}
