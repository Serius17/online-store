<?php

namespace App\Http\Controllers;

use App\Helper\FormatApi;
use App\Http\Services\OrderServices;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $orderServices;
    protected $formatApi;

    public function __construct(OrderServices $orderServices, FormatApi $formatApi)
    {
        $this->orderServices = $orderServices;
        $this->formatApi = $formatApi;
    }

    public function index()
    {
        $order = $this->orderServices->getAll();

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
        $validated = $request->only(['id_pengguna', 'order_items']);

        $order = $this->orderServices->save($validated);
        if ($order) {
            return $this->formatApi->createApi(200, 'Success', $order);
        } else {
            return $this->formatApi->createApi(404, 'Not Data Yet!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $validated = $request->only(['id_pengguna', 'order_items']);

        $order = $this->orderServices->update($id, $validated);

        if ($order) {
            return $this->formatApi->createApi(200, 'Success', $order);
        } else {
            return $this->formatApi->createApi(404, 'Not Data Yet!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = $this->orderServices->delete($id);

        if ($order) {
            return $this->formatApi->createApi(200, 'Success', $order);
        } else {
            return $this->formatApi->createApi(404, 'Not Data Yet!');
        }
    }
}
