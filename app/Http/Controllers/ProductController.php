<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatus;
use App\Enums\ResponseStatus;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {
        $this->productService = $productService;
    }
    public function index(Request $request) {
        $page = $request->get("page",1);
        $limit = $request->get("limit",10);

        $products = $this->productService->findAll($page, $limit);

        return response()->success($products, ResponseStatus::SUCCESS);
    }

    public function store(StoreProductRequest $request) {
        $product = $this->productService->store($request->validated());
        return response()->success($product, ResponseStatus::CREATED);
    }

    public function find($slug) {
        $product = $this->productService->findBySlug($slug);
        if (!$product) {
            return response()->error("Product not found", ResponseStatus::NOT_FOUND);
        }
        return response()->success($product, ResponseStatus::SUCCESS);
    }

    public function update(UpdateProductRequest $request) {
        $product = $this->productService->update($request->validated());
        return response()->success($product, ResponseStatus::CREATED);
    }

    public function destroy($id) {
        $product = $this->productService->delete($id);
        if (!$product) {
            return response()->error("Product Not Found", ResponseStatus::NOT_FOUND);
        }
        return response()->success(null, ResponseStatus::SUCCESS);
    }
}
