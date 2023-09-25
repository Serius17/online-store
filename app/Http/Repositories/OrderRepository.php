<?php

namespace App\Http\Repositories;

use App\Models\Order;

class OrderRepository
{
    protected $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getAll()
    {
        return $this->order->all();
    }

    public function save(array $data)
    {
        $order = new $this->order;

        $order->id_pengguna = $data['id_pengguna'];
        $order->order_items = $data['order_items'];

        return $order->save();
    }

    public function update($id, array $data)
    {
        $order = $this->order->find($id);

        $order->id_pengguna = $data['id_pengguna'];
        $order->order_items = $data['order_items'];

        return $order->save();
    }

    public function delete($id)
    {
        $order = $this->order->find($id);

        return $order->delete();
    }
}
