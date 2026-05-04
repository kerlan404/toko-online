<?php
// app/controllers/Admin.php

class Admin extends Controller {
    public function index() {
        $this->view('admin/dashboard');
    }

    // --- PROMO CRUD ---
    public function promo() {
        $data['promo'] = $this->model('Promo_model')->getAllPromo();
        $this->view('admin/promo', $data);
    }

    public function tambahPromo() {
        $gambar = $this->uploadGambar('promo');
        if($gambar) $_POST['gambar'] = $gambar;
        
        if( $this->model('Promo_model')->tambahDataPromo($_POST) > 0 ) {
            Flasher::setFlash('Promo', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Admin/promo');
            exit;
        }
    }

    public function ubahPromo() {
        if($_FILES['gambar']['error'] === 0) {
            $gambar = $this->uploadGambar('promo');
            if($gambar) $_POST['gambar'] = $gambar;
        }

        if( $this->model('Promo_model')->ubahDataPromo($_POST) > 0 ) {
            Flasher::setFlash('Promo', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Admin/promo');
            exit;
        }
    }

    // --- PRODUK CRUD ---
    public function produk() {
        $data['produk'] = $this->model('Produk_model')->getAllProduk();
        $this->view('admin/produk', $data);
    }

    public function tambahProduk() {
        $gambar = $this->uploadGambar('produk');
        if($gambar) $_POST['gambar'] = $gambar;

        if( $this->model('Produk_model')->tambahDataProduk($_POST) > 0 ) {
            Flasher::setFlash('Produk', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Admin/produk');
            exit;
        }
    }

    public function ubahProduk() {
        if($_FILES['gambar']['error'] === 0) {
            $gambar = $this->uploadGambar('produk');
            if($gambar) $_POST['gambar'] = $gambar;
        }

        if( $this->model('Produk_model')->ubahDataProduk($_POST) > 0 ) {
            Flasher::setFlash('Produk', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Admin/produk');
            exit;
        }
    }

    private function uploadGambar($folder) {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        if($error === 4) return false;

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(!in_array($ekstensiGambar, $ekstensiGambarValid)) return false;
        if($ukuranFile > 2000000) return false;

        $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
        move_uploaded_file($tmpName, 'assets/image/' . $namaFileBaru);
        return BASEURL . '/assets/image/' . $namaFileBaru;
    }

    // --- SISANYA ---
    public function hapusProduk($id) { $this->model('Produk_model')->hapusDataProduk($id); Flasher::setFlash('Produk', 'dihapus', 'success'); header('Location: ' . BASEURL . '/Admin/produk'); exit; }
    public function hapusPromo($id) { $this->model('Promo_model')->hapusDataPromo($id); Flasher::setFlash('Promo', 'dihapus', 'success'); header('Location: ' . BASEURL . '/Admin/promo'); exit; }
    public function getubahProduk() { echo json_encode($this->model('Produk_model')->getProdukById($_POST['id'])); }
    public function getubahPromo() { echo json_encode($this->model('Promo_model')->getPromoById($_POST['id'])); }
    public function users() { $data['users'] = [['id' => 1, 'nama' => 'Bagas Al Fakhri', 'email' => 'bagas@gmail.com', 'status' => 'Active']]; $this->view('admin/users', $data); }
    public function settings() { $this->view('admin/settings'); }
}
