<?php

class PelangganModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('pelanggan');
        $this->setColumn([
            'id',
            'nama',
            'no_hp',
            'email'
        ]);
    }

    public function getAll()
    {
        return $this->get()->fetchAll();
    }

    public function getById($id)
    {
        // $query = "SELECT * FROM pelanggan WHERE id = ?";
        return $this->get(['id' => $id])->fetch();
    }

    public function insert($data)
    {
        // $query = "INSERT INTO pelanggan (nama, no_hp, email) VALUES (?, ?, ?)";
        // return $this->qry($query, [
        //     $data['nama_pelanggan'],
        //     $data['no_hp'],
        //     $data['email']
        // ]);
        $table = [
            'nama' => $data['nama'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email']
        ];

        return $this->insertData($table);
    }

    public function update($data)
    {
        // $query = "UPDATE pelanggan SET nama = ?, no_hp = ?, email = ? WHERE id = ?";
        // return $this->qry($query, [
        //     $data['nama'],
        //     $data['no_hp'],
        //     $data['email']
        // ]);
        $table = [
            'nama' => $data['nama'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email']
        ];
        $key = [
            'id' => $data['id']
        ];

        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        // $query = "DELETE pelanggan WHERE id = ?";
        return $this->deleteData(['id' => $id]);
    }
}
