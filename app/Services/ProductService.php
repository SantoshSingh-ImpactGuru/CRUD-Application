<?php

namespace App\Services;

use App\BO\ProductBO;
use App\Repositories\ProductRepository;

class ProductService
{
    private ProductRepository $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAll()
    {
        return $this->productRepo->all();
    }

    public function create(ProductBO $bo)
    {
        return $this->productRepo->create($bo->toArray());
    }

    public function getById(int $id)
    {
        return $this->productRepo->find($id);
    }

    public function update(int $id, ProductBO $bo)
    {
        return $this->productRepo->update($id, $bo->toArray());
    }

    public function delete(int $id)
    {
        return $this->productRepo->delete($id);
    }
}
