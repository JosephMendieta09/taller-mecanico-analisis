<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MecanicoRequest extends FormRequest
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
        $mecanicoId = $this->route('mecanico')?->id;
 
        return [
            'nombre'    => ['required', 'string', 'max:255'],
            'cedula'    => ['required', 'string', 'max:20', "unique:mecanicos,cedula,{$mecanicoId}"],
            'email'     => ['required', 'email', 'max:255', "unique:mecanicos,email,{$mecanicoId}"],
            'telefono'  => ['required', 'string', 'max:20'],
            'direccion' => ['required', 'string', 'max:500'],
            'estado'    => ['required', 'in:disponible,ocupado'],
        ];
    }
 
    public function messages(): array
    {
        return [
            'nombre.required'    => 'El nombre es obligatorio.',
            'cedula.required'    => 'La cédula es obligatoria.',
            'cedula.unique'      => 'Esta cédula ya está registrada.',
            'email.required'     => 'El correo es obligatorio.',
            'email.email'        => 'El correo no tiene un formato válido.',
            'email.unique'       => 'Este correo ya está registrado.',
            'telefono.required'  => 'El teléfono es obligatorio.',
            'direccion.required' => 'La dirección es obligatoria.',
            'estado.required'    => 'El estado es obligatorio.',
            'estado.in'          => 'El estado debe ser disponible u ocupado.',
        ];
    }
}
