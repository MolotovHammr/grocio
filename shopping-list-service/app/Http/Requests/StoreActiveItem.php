<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActiveItem extends FormRequest
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
            'item_id' => ['required', 'numeric', 'min:1'],
            'shopping_list_id' => ['required', 'numeric', 'min:1'],
            'amount' => [ 'nullable', 'numeric', 'min:1', 'max:1000'],
        ];
    }
}
