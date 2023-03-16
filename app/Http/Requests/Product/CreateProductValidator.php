<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\BaseRequestFormApi;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductValidator extends BaseRequestFormApi
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
            'title'=>'required|min:3|max:50',
            'description'=>'nullable|min:3|max:1000',
            'size'=>'required|numeric|min:30|max:100',
            'color'=>'required|in:red,green',
            'price'=>'nullable|numeric|min:1|max:10000'
        ];
    }
}
