<?php

namespace App\Http\Requests\Seller\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->hasPermissionTo('edit restaurant');

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'bail:required|string|min:4|max:255|unique:restaurants',
            'phone'=>['bail', 'required', 'numeric', 'digits:11', Rule::unique('restaurants')->ignore(Auth::user()->restaurant->phone)],
            'account_number'=>['bail', 'required', 'numeric', 'digits:10', Rule::unique('restaurants')->ignore(Auth::user()->restaurant->account_number)],
            'type'=>'bail|required',
        ];
    }
}
