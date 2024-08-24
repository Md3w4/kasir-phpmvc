<?php

class BarangModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('barang');
        $this->setColumn([
            'id',
            'kode_barang',
            'nama',
            'harga',
            'stok',
            'kadaluarsa',
            'gambar'
        ]);
    }

    public function getAll()
    {
        // $query = "SELECT * FROM barang";
        return $this->get()->fetchAll();
    }

    public function getById($id)
    {
        // $query = "SELECT * FROM barang WHERE id = ?";
        return $this->get(['id' => $id])->fetch();
    }

    public function insert($data)
    {
        // $query = "INSERT INTO barang (kode_barang, nama, harga, stok , kadaluarsa, gambar ) VALUES (?, ?, ?, ?, ?, ?)";
        // return $this->qry($query, [
        //     $data['kode_barang'],
        //     $data['nama_barang'],
        //     $data['harga_barang'],
        //     $data['stok_barang'],
        //     $data['kadaluarsa'],
        //     $data['gambar'],
        // ]);

        $table = [
            'kode_barang' => $data['kode_barang'],
            'nama' => $data['nama_barang'],
            'harga' => $data['harga_barang'],
            'stok' => $data['stok_barang'],
            'kadaluarsa' => $data['kadaluarsa'],
            'gambar' => $data['gambar'],
        ];
        return $this->insertData($table);
    }

    public function update($data)
    {
        // $query = "UPDATE barang SET kode_barang = ?, nama = ?, harga = ?, stok = ?, kadaluarsa = ?, gambar = ? WHERE id = ?";
        // return $this->qry($query, [
        //     $data['kode_barang'],
        //     $data['nama_barang'],
        //     $data['harga_barang'],
        //     $data['stok_barang'],
        //     $data['kadaluarsa'],
        //     $data['gambar'],
        //     $data['id'],
        // ]);

        $table = [
            'kode_barang' => $data['kode_barang'],
            'nama' => $data['nama_barang'],
            'harga' => $data['harga_barang'],
            'stok' => $data['stok_barang'],
            'kadaluarsa' => $data['kadaluarsa'],
            'gambar' => $data['gambar'],
        ];
        $key = [
            'id' => $data['id']
        ];

        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        // $query = "DELETE barang WHERE id = ?";
        // return $this->qry($query, [$id]);

        return $this->deleteData(['id'=> $id]);
    }
}