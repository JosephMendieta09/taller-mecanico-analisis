<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleRepuestoRequest extends FormRequest
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
            'orden_trabajo_id' => ['required', 'exists:orden_trabajos,id'],
            'repuesto_id'      => ['required', 'exists:repuestos,id'],
            'fecha'            => ['required', 'date'],
            'cantidad'         => ['required', 'integer', 'min:1'],
            // monto se calcula en el controlador, no se valida desde el form
        ];
    }

    public function messages(): array
    {
        return [
            'orden_trabajo_id.required' => 'Debes seleccionar una orden de trabajo.',
            'orden_trabajo_id.exists'   => 'La orden de trabajo seleccionada no existe.',
            'repuesto_id.required'      => 'Debes seleccionar un repuesto.',
            'repuesto_id.exists'        => 'El repuesto seleccionado no existe.',
            'fecha.required'            => 'La fecha es obligatoria.',
            'fecha.date'                => 'La fecha no es válida.',
            'cantidad.required'         => 'La cantidad es obligatoria.',
            'cantidad.integer'          => 'La cantidad debe ser un número entero.',
            'cantidad.min'              => 'La cantidad debe ser al menos 1.',
        ];
    }
}
