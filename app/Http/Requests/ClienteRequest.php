<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
        $clienteId = $this->route('cliente')?->id;
 
        return [
            'nombre'    => ['required', 'string', 'max:255'],
            'cedula'    => ['required', 'string', 'max:20', "unique:clientes,cedula,{$clienteId}"],
            'email'     => ['required', 'email', 'max:255', "unique:clientes,email,{$clienteId}"],
            'telefono'  => ['required', 'string', 'max:20'],
            'direccion' => ['required', 'string', 'max:500'],
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
        ];
    }
}
