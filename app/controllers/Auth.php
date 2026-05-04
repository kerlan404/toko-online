<?php
// app/controllers/Auth.php

class Auth extends Controller {
    public function index() {
        if(isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/Home');
            exit;
        }
        $this->view('auth/index');
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = $this->model('User_model');
        $adminModel = $this->model('Admin_model');

        // Cek Admin dulu
        $admin = $adminModel->login($email, $password);
        if($admin) {
            $_SESSION['admin'] = $admin;
            echo json_encode(['status' => 'success', 'message' => 'Login Admin Berhasil!', 'role' => 'admin']);
            return;
        }

        // Cek Pelanggan
        $user = $userModel->login($email, $password);
        if($user) {
            $_SESSION['user'] = $user;
            echo json_encode(['status' => 'success', 'message' => 'Login Berhasil!', 'role' => 'user']);
            return;
        }

        echo json_encode(['status' => 'error', 'message' => 'Email atau Password salah!']);
    }

    public function register() {
        $data = [
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $userModel = $this->model('User_model');
        
        // Cek email duplikat
        if($userModel->getUserByEmail($data['email'])) {
            echo json_encode(['status' => 'error', 'message' => 'Email sudah terdaftar!']);
            return;
        }

        $userId = $userModel->register($data);
        if($userId) {
            // AUTO LOGIN
            $user = $userModel->login($data['email'], $data['password']);
            $_SESSION['user'] = $user;
            echo json_encode(['status' => 'success', 'message' => 'Registrasi Berhasil!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan!']);
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: ' . BASEURL . '/Auth');
        exit;
    }
}
