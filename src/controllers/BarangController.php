<?php

class BarangController extends BaseController
{
    private $barangModel;
    public function __construct()
    {
        $this->barangModel = $this->model('BarangModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Barang',
            'label1' => 'Main Menu',
            'label2' => 'Barang',
            'label3' => '',
            'barang' => $this->barangModel->getAll()
        ];

        $this->view('partials/header', $data);
        $this->view('barang/index', $data);
        $this->view('partials/footer');
    }

    public function insert()
    {
        $data = [
            'title' => 'Insert Barang',
            'label1' => 'Main Menu',
            'label2' => 'Barang',
            'label3' => 'Tambah Barang',
        ];
        $this->view('partials/header', $data);
        $this->view('barang/insert', $data);
        $this->view('partials/footer');
    }

    public function insert_barang()
    {
        // Validasi input fields
        $fields = [
            'kode_barang' => 'string|required|alpha_numeric',
            'nama_barang' => 'string|required|min:3|max:50',
            'harga_barang' => 'int|required|numeric|min:0',
            'stok_barang' => 'int|required|numeric|min:0',
            'kadaluarsa' => 'string',
            'gambar' => 'file|required|mimes:jpg,png,gif|size:2048', // Validasi gambar
        ];

        $messages = [
            'kode_barang' => [
                'required' => 'Kode barang wajib diisi',
                'alpha_numeric' => 'Kode barang harus terdiri dari huruf dan angka'
            ],
            'nama_barang' => [
                'required' => 'Nama barang wajib diisi',
                'min' => 'Nama barang harus lebih dari %d karakter',
                'max' => 'Nama barang harus kurang dari %d karakter'
            ],
            'harga_barang' => [
                'required' => 'Harga barang wajib diisi',
                'numeric' => 'Harga barang harus berupa angka',
                'min' => 'Harga barang tidak boleh kurang dari %d'
            ],
            'stok_barang' => [
                'required' => 'Stok barang wajib diisi',
                'numeric' => 'Stok barang harus berupa angka',
                'min' => 'Stok barang tidak boleh kurang dari %d'
            ],
            'kadaluarsa' => [
                'date' => 'Kadaluarsa harus berupa tanggal yang valid'
            ],
            'gambar' => [
                'required' => 'Gambar barang wajib diisi',
                'mimes' => 'Gambar harus berupa file dengan ekstensi .jpg, .png, .gif',
                'size' => 'Ukuran gambar tidak boleh lebih dari 2MB'
            ],
        ];

        // Lakukan filtering & validasi
        [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

        // Jika ada error, redirect ke halaman insert dengan pesan error
        if ($errors) {
            Message::setFlash('error', 'Gagal!', $errors[0], $inputs);
            $this->redirect('barang/insert');
        }

        // Gunakan fungsi upload dari BaseController
        $uploadResult = $this->upload('gambar', '../src/public/images/barang/');

        if ($uploadResult['status'] === 'success') {
            $inputs['gambar'] = $uploadResult['fileName']; // Simpan nama file yang diupload ke $inputs
        } else {
            Message::setFlash('error', 'Gagal!', $uploadResult['message'], $inputs);
            $this->redirect('barang/insert');
        }

        // Masukkan data barang ke database
        $proc = $this->barangModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Berhasil!', 'Barang berhasil ditambahkan');
            $this->redirect('barang');
        }
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Barang',
            'label1' => 'Main Menu',
            'label2' => 'Barang',
            'label3' => 'Edit Barang',
            'barang' => $this->barangModel->getById($id),
        ];
        $this->view('partials/header', $data);
        $this->view('barang/edit', $data);
        $this->view('partials/footer');
    }

    public function edit_barang()
    {
        $this->dd($_POST);
    }
}
