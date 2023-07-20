<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'sku' => ['required', 'max:100', 'unique:products,sku,' . $this->route('id')],
            'name' => ['required', 'max:100'],
            'price' => ['required'],
            'stock' => ['required'],
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:5000',
        ];
    }
}
