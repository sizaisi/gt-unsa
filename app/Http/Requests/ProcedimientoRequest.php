<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcedimientoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required:max:150',
            'idtramite' => 'required',             
            'idrol' => 'required',             
            'componente' => 'required|max:250',
            'orden' => 'required',
            'descripcion' => 'required|max:250',
        ];
    }

    public function messages()
    {
        return [
            'idtramite.required' => 'El campo trámite es obligatorio.',            
            'idrol.required' => 'El campo rol es obligatorio.',            
        ];
    }
}
