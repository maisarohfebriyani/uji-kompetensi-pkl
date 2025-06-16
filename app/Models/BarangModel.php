<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'harga', 'stok', 'kategori_id'];

public function getWithKategori()
{
    return $this->select('barang.*, kategori.nama as kategori_nama')
                ->join('kategori', 'kategori.id = barang.kategori_id', 'left')
                ->findAll();
}


}
