<?php
// app/controllers/Shop.php

class Shop extends Controller {
    public function index() {
        header('Location: ' . BASEURL . '/Home');
        exit;
    }

    public function fashion() {
        $data['judul'] = 'Fashion Collection';
        // Ambil produk kategori Fashion (ID: 1)
        $data['produk'] = $this->model('Produk_model')->getProdukByKategori(1);
        $this->view('shop/fashion', $data);
    }

    public function accessories() {
        $data['judul'] = 'Accessories Collection';
        // Ambil produk kategori Aksesoris (ID: 2)
        $data['produk'] = $this->model('Produk_model')->getProdukByKategori(2);
        $this->view('shop/accessories', $data);
    }
}
