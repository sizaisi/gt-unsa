<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradoModalidadRequest extends FormRequest
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
            'idgrado' => 'required',
            'idmodalidad' => 'required',
            'componente' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'idgrado.required' => 'El campo grado es obligatorio.',            
            'idmodalidad.required' => 'El campo modalidad es obligatorio.',            
        ];
    }
}
