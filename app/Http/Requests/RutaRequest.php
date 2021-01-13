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
            'idtramite' => 'required',   
            'idproc_origen' => 'required',
            'idproc_destino'=> 'required', 
            'etiqueta' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'idtramite.required' => 'El campo trámite es obligatorio.',            
            'idproc_origen.required' => 'El campo procedimiento origen es obligatorio.',            
            'idproc_destino.required' => 'El campo procedimiento destino es obligatorio.',                        
        ];
    }
}
