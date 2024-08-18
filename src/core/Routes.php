<?php

class Routes
{
    public function run()
    {
        $router = new App;
        $router->setDefaultController('DefaultApp');
        $router->setDefaultMethod('index');

        $router->get('/barang', ['BarangController', 'index']);
        $router->get('/barang/insert', ['BarangController', 'insert']);
        $router->get('/barang/edit', ['BarangController', 'edit']);
        $router->post('/barang/insert_barang', ['BarangController', 'insert_barang']);
        $router->post('/barang/edit_barang', ['BarangController', 'edit_barang']);

        $router->get('/transaksi', ['TransaksiController', 'index']);
        $router->get('/transaksi/riwayat', ['TransaksiController', 'list']);
        $router->get('/transaksi/insert', ['TransaksiController', 'insert']);
        $router->get('/transaksi/edit', ['TransaksiController', 'edit']);
        $router->post('/transaksi/insert_transaksi', ['TransaksiController', 'insert_transaksi']);
        $router->post('/transaksi/edit_transaksi', ['TransaksiController', 'edit_transaksi']);


        $router->run();
    }
}
