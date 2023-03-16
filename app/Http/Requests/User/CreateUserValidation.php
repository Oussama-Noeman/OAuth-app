<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequestFormApi;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserValidation extends BaseRequestFormApi
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorized()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'name'=>[
                'required',
                'max:50'
                ],
            'email'=>[
                'required',
                'min:5',
                'max:50',
                'email',
                'unique:users,email'
                ],
            'password'=>[
                'required',
                'min:6',
                'confirmed'
                ]
        ];
    }
}
