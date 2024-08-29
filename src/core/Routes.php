<?php

class Routes
{
    public function run()
    {
        $router = new App;
        $router->setDefaultController('DefaultApp');
        $router->setDefaultMethod('index');

        $router->get('/login', ['AuthController', 'showlogin']);
        $router->post('/login', ['AuthController', 'login']);
        $router->get('/logout', ['AuthController', 'logout']);
        $router->get('/register', ['AuthController', 'showRegister']);
        $router->post('/register', ['AuthController', 'register']);

        $router->get('/barang', ['BarangController', 'index']);
        $router->get('/barang/insert', ['BarangController', 'insert']);
        $router->get('/barang/edit', ['BarangController', 'edit']);
        $router->get('/barang/delete', ['BarangController', 'delete_barang']);
        $router->post('/barang/insert_barang', ['BarangController', 'insert_barang']);
        $router->post('/barang/edit_barang', ['BarangController', 'edit_barang']);

        $router->get('/pelanggan', ['PelangganController', 'index']);
        $router->get('/pelanggan/insert', ['PelangganController', 'insert']);
        $router->get('/pelanggan/edit', ['PelangganController', 'edit']);
        $router->get('/pelanggan/delete', ['PelangganController', 'delete_pelanggan']);
        $router->post('/pelanggan/insert_pelanggan', ['PelangganController', 'insert_pelanggan']);
        $router->post('/pelanggan/edit_pelanggan', ['PelangganController', 'edit_pelanggan']);

        $router->get('/transaksi', ['TransaksiController', 'index']);
        $router->get('/transaksi/riwayat', ['TransaksiController', 'list']);
        $router->get('/transaksi/insert', ['TransaksiController', 'insert']);
        $router->get('/transaksi/edit/(:id)', ['TransaksiController', 'edit']);
        $router->post('/transaksi/insert_transaksi', ['TransaksiController', 'insert_transaksi']);
        $router->post('/transaksi/edit_transaksi', ['TransaksiController', 'edit_transaksi']);


        $router->run();
    }
}
