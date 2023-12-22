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

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $user = $this->getById($id);
        $user->update($data);
        return $user;
    }
    public function delete($id)
    {
        $user = $this->getById($id);
        $user->delete();
        return ['message' => 'user deleted successfully'];
    }
}
