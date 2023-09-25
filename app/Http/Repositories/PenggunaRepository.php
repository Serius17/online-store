<?php

namespace App\Http\Repositories;

use App\Models\Pengguna;

class PenggunaRepository
{
    protected $pengguna;

    public function __construct(Pengguna $pengguna)
    {
        $this->pengguna = $pengguna;
    }

    public function getAll()
    {
        return $this->pengguna->all();
    }

    public function save(array $data)
    {
        $pengguna = new $this->pengguna;

        $pengguna->nama = $data['nama'];
        $pengguna->no_hp = $data['no_hp'];

        return $pengguna->save();
    }

    public function update($id, array $data)
    {
        $pengguna = $this->pengguna->find($id);

        $pengguna->nama = $data['nama'];
        $pengguna->no_hp = $data['no_hp'];

        return $pengguna->save();
    }

    public function delete($id)
    {
        $pengguna = $this->pengguna->find($id);

        return $pengguna->delete();
    }
}
