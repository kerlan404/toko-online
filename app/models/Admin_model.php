<?php
// app/models/Admin_model.php

class Admin_model {
    private $table = 'admin';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($email, $password) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE email = :email");
        $this->db->bind('email', $email);
        $admin = $this->db->single();

        if($admin && password_verify($password, $admin['password'])) {
            return $admin;
        }
        return false;
    }
}
