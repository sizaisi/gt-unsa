<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradoProcedimientoRequest extends FormRequest
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
            'idgradomodalidad' => 'required', 
            'idprocedimiento' => 'required', 
            'idrol' => 'required', 
            'tipo_rol' => 'required',  
            'url_formulario' => 'required|max:250',
            'orden' => 'required',
            'descripcion' => 'required|max:250',
        ];
    }
}
