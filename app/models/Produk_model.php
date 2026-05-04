<?php
// app/models/Produk_model.php

class Produk_model {
    private $table = 'produk';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllProduk() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getProdukByKategori($id_kategori) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_kategori = :id_kategori");
        $this->db->bind('id_kategori', $id_kategori);
        return $this->db->resultSet();
    }

    public function getProdukById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataProduk($data) {
        $query = "INSERT INTO produk (nama_produk, harga, stok, id_kategori, gambar, deskripsi) 
                  VALUES (:nama_produk, :harga, :stok, :id_kategori, :gambar, :deskripsi)";
        $this->db->query($query);
        $this->db->bind('nama_produk', $data['nama_produk']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataProduk($id) {
        $query = "DELETE FROM produk WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataProduk($data) {
        $query = "UPDATE produk SET 
                    nama_produk = :nama_produk,
                    harga = :harga,
                    stok = :stok,
                    id_kategori = :id_kategori,
                    gambar = :gambar,
                    deskripsi = :deskripsi
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama_produk', $data['nama_produk']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
