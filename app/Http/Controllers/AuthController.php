<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // injecting auth repository
    public function __construct(private AuthRepository $authRepository)
    {
    }

    public function login(LoginRequest $loginRequest)
    {
        // validate data in controller layer
        $data = $loginRequest->validated();

        return $this->authRepository->login($data);
    }

    public function register(CreateOrUpdateUserRequest $registerRequest)
    {
        // validate data in controller layer
        $data = $registerRequest->validated();

        return $this->authRepository->register($data);
    }
}
