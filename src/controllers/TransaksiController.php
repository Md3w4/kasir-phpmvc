<?php

class TransaksiController extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'label1' => 'Main Menu',
            'label2' => 'Transaksi',
            'label3' => ''
        ];

        $this->view('partials/header', $data);
        $this->view('transaksi/index', $data);
        $this->view('partials/footer');
    }

    public function list(){
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

    public function insert(){
        $data = [
            'title' => 'Transaksi',
        ];
        $this->view('partials/header', $data);
        $this->view('transaksi/insert', $data);
        $this->view('partials/footer');
    }
}
