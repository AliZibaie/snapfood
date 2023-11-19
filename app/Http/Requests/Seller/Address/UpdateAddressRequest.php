<?php

namespace App\Http\Requests\Seller\Address;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->hasPermissionTo('edit addresses');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'bail|required|min:3|max:255',
            'address'=>'bail|required|min:3|max:255',
            'latitude'=>['bail', 'required', 'decimal:0,5',
//                Rule::unique('addresses')->where('latitude', $this->input('latitude'))->where('longitude', $this->input('longitude'))->whereNotIn('id', [Auth::user()->restaurant->addresses->pluck('id')->toArray()])
            ],
            'longitude'=>['bail', 'required', 'decimal:0,5',
//                Rule::unique('addresses')->where('latitude', $this->input('latitude'))->where('longitude', $this->input('longitude'))->ignore(Auth::user()->restaurant->addresses->pluck('id'))
            ],
        ];
    }
}
