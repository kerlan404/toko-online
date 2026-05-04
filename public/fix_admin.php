<?php
// fix_admin.php
require_once '../config/config.php';
require_once '../app/core/Database.php';

$db = new Database();
$pass = password_hash('admin123', PASSWORD_DEFAULT);

$db->query("UPDATE admin SET password = :pass WHERE email = 'admin@gmail.com'");
$db->bind('pass', $pass);

if($db->execute()) {
    echo "SUCCESS: Password Admin telah diperbarui menjadi 'admin123'\n";
} else {
    echo "ERROR: Gagal memperbarui password\n";
}
unlink(__FILE__); // Hapus file ini setelah dijalankan untuk keamanan
