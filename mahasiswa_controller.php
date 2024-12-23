<?php
session_start();

class MahasiswaController extends Koneksi {
    // Fungsi untuk mendapatkan semua data mahasiswa
    public function getMahasiswa() {
        $conn = $this->getConnection();
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $data = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Fungsi untuk menyimpan data mahasiswa
    public function saveMahasiswa($data) {
        $conn = $this->getConnection();
        
        // Menggunakan prepared statement untuk mencegah SQL Injection
        $sql = "INSERT INTO users (name, email, dob, favorite_player, position) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param(
                "sssss", 
                $data['name'], 
                $data['email'], 
                $data['dob'], 
                $data['favoritePlayer'], 
                $data['position']
            );
            
            // Eksekusi perintah
            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Data berhasil disimpan!";
                header("Location: table.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Gagal menyimpan data: " . $stmt->error;
            }
        } else {
            $_SESSION['error_message'] = "Gagal menyiapkan query: " . $conn->error;
        }
    }
}
