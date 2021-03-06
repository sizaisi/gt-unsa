<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoAutoridadRequest extends FormRequest
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
            'idcargo' => 'required',
            'idautoridad' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'idcargo.required' => 'El campo cargo es obligatorio.',            
            'idautoridad.required' => 'El campo autoridad es obligatorio.',            
        ];
    }
}
