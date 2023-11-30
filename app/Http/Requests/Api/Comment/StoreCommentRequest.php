<?php

namespace App\Http\Requests\Api\Comment;

use App\Rules\OrderMustBeDelivered;
use App\Rules\OrderMustBelongToUser;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'order_id'=>['bail', 'required', 'exists:orders,id', new OrderMustBelongToUser, new OrderMustBeDelivered],
            'message'=>['bail', 'required', 'min:5', 'max:255'],
            'score'=>['bail', Rule::requiredIf(Auth::user()->getRoleNames()->first() && Auth::user()->getRoleNames()->first()->name != 'seller'), 'integer', 'min:0', 'max:5'],
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'validation failed',
            'data'      => $validator->errors()
        ], 403));
    }
}
