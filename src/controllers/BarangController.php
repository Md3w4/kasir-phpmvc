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
        $fields = [
            'kode_barang' => 'string|required|alpha_numeric',
            'nama_barang' => 'string|required|min:3|max:50',
            'harga_barang' => 'int|required|numeric|min:0',
            'stok_barang' => 'int|required|numeric|min:0',
            'kadaluarsa' => 'string',
            'gambar' => 'uploaded|mimes:jpg,jpeg,png|max_size:1000000',
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
                'uploaded' => 'Gambar barang wajib diisi',
                'mimes' => 'Gambar harus berupa file dengan ekstensi .jpg, .jpeg, .png',
                'max_size' => 'Ukuran file tidak boleh lebih dari 1MB',
            ],
        ];

        [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

        if ($errors) {
            Message::setFlash('error', 'Gagal!', $errors[0], $inputs);
            $this->redirect('barang/insert');
        }

        // Proses unggah gambar jika validasi berhasil
        $fileNameNew = $this->upload('gambar');
        if ($fileNameNew) {
            $inputs['gambar'] = $fileNameNew;
        } else {
            $this->redirect('barang/insert');
        }

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
        $fields = [
            'kode_barang' => 'string|required|alpha_numeric',
            'nama_barang' => 'string|required|min:3|max:50',
            'harga_barang' => 'int|required|numeric|min:0',
            'stok_barang' => 'int|required|numeric|min:0',
            'kadaluarsa' => 'string',
            'gambar' => 'uploaded|mimes:jpg,jpeg,png|max_size:1000000',
            'id' => 'int'
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
                'uploaded' => 'Gambar barang wajib diisi',
                'mimes' => 'Gambar harus berupa file dengan ekstensi .jpg, .jpeg, .png',
                'max_size' => 'Ukuran file tidak boleh lebih dari 1MB',
            ],
        ];

        [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

        if ($errors) {
            Message::setFlash('error', 'Gagal!', $errors[0], $inputs);
            $this->redirect('barang/edit/' . $inputs['id']);
        }

        // Dapatkan data barang sebelumnya
        $barangSebelumnya = $this->barangModel->getById($inputs['id']);

        // Proses upload gambar baru jika ada
        if ($_FILES['gambar']['error'] !== 4) {
            // Hapus gambar lama
            if (file_exists(BASEURL . "/public/images/barang/" . $barangSebelumnya['gambar'])) {
                unlink(BASEURL . "/public/images/barang/" . $barangSebelumnya['gambar']);
            }
            // Upload gambar baru
            $inputs['gambar'] = $this->upload($inputs);
            if (!$inputs['gambar']) {
                Message::setFlash('error', 'Gagal!', 'Upload gambar gagal');
                $this->redirect('barang/edit/' . $inputs['id']);
            }
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $inputs['gambar'] = $barangSebelumnya['gambar'];
        }

        // Update data barang
        $proc = $this->barangModel->update($inputs);
        if ($proc) {
            Message::setFlash('success', 'Berhasil!', 'Barang berhasil diubah');
            $this->redirect('barang');
        } else {
            Message::setFlash('error', 'Gagal!', 'Barang gagal diubah');
            $this->redirect('barang/edit/' . $inputs['id']);
        }
    }

    public function delete_barang($id)
    {
        // Ambil data barang berdasarkan ID
        $barang = $this->barangModel->getById($id);

        if (!$barang) {
            // Jika barang tidak ditemukan, kembalikan pesan error
            Message::setFlash('error', 'Gagal!', 'Barang tidak ditemukan.');
            $this->redirect('barang');
        }

        // Hapus gambar barang dari direktori jika ada
        $imagePath = BASEURL . "/public/images/barang/" . $barang['gambar'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Hapus data barang dari database
        $proc = $this->barangModel->delete($id);

        if ($proc) {
            Message::setFlash('success', 'Berhasil!', 'Barang berhasil dihapus.');
        } else {
            Message::setFlash('error', 'Gagal!', 'Barang gagal dihapus.');
        }

        $this->redirect('barang');
    }
}
