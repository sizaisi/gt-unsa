<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RutaRequest extends FormRequest
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
            'idproc_origen' => 'required',
            'idproc_destino'=> 'required', 
            'etiqueta' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'idgradomodalidad.required' => 'El campo grado-modalidad es obligatorio.',            
            'idproc_origen.required' => 'El campo rol es obligatorio.',            
        ];
    }
}
