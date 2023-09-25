<?php

namespace App\Http\Controllers;

use App\Helper\FormatApi;
use App\Http\Services\PenggunaServices;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    protected $penggunaServices;
    protected $formatApi;

    public function __construct(PenggunaServices $penggunaServices, FormatApi $formatApi)
    {
        $this->penggunaServices = $penggunaServices;
        $this->formatApi = $formatApi;
    }
    public function index()
    {
        $pengguna = $this->penggunaServices->getAll();

        if ($pengguna) {
            return $this->formatApi->createApi(200, 'Success', $pengguna);
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
            'no_hp',
        ]);

        try {
            $pengguna = $this->penggunaServices->save($validated);

            if ($pengguna) {
                return $this->formatApi->createApi(200, 'Success', $pengguna);
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
        $validated = $request->only([
            'nama',
            'no_hp',
        ]);

        try {
            $pengguna = $this->penggunaServices->update($id, $validated);

            if ($pengguna) {
                return $this->formatApi->createApi(200, 'Success', $pengguna);
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
        $pengguna = $this->penggunaServices->delete($id);

        if ($pengguna) {
            return $this->formatApi->createApi(200, 'Success Deleted', $pengguna);
        } else {
            return $this->formatApi->createApi(404, 'You Cant Delete This Data!');
        }
    }
}
