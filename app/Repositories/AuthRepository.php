<?php

namespace App\Repositories;

use App\Http\Resources\UsersResource;

use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AuthRepository
{

    // reuse user repository to not duplicated the code of getting user .. so we can use it here
    public function __construct(private UsersRepository $userRepository)
    {
    }

    public function login(array $data)
    {
        $userToLogin = $this->userRepository->getByEmail($data['email']);

        $checkPassword = Hash::check($data['password'], $userToLogin->password);

        if (!$checkPassword) {
            throw new BadRequestHttpException('Wrong Password');
        }

        return [
            'user' => new UsersResource($userToLogin),
            'access_token' => $userToLogin->createToken($userToLogin->email)->plainTextToken
        ];
    }

    public function register(array $data)
    {
        /**
         * the different between this function and create in user repo is that
         * this function will create user
         * and return access token , to go to the next step of login in the client side
         */
        $userToRegister = $this->userRepository->create($data);
        return [
            'user' => new UsersResource($userToRegister),
            'access_token' => $userToRegister->createToken($userToRegister->email)->plainTextToken
        ];
    }
}
