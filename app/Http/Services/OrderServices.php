<?php

namespace App\Http\Services;

use App\Http\Repositories\OrderRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class OrderServices
{
    protected $orderRepository;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAll()
    {
        return $this->orderRepository->getAll();
    }

    public function save(array $data)
    {
        $validated = Validator::make($data, [
            'id_pengguna' => 'required',
            'order_items' => 'required'
        ]);

        if ($validated->fails()) {
            return new InvalidArgumentException($validated->errors()->first());
        }

        return $this->orderRepository->save($data);
    }

    public function update($id, array $data)
    {
        $validated = Validator::make($data, [
            'id_pengguna' => 'required',
            'order_items' => 'required'
        ]);

        if ($validated->fails()) {
            return new InvalidArgumentException($validated->errors()->first());
        }

        return $this->orderRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->orderRepository->delete($id);
    }
}
