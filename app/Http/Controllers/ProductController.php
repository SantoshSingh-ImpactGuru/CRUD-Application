<?php

namespace App\Http\Controllers;

use App\BO\ProductBO;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $productService; 

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductCreateRequest $request)
    {
        $productBO = new ProductBO();
        $productBO->setName($request->name);
        $productBO->setPrice($request->price);
        $productBO->setQuantity($request->quantity);
        
        $this->productService->create($productBO);
        return redirect()->route('products!.index');
    }

    public function edit($id)
    {
        $product = $this->productService->getById($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $productBO = new ProductBO();
        $productBO->setName($request->name);
        $productBO->setPrice($request->price);
        $productBO->setQuantity($request->quantity);

        $this->productService->update($id, $productBO);
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->productService->delete($id);
        return redirect()->route('products.index');
    }
}
