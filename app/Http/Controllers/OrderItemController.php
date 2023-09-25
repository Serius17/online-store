<?php

namespace App\Http\Controllers;

use App\Helper\FormatApi;
use App\Http\Services\OrderItemServices;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    protected $orderItemServices;
    protected $formatApi;

    public function __construct(OrderItemServices $orderItemServices, FormatApi $formatApi)
    {
        $this->orderItemServices = $orderItemServices;
        $this->formatApi = $formatApi;
    }
    public function index()
    {
        $order = $this->orderItemServices->getAll();

        if ($order) {
            return $this->formatApi->createApi(200, 'Success', $order);
        } else {
            return $this->formatApi->createApi(404, 'Not Data Yet!');
        }
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
            'id_product', 'id_order', 'jumlah'
        ]);

        try {
            $orderItem = $this->orderItemServices->save($validated);

            if ($orderItem) {
                return $this->formatApi->createApi(200, 'Success', $orderItem);
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
    public function show(string $id)
    {
        $orderItem = $this->orderItemServices->show($id);

        if ($orderItem) {
            return $this->formatApi->createApi(200, 'Success', $orderItem);
        } else {
            return $this->formatApi->createApi(404, 'Not Data Yet!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->only([
            'id_product', 'id_order', 'jumlah'
        ]);

        try {
            $orderItem = $this->orderItemServices->update($id, $validated);
            if ($orderItem) {
                return $this->formatApi->createApi(200, 'Success', $orderItem);
            } else {
                return $this->formatApi->createApi(404, 'Not Data Yet!');
            }
        } catch (\Throwable $th) {
            return $this->formatApi->createApi(404, $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderItem = $this->orderItemServices->delete($id);
        if ($orderItem) {
            return $this->formatApi->createApi(200, 'Success', $orderItem);
        } else {
            return $this->formatApi->createApi(404, 'Not Data Yet!');
        }
    }
}
