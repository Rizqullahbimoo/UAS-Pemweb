<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './koneksi.php'; // Pastikan file koneksi sudah ada
    require_once './mahasiswa_controller.php';
    
    $controller = new MahasiswaController();
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'dob' => $_POST['dob'],
        'favoritePlayer' => $_POST['favoritePlayer'],
        'position' => $_POST['position']
    ];
	
	$result = $controller->saveMahasiswa($data);
    
    if ($result === "Data berhasil disimpan!") {
        header("Location: table.php");
        exit();
    } else {
        echo $result; // Menampilkan error jika terjadi
    }
}
