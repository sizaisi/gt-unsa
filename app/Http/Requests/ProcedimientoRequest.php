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
            'idgradomodalidad' => 'required',             
            'idrol' => 'required', 
            'tipo_rol' => 'required',  
            'url_formulario' => 'required|max:250',
            'orden' => 'required',
            'descripcion' => 'required|max:250',
        ];
    }

    public function messages()
    {
        return [
            'idgradomodalidad.required' => 'El campo grado-modalidad es obligatorio.',            
            'idrol.required' => 'El campo rol es obligatorio.',            
        ];
    }
}
