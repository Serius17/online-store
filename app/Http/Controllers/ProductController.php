<?php

namespace App\Http\Controllers;

use App\Helper\FormatApi;
use App\Http\Services\ProductServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productServices;
    protected $formatApi;

    public function __construct(ProductServices $productServices, FormatApi $formatApi)
    {
        $this->productServices = $productServices;
        $this->formatApi = $formatApi;
    }

    public function index()
    {
        $product = $this->productServices->getAll();

        if (!empty($product)) {
            return $this->formatApi->createApi(200, 'Success', $product);
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
            'nama',
            'harga',
            'jumlah_stock'
        ]);

        try {
            $product = $this->productServices->save($validated);

            if ($product) {
                return $this->formatApi->createApi(200, 'Success', $product);
            } else {
                return $this->formatApi->createApi(404, 'Not Data Yet!');
            }
        } catch (\Exception $e) {
            return $this->formatApi->createApi(500, $e->getMessage());
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
        $product = $request->only([
            'nama',
            'harga',
            'jumlah_stock'
        ]);

        try {
            $product = $this->productServices->update($id, $product);

            if ($product) {
                return $this->formatApi->createApi(200, 'Success', $product);
            } else {
                return $this->formatApi->createApi(404, 'Not Data Yet!');
            }
        } catch (\Exception $e) {
            return $this->formatApi->createApi(500, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->productServices->delete($id);

        if ($product) {
            return $this->formatApi->createApi(200, 'Success Deleted', $product);
        } else {
            return $this->formatApi->createApi(404, 'You Cant Delete This Data!');
        }
    }
}
