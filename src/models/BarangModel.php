<?php

class BarangModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = "SELECT * FROM barang";
        return $this->qry($query)->fetchAll();
    }

    public function getById($id)
    {
        $query = "SELECT * FROM barang WHERE id = ?";
        return $this->qry($query, [$id])->fetch();
    }

    public function insert($data)
    {
        $query = "INSERT INTO barang (kode_barang, nama, harga, stok , kadaluarsa, gambar ) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->qry($query, [
            $data['kode_barang'],
            $data['nama_barang'],
            $data['harga_barang'],
            $data['stok_barang'],
            $data['kadaluarsa'],
            $data['gambar'],
        ]);
    }

    public function update($data)
    {
        $query = "UPDATE barang SET kode_barang = ?, nama = ?, harga = ?, stok = ?, kadaluarsa = ?, gambar = ? WHERE id = ?";   
        return $this->qry($query, [
            $data['kode_barang'],
            $data['nama_barang'],
            $data['harga_barang'],
            $data['stok_barang'],
            $data['kadaluarsa'],
            $data['gambar'],
            $data['id'],
        ]);
    }
}
