<?php

namespace App\Http\Requests;

use App\Models\Sindicato;
use Illuminate\Foundation\Http\FormRequest;

class CreateSindicatoRequest extends FormRequest
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
        return Sindicato::$rules;
    }

    public function messages()
    {
        return [
            'file.max' => 'O logo não pode ter mais que 5MB',
        ];
    }


}
