<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'quantity' => ['required', 'numeric', 'min:0.01', 'max:10000.0'],
            'unit' => ['required', 'string', 'min:1', 'max:7'],
            'energy' => ['required', 'numeric', 'min:1', 'max:100000' ],
            'total_fat' => ['required', 'numeric', 'min:0.01', 'max:10000.0'],
            'saturated_fat' => ['required', 'numeric', 'min:0.01', 'max:10000.0'],
            'total_carbohydrates' => ['required', 'numeric', 'min:0.01', 'max:10000.0'],
            'sugars' => ['required', 'numeric', 'min:0.01', 'max:10000.0'],
            'protein' => ['required', 'numeric', 'min:0.01', 'max:10000.0'],
            'salt' => ['required', 'numeric', 'min:0.01', 'max:10000.0'],
        ];
    }
}
