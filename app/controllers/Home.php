<?php
// app/controllers/Home.php

class Home extends Controller {
    public function index() {
        $produkModel = $this->model('Produk_model');
        // Dummy data jika belum ada di DB
        $data['produk'] = $produkModel->getAllProduk();
        $this->view('home/index', $data);
    }
}
