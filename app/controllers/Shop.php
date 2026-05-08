<?php
// app/controllers/Shop.php

class Shop extends Controller {
    public function index() {
        header('Location: ' . BASEURL . '/Home');
        exit;
    }

    public function fashion() {
        $data['judul'] = 'Fashion Collection';
        $data['hide_nav'] = true;
        // Ambil produk kategori Fashion (ID: 1)
        $data['produk'] = $this->model('Produk_model')->getProdukByKategori(1);
        $this->view('shop/fashion', $data);
    }

    public function accessories() {
        $data['judul'] = 'Accessories Collection';
        $data['hide_nav'] = true;
        // Ambil produk kategori Aksesoris (ID: 2)
        $data['produk'] = $this->model('Produk_model')->getProdukByKategori(2);
        $this->view('shop/accessories', $data);
    }

    public function search() {
        $data['judul'] = 'Search Results';
        $data['produk'] = $this->model('Produk_model')->cariDataProduk();
        $this->view('shop/search', $data);
    }

    public function detail($id) {
        $data['produk'] = $this->model('Produk_model')->getProdukById($id);
        $data['judul'] = $data['produk']['nama_produk'];
        // Ambil produk terkait (kategori sama, kecuali produk ini sendiri)
        $data['produk_terkait'] = $this->model('Produk_model')->getProdukByKategori($data['produk']['id_kategori']);
        // Filter agar produk yang sedang dilihat tidak muncul di produk terkait
        $data['produk_terkait'] = array_filter($data['produk_terkait'], function($p) use ($id) {
            return $p['id'] != $id;
        });
        $this->view('shop/detail', $data);
    }
}
