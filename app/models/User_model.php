<?php
// app/models/User_model.php

class User_model {
    private $table = 'pelanggan';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($data) {
        $query = "INSERT INTO " . $this->table . " (nama_lengkap, email, password) VALUES (:nama, :email, :password)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        
        if($this->db->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    public function login($email, $password) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE email = :email");
        $this->db->bind('email', $email);
        $user = $this->db->single();

        if($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getUserByEmail($email) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE email = :email");
        $this->db->bind('email', $email);
        return $this->db->single();
    }
}
