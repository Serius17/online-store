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
}
