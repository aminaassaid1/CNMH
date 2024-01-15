<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormeRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make the request.
     */
    public function authorize():bool{
        return true;
    }

    /**
     * Get the validation rules that apply for the request.
     * @return  array<string, \Illuminate\contracts\validation\ValidationRule|array<mixed>|string>
     */

     public function rules():array{
        return [
            'nom' => 'required|max:40',
            'projetId' => 'required',
            'description' => 'nullable',
        ];
     }

}