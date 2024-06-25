<?php

namespace App\Service;
use App\Interface\ProductRepositoryInterface;

class ProductService {

    public function __construct(
        protected ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function findAll(int $offset, int $limit) {
        return $this->productRepository->findAll($offset, $limit);
    }

    public function findBySlug(string $Slug) {
        return $this->productRepository->findBySlug($Slug);
    }

    public function store($data) {
        return $this->productRepository->create($data);
    }

    public function update($data) {
        $id = $data['id'];
        unset($data['id']);
        return $this->productRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->productRepository->delete($id);
    }
}
