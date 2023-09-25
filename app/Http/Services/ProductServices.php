<?php

namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ProductServices
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function save(array $data)
    {
        $validated = Validator::make($data, [
            'nama' => 'required',
            'harga' => 'required',
            'jumlah_stock' => 'required'
        ]);

        if ($validated->fails()) {
            throw new InvalidArgumentException($validated->errors()->first());
        }

        return $this->productRepository->save($data);
    }

    public function update($id, array $data)
    {
        $validated = Validator::make($data, [
            'nama' => 'required',
            'harga' => 'required',
            'jumlah_stock' => 'required'
        ]);

        if ($validated->fails()) {
            throw new InvalidArgumentException($validated->errors()->first());
        }

        return $this->productRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}
