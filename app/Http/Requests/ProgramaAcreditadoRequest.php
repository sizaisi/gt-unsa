<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramaAcreditadoRequest extends FormRequest
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
            'nues' => 'required|max:45',
            'nombre_programa' => 'required|max:250',
            'fecha_inicio_acreditacion' => 'required',
            'fecha_fin_acreditacion' => 'required',
        ];
    }
}
