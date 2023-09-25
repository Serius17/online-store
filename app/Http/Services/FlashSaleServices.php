<?php

namespace App\Http\Services;

use App\Http\Repositories\FlashSaleRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class FlashSaleServices
{
    protected $flashSaleRepository;

    public function __construct(FlashSaleRepository $flashSaleRepository)
    {
        $this->flashSaleRepository = $flashSaleRepository;
    }

    public function save(array $data)
    {
        $validated = Validator::make($data, [
            'id_product' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'discount' => 'required'
        ]);

        if ($validated->fails()) {
            return new InvalidArgumentException($validated->errors()->first());
        }

        return $this->flashSaleRepository->save($data);
    }
}
