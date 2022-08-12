<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
      
        return [
            //
            'product_name' => ['required', 'string', 'max:255'],
            //'category_id' => ['required', 'integer'],
            'product_short_description' => ['required', 'string', 'max:255'],
            'product_price' => ['required'],
           // 'product_discount' => ['required', 'float'],
            'product_color' => ['required', 'string', 'max:255'],
           // 'status' => ['required', 'integer'],
            'images' => ['required', 'array'],

        ];
    }
}
