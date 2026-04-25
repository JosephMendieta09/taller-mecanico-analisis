<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
        $vehiculoId = $this->route('vehiculo')?->id;
 
        // La acción assign-cliente solo necesita cliente_id
        if ($this->routeIs('vehiculos.assign-cliente.store')) {
            return [
                'cliente_id' => ['required', 'exists:clientes,id'],
            ];
        }
 
        return [
            'cliente_id'  => ['nullable', 'exists:clientes,id'],
            'placa'       => ['required', 'string', 'max:20', "unique:vehiculos,placa,{$vehiculoId}"],
            'marca'       => ['required', 'string', 'max:100'],
            'modelo'      => ['required', 'string', 'max:100'],
            'color'       => ['required', 'string', 'max:50'],
            'kilometraje' => ['required', 'numeric', 'min:0'],
        ];
    }
 
    public function messages(): array
    {
        return [
            'cliente_id.required'  => 'Debes seleccionar un cliente.',
            'cliente_id.exists'    => 'El cliente seleccionado no existe.',
            'placa.required'       => 'La placa es obligatoria.',
            'placa.unique'         => 'Esta placa ya está registrada.',
            'marca.required'       => 'La marca es obligatoria.',
            'modelo.required'      => 'El modelo es obligatorio.',
            'color.required'       => 'El color es obligatorio.',
            'kilometraje.required' => 'El kilometraje es obligatorio.',
            'kilometraje.numeric'  => 'El kilometraje debe ser un número.',
            'kilometraje.min'      => 'El kilometraje no puede ser negativo.',
        ];
    }
}
