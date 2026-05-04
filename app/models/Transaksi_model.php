<?php
// app/models/Transaksi_model.php

class Transaksi_model {
    private $table = 'pesanan';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function buatPesanan($data) {
        $id_pelanggan = $data['id_pelanggan'];
        $id_kurir = $data['id_kurir'];
        $subtotal = $data['subtotal'];
        $ongkir = $data['ongkir'];

        // LOGIC UTAMA: Lock Total Final di Rp 75.000
        $total_target = 75000.00;
        $potongan_promo = ($subtotal + $ongkir) - $total_target;
        
        $invoice = 'INV-' . time();

        $query = "INSERT INTO " . $this->table . " 
                  (id_pelanggan, id_kurir, nomor_invoice, total_harga_produk, biaya_pengiriman, potongan_promo, total_final, status_pesanan) 
                  VALUES 
                  (:id_pelanggan, :id_kurir, :invoice, :subtotal, :ongkir, :potongan, :total_final, 'pending')";

        $this->db->query($query);
        $this->db->bind('id_pelanggan', $id_pelanggan);
        $this->db->bind('id_kurir', $id_kurir);
        $this->db->bind('invoice', $invoice);
        $this->db->bind('subtotal', $subtotal);
        $this->db->bind('ongkir', $ongkir);
        $this->db->bind('potongan', $potongan_promo);
        $this->db->bind('total_final', $total_target);

        $this->db->execute();
        return $this->db->lastInsertId();
    }
}
