<?php
// app/models/Promo_model.php

class Promo_model {
    private $table = 'promo';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllPromo() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getPromoById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataPromo($data) {
        $query = "INSERT INTO promo (judul, kode_promo, diskon_persen, deskripsi, gambar, berlaku_sampai) 
                  VALUES (:judul, :kode_promo, :diskon_persen, :deskripsi, :gambar, :berlaku_sampai)";
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('kode_promo', $data['kode_promo']);
        $this->db->bind('diskon_persen', $data['diskon_persen']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('berlaku_sampai', $data['berlaku_sampai']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPromo($id) {
        $query = "DELETE FROM promo WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataPromo($data) {
        $query = "UPDATE promo SET 
                    judul = :judul,
                    kode_promo = :kode_promo,
                    diskon_persen = :diskon_persen,
                    deskripsi = :deskripsi,
                    gambar = :gambar,
                    berlaku_sampai = :berlaku_sampai
                  WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('kode_promo', $data['kode_promo']);
        $this->db->bind('diskon_persen', $data['diskon_persen']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('berlaku_sampai', $data['berlaku_sampai']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
