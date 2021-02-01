<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DenominacionRequest extends FormRequest
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
            'den_m' => 'required|max:250',
            'den_f' => 'required|max:250',
        ];
    }
}
