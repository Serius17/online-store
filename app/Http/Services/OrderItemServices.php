<?php

namespace App\Http\Services;

use App\Http\Repositories\OrderItemRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class OrderItemServices
{
    protected $orderItemRepository;

    public function __construct(OrderItemRepository $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }

    public function getAll()
    {
        return $this->orderItemRepository->getAll();
    }

    public function save(array $data)
    {
        $validated = Validator::make($data, [
            'id_product' => 'required',
            'id_order' => 'required',
            'jumlah' => 'required'
        ]);

        if ($validated->fails()) {
            return new InvalidArgumentException($validated->errors()->first());
        }

        return $this->orderItemRepository->save($data);
    }

    public function update($id, array $data)
    {
        $validated = Validator::make($data, [
            'id_product' => 'required',
            'id_order' => 'required',
            'jumlah' => 'required'
        ]);

        if ($validated->fails()) {
            return new InvalidArgumentException($validated->errors()->first());
        }

        return $this->orderItemRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->orderItemRepository->delete($id);
    }

    public function show($id)
    {
        return $this->orderItemRepository->show($id);
    }
}
