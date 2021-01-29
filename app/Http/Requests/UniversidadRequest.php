<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversidadRequest extends FormRequest
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
            'cod_universidad' => 'required|max:45',
            'razon_social' => 'required|max:250',
        ];
    }
}
