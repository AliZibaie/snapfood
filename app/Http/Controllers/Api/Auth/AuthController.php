<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Services\API\Authentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            return Authentication::login($request);
        }catch (\Throwable $exception){
            return Authentication::fail($exception);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            return Authentication::register($request);
        }catch (\Throwable $exception){
            return Authentication::fail($exception);
        }
    }

    public function logout()
    {

    }
}
