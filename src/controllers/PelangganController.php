<?php

class PelangganController extends BaseController
{
    private $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = $this->model('PelangganModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pelanggan',
            'label1' => 'Main Menu',
            'label2' => 'Pelanggan',
            'label3' => '',
            'pelanggan' => $this->pelangganModel->getAll()
        ];

        $this->view('partials/header', $data);
        $this->view('pelanggan/index', $data);
        $this->view('partials/footer');
    }

    public function insert()
    {
        $data = [
            'title' => 'Data Pelanggan',
            'label1' => 'Main Menu',
            'label2' => 'Pelanggan',
            'label3' => 'Tambah Pelanggan',
        ];
        $this->view('partials/header', $data);
        $this->view('pelanggan/insert', $data);
        $this->view('partials/footer');
    }

    public function insert_pelanggan()
    {
        $fields = [
            'nama' => 'string|required',
            'no_hp' => 'int|required|min:3|max:50',
            'email' => 'string|required'
        ];

        $messages = [
            'nama' => [
                'required' => 'Nama pelanggan wajib diisi'
            ],
            'no_hp' => [
                'required' => 'No handphone wajib diisi',
                'min' => 'No handphone harus lebih dari %d karakter',
                'max' => 'No handphone harus kurang dari %d karakter'
            ],
            'email' => [
                'required' => 'Email pelanggan wajib diisi'
            ]
        ];

        [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

        if ($errors) {
            Message::setFlash('error', 'Gagal!', $errors[0], $inputs);
            $this->redirect('pelanggan/insert');
        }

        $proc = $this->pelangganModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Berhasil!', 'Pelanggan berhasil ditambahkan');
            $this->redirect('pelanggan');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Data Pelanggan',
            'label1' => 'Main Menu',
            'label2' => 'Pelanggan',
            'label3' => 'Edit Pelanggan',
            'pelanggan' => $this->pelangganModel->getById($id)
        ];

        $this->view('partials/header', $data);
        $this->view('pelanggan/edit', $data);
        $this->view('partials/footer');
    }

    public function edit_pelanggan()
    {
        $fields = [
            'nama' => 'string|required',
            'no_hp' => 'int|required|min:3|max:50',
            'email' => 'string|required',
            'id' => 'int'
        ];

        $messages = [
            'nama' => [
                'required' => 'Nama pelanggan wajib diisi'
            ],
            'no_hp' => [
                'required' => 'No handphone wajib diisi',
                'min' => 'No handphone harus lebih dari %d karakter',
                'max' => 'No handphone harus kurang dari %d karakter'
            ],
            'email' => [
                'required' => 'Email pelanggan wajib diisi'
            ]
        ];

        [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

        if ($errors) {
            Message::setFlash('error', 'Gagal!', $errors[0], $inputs);
            $this->redirect('pelanggan/edit' . $inputs['id']);
        }

        $proc = $this->pelangganModel->update($inputs);
        if ($proc) {
            Message::setFlash('success', 'Berhasil!', 'Pelanggan berhasil diubah');
            $this->redirect('pelanggan');
        }
    }

    public function delete_pelanggan($id)
    {
        $proc = $this->pelangganModel->delete($id);

        if ($proc) {
            Message::setFlash('success', 'Berhasil!', 'Pelanggan berhasil dihapus.');
        } else {
            Message::setFlash('error', 'Gagal!', 'Pelanggan gagal dihapus.');
        }

        $this->redirect('pelanggan');
    }
}
