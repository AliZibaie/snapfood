<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\UpdateProfileRequest;
use App\Models\User;
use App\Services\API\Authentication;
use App\Services\API\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(UpdateProfileRequest $request, User $user)
    {
        try {
            return Profile::update($request, $user);
        }catch (\Throwable $exception){
            return Profile::fail($exception);
        }
    }

    public function destroy()
    {
        try {
            return Profile::destroy();
        }catch (\Throwable $exception){
            return Profile::fail($exception);
        }
    }
}
