<?php

namespace App\Http\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->all();
    }

    public function save(array $data)
    {
        $product = new $this->product;

        $product->nama = $data['nama'];
        $product->harga = $data['harga'];
        $product->jumlah_stock = $data['jumlah_stock'];

        return $product->save();
    }

    public function update($id, array $data)
    {
        $product = $this->product->find($id);

        $product->nama = $data['nama'];
        $product->harga = $data['harga'];
        $product->jumlah_stock = $data['jumlah_stock'];

        return $product->save();
    }

    public function delete($id)
    {
        $product = $this->product->find($id);

        return $product->delete();
    }

    public function find($id)
    {
        $product = $this->product
            ->select('*')
            ->leftJoin('flash_sales', 'flash_sales.product_id', '=', 'products.id')
            ->where('flash_sales.product_id', $id)
            ->where('flash_sales.start_date', '<=', now())
            ->where('flash_sales.end_date', '>=', now())
            ->get();

        return $product;
    }

    public function findById($id)
    {
        return $this->product->find($id);
    }
}
