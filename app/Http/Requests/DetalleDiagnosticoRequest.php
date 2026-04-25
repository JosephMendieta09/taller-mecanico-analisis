<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleDiagnosticoRequest extends FormRequest
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
            'problema_id'    => ['required', 'exists:problemas,id'],
            'observacion'    => ['required', 'string', 'max:1000'],
            'prioridad'      => ['required', 'in:Baja,Media,Alta'],
        ];
    }

    public function messages(): array
    {
        return [
            'diagnostico_id.required' => 'Debes seleccionar un diagnóstico.',
            'diagnostico_id.exists'   => 'El diagnóstico seleccionado no existe.',
            'problema_id.required'    => 'Debes seleccionar un problema.',
            'problema_id.exists'      => 'El problema seleccionado no existe.',
            'observacion.required'    => 'La observación es obligatoria.',
            'prioridad.required'      => 'La prioridad es obligatoria.',
            'prioridad.in'            => 'La prioridad seleccionada no es válida.',
        ];
    }
}
