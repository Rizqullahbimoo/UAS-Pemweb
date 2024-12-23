<?php
class Koneksi {
    private $host = '127.0.0.1';  // Host database
    private $user = 'root';       // Username database
    private $password = '';       // Password database
    private $dbname = 'uas-bimo'; // Nama database
    private $conn;                // Property untuk koneksi

    // Constructor untuk membuat koneksi saat kelas diinisialisasi
    public function __construct() {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->dbname
        );

        // Cek jika koneksi gagal
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    // Fungsi untuk mendapatkan koneksi
    public function getConnection() {
        return $this->conn;
    }

    // Destructor untuk menutup koneksi
    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
