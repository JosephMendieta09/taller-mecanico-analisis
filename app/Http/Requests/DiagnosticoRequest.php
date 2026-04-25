<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosticoRequest extends FormRequest
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
            'vehiculo_id' => ['required', 'exists:vehiculos,id'],
            'descripcion' => ['required', 'string', 'max:1000'],
            'estado'      => ['required', 'in:Pendiente,En proceso,Completado'],
        ];
    }

    public function messages(): array
    {
        return [
            'vehiculo_id.required' => 'Debes seleccionar un vehículo.',
            'vehiculo_id.exists'   => 'El vehículo seleccionado no existe.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'estado.required'      => 'El estado es obligatorio.',
            'estado.in'            => 'El estado seleccionado no es válido.',
        ];
    }
}
