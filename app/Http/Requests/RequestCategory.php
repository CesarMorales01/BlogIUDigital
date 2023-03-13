<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest{

    public function authorize(): bool{
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array{
        return [
            'name'=> 'required | min:3 | max:120',
            'description'=>'required | min:3 | max:250'
        ];
    }
}
