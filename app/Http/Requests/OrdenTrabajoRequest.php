<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenTrabajoRequest extends FormRequest
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
            'diagnostico_id' => ['required', 'exists:diagnosticos,id'],
            'fecha_inicio'   => ['required', 'date'],
            'fecha_final'    => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'notas'          => ['required', 'string', 'max:1000'],
            'costo'          => ['required', 'numeric', 'min:0'],
            'estado'         => ['required', 'in:Pendiente,En proceso,Completado'],
        ];
    }

    public function messages(): array
    {
        return [
            'diagnostico_id.required'  => 'Debes seleccionar un diagnóstico.',
            'diagnostico_id.exists'    => 'El diagnóstico seleccionado no existe.',
            'fecha_inicio.required'    => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date'        => 'La fecha de inicio no es válida.',
            'fecha_final.required'     => 'La fecha final es obligatoria.',
            'fecha_final.date'         => 'La fecha final no es válida.',
            'fecha_final.after_or_equal' => 'La fecha final debe ser igual o posterior a la fecha de inicio.',
            'notas.required'           => 'Las notas son obligatorias.',
            'costo.required'           => 'El costo es obligatorio.',
            'costo.numeric'            => 'El costo debe ser un número.',
            'costo.min'                => 'El costo no puede ser negativo.',
            'estado.required'          => 'El estado es obligatorio.',
            'estado.in'                => 'El estado seleccionado no es válido.',
        ];
    }
}
