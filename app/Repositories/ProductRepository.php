<?php

namespace App\Repositories;

use App\Enums\UserTypesEnum;
use App\Interfaces\CrudRepositoryInterface;
use App\Models\Product;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductRepository implements CrudRepositoryInterface
{

    public function __construct(protected Product $model)
    {
    }

    // Implement the CrudRepositoryInterface interface methods
    public function getAll()
    {
        $products = [];
        switch (auth()->user()->type) {
            case UserTypesEnum::normal->value:
                $products = $this->model->NorrmalProducts()->get();
                break;
            case UserTypesEnum::silver->value:
                $products = $this->model->SilverProducts()->get();
                break;
            case UserTypesEnum::gold->value:
                $products =  $this->model->GoldProducts()->get();
                break;
            default:
                $products = $this->model->NorrmalProducts()->get();
                break;
        }
        return $products;
    }

    public function getById($id)
    {
        $product = $this->model->find($id);
        if (!$product) {
            throw new NotFoundHttpException('product not found');
        }
        return $product;
    }

    public function create(array $data)
    {
        $data['user_id'] = auth()->id();

        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $product = $this->getById($id);

        /**
         * make sure the owner only can update their own product
         */
        if ($product->user_id !== auth()->user()->id) {
            throw new \Exception('You are not authorized to update this product');
        }
        $product->update($data);
        return $product;
    }
    public function delete($id)
    {
        $product = $this->getById($id);

        /**
         * make sure the owner only can delete their own product
         */
        if ($product->user_id !== auth()->user()->id) {
            throw new \Exception('You are not authorized to delete this product');
        }
        $product->delete();
        return ['message' => 'product deleted successfully'];
    }
}
