<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Repositories\AuthRepository;
use App\Http\Resources\UsersResource;

class AuthController extends Controller
{
    // injecting auth repository
    public function __construct(private AuthRepository $authRepository)
    {
    }


    /**
     * login user .
     * @unauthenticated
     * @response array{user: UsersResource, access_token: string}}
     */
    public function login(LoginRequest $loginRequest)
    {
        // validate data in controller layer
        $data = $loginRequest->validated();

        return $this->authRepository->login($data);
    }

    /**
     * register user .
     * @unauthenticated
     * @response array{user: UsersResource, access_token: string}}
     */
    public function register(CreateOrUpdateUserRequest $registerRequest)
    {
        // validate data in controller layer
        $data = $registerRequest->validated();

        return $this->authRepository->register($data);
    }
}
