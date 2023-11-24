<?php

namespace App\Http\Requests\Seller\Food;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        return Auth::user()->hasPermissionTo('create food');

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type'=>'bail|required|',
            'name'=>'bail|required|string|min:3|max:255',
            'raw_materials'=>'bail|max:255',
            'price'=>'bail|required|integer',
            'image'=>'bail|image',
        ];
    }
}
