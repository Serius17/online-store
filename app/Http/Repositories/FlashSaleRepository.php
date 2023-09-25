<?php

namespace App\Http\Repositories;

use App\Models\FlashSale;

class FlashSaleRepository
{
    protected $flashSale;

    public function __construct(FlashSale $flashSale)
    {
        $this->flashSale = $flashSale;
    }

    public function save(array $data)
    {
        $flashSale = new $this->flashSale;

        $flashSale->id_product = $data['id_product'];
        $flashSale->start_date = $data['start_date'];
        $flashSale->end_date = $data['end_date'];
        $flashSale->discount = $data['discount'];

        $flashSale->save();
    }
}
