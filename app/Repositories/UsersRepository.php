<?php

namespace App\Repositories;

use App\Interfaces\CrudRepositoryInterface;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UsersRepository implements CrudRepositoryInterface
{

    public function __construct(protected User $model)
    {
    }

    // Implement the CrudRepositoryInterface interface methods
    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        $user = $this->model->find($id);
        if (!$user) {
            throw new NotFoundHttpException('User not found');
        }
        return $user;
    }

    public function getByEmail($email)
    {
        $user = $this->model->where('email', $email)->first();
        if (!$user) {
            throw new NotFoundHttpException('User not found');
        }
        return $user;
    }
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $user = $this->getById($id);

        /**
         * make sure the owner only can update their own account
         * later could add admin except to update / delete any user
         */
        if ($user->id !== auth()->user()->id) {
            throw new \Exception('You are not authorized to update this user');
        }
        $user->update($data);
        return $user;
    }
    public function delete($id)
    {
        $user = $this->getById($id);
        /**
         * make sure the owner only can update their own account
         * later could add admin except to update / delete any user
         */
        if ($user->id !== auth()->user()->id) {
            throw new \Exception('You are not authorized to update this user');
        }
        $user->delete();
        return ['message' => 'user deleted successfully'];
    }
}
