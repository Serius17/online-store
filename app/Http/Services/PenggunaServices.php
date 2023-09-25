<?php

namespace App\Http\Services;

use App\Http\Repositories\PenggunaRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PenggunaServices
{
    protected $penggunaRepository;

    public function __construct(PenggunaRepository $penggunaRepository)
    {
        $this->penggunaRepository = $penggunaRepository;
    }

    public function getAll()
    {
        return $this->penggunaRepository->getAll();
    }

    public function save(array $data)
    {
        $validated = Validator::make($data, [
            'nama' => 'required',
            'no_hp' => 'required'
        ]);

        if ($validated->fails()) {
            throw new InvalidArgumentException($validated->errors()->first());
        }

        return $this->penggunaRepository->save($data);
    }

    public function update($id, array $data)
    {
        $validated = Validator::make($data, [
            'nama' => 'required',
            'no_hp' => 'required'
        ]);

        if ($validated->fails()) {
            throw new InvalidArgumentException($validated->errors()->first());
        }

        return $this->penggunaRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->penggunaRepository->delete($id);
    }
}
