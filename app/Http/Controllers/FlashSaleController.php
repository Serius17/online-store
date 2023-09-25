<?php

namespace App\Http\Controllers;

use App\Helper\FormatApi;
use App\Http\Services\FlashSaleServices;
use App\Models\FlashSale;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    protected $flashSaleServices;
    protected $formatApi;

    public function __construct(FlashSaleServices $flashSaleServices, FormatApi $formatApi)
    {
        $this->flashSaleServices = $flashSaleServices;
        $this->formatApi = $formatApi;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->only([
            'id_product', 'start_date', 'end_date', 'discount'
        ]);

        try {
            $flashSale = $this->flashSaleServices->save($validated);

            if ($flashSale) {
                return $this->formatApi->createApi(200, 'Success', $flashSale);
            } else {
                return $this->formatApi->createApi(404, 'Not Data Yet!');
            }
        } catch (\Throwable $th) {
            return $this->formatApi->createApi(404, $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FlashSale $flashSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlashSale $flashSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FlashSale $flashSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlashSale $flashSale)
    {
        //
    }
}
