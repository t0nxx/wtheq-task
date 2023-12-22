<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    // injecting product repository
    public function __construct(private ProductRepository $productRepository)
    {
    }
    /**
     * Display a listing of the products.
     */
    public function index()
    {

        return  ProductResource::collection($this->productRepository->getAll());
    }

    /**
     * Store a newly created products in database.
     */
    public function store(CreateOrUpdateProductRequest $request)
    {
        // validate data in controller layer
        $data = $request->validated();
        return  new ProductResource($this->productRepository->create($data));
    }

    /**
     * Display the specified products.
     */
    public function show($id)
    {
        return new ProductResource($this->productRepository->getById($id));
    }

    /**
     * Update the specified products in database.
     */
    public function update(CreateOrUpdateProductRequest $request, $id)
    {
        // validate data in controller layer
        $data = $request->validated();
        return new ProductResource($this->productRepository->update($id, $data));
    }

    /**
     * Remove the specified products from database.
     */
    public function destroy($id)
    {
        return $this->productRepository->delete($id);
    }
}
