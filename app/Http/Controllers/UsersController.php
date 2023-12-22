<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateUserRequest;
use App\Http\Resources\UsersResource;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // injecting user repository
    public function __construct(private UsersRepository $userRepository)
    {
    }
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        return  UsersResource::collection($this->userRepository->getAll());
    }

    /**
     * Store a newly created users in database.
     */
    public function store(CreateOrUpdateUserRequest $request)
    {
        // validate data in controller layer
        $data = $request->validated();
        return  new UsersResource($this->userRepository->create($data));
    }

    /**
     * Display the specified users.
     */
    public function show($id)
    {
        return new UsersResource($this->userRepository->getById($id));
    }

    /**
     * Update the specified users in database.
     */
    public function update(CreateOrUpdateUserRequest $request, $id)
    {
        // validate data in controller layer
        $data = $request->validated();
        return new UsersResource($this->userRepository->update($id, $data));
    }

    /**
     * Remove the specified users from database.
     */
    public function destroy($id)
    {
        return $this->userRepository->delete($id);
    }
}
