<?php

namespace App\Http\Repositories;

use App\Models\OrderItem;

class OrderItemRepository
{
    protected $orderItem;

    public function __construct(OrderItem $orderItem)
    {
        $this->orderItem = $orderItem;
    }

    public function getAll()
    {
        return $this->orderItem->all();
    }

    public function save(array $data)
    {
        $orderItem = new $this->orderItem;

        $orderItem->id_produk = $data['id_product'];
        $orderItem->id_order = $data['id_order'];
        $orderItem->jumlah = $data['jumlah'];

        return $orderItem->save();
    }

    public function update($id, array $data)
    {
        $orderItem = $this->orderItem->find($id);

        $orderItem->id_produk = $data['id_product'];
        $orderItem->id_order = $data['id_order'];
        $orderItem->jumlah = $data['jumlah'];

        return $orderItem->save();
    }

    public function delete($id)
    {
        return $this->orderItem->find($id)->delete();
    }

    public function show($id)
    {
        $data = $this->orderItem->find($id)
            ->select('order_items.id', 'products.id_produk', 'order.id_order', 'order_items.jumlah', 'products.nama_produk', 'products.harga')
            ->leftJoin('products', 'order_items.id_product', '=', 'products.id')
            ->leftJoin('orders', 'order_items.id_order', '=', 'orders.id')
            ->first();

        return $data;
    }
}
