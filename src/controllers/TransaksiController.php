<?php

class TransaksiController extends BaseController
{
    private $barangModel;
    private $transaksiModel;
    public function __construct()
    {
        $this->barangModel = $this->model('BarangModel');
        $this->transaksiModel = $this->model('TransaksiModel'); 
    }

    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'label1' => 'Main Menu',
            'label2' => 'Transaksi',
            'label3' => '',
            'barang' => $this->barangModel->getAll()
        ];

        $this->view('partials/header', $data);
        $this->view('transaksi/index', $data);
        $this->view('partials/footer');
    }

    public function list()
    {
        $data = [
            'title' => 'Transaksi',
            'label1' => 'Main Menu',
            'label2' => 'Transaksi',
            'label3' => 'Riwayat'
        ];
        $this->view('partials/header', $data);
        $this->view('transaksi/list', $data);
        $this->view('partials/footer');
    }

    // public function insert()
    // {
    //     $data = [
    //         'title' => 'Transaksi',
    //     ];
    //     $this->view('partials/header', $data);
    //     $this->view('transaksi/insert', $data);
    //     $this->view('partials/footer');
    // }

    // public function insert_transaksi()
    // {
    //     $data = [
    //         'title' => 'Transaksi',
    //     ];
    // }

    public function simpanTransaksi()
    {

        $id_pelanggan = $_POST['id_pelanggan'];
        $total_harga = $_POST['total_harga'];
        $uang_dibayar = $_POST['uang_dibayar'];
        $uang_kembalian = $uang_dibayar - $total_harga;
        $id_pegawai = $_SESSION['user_id']; // Ambil dari session login

        // Simpan transaksi
        $id_transaksi = $this->transaksiModel->insertTransaksi([
            'id_pelanggan' => $id_pelanggan,
            'id_pegawai' => $id_pegawai,
            'total_harga' => $total_harga,
            'uang_dibayar' => $uang_dibayar,
            'uang_kembalian' => $uang_kembalian
        ]);

        // Simpan detail transaksi
        foreach ($_POST['cart'] as $item) {
            $transaksiModel->insertDetailTransaksi([
                'id_transaksi' => $id_transaksi,
                'id_barang' => $item['id_barang'],
                'jumlah' => $item['quantity']
            ]);
        }

        // Redirect ke halaman riwayat transaksi
        $this->redirect('transaksi/riwayat');
    }
}
