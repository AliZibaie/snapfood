<?php

namespace App\Rules;

use App\Models\Address;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueLatitudeLongitude implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Address::query()->where('latitude', '=', request('latitude'))->where('longitude', '=', $value)->first()){
            $fail('this coordinates is already taken!');
        }
    }
}
