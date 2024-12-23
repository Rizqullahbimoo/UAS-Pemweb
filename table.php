<?php
require_once './koneksi.php';
require_once './mahasiswa_controller.php';

$controller = new MahasiswaController();
$mahasiswaList = $controller->getMahasiswa();
?>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Tabel Data Idola Saya</title>
    <style>
        th {
            position: sticky;
            top: 0;
            background-color: #f2f2f2;
        }

        .scrollable {
            height: 400px;
            overflow-y: scroll;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <header class="bg-dark text-white text-center py-3">
            <h1>Tabel Data Idola Saya</h1>
            <img src="logo.png" alt="Logo Idola Saya" class="img-fluid">
        </header>
        <?php

        // Tampilkan pesan sukses
        if (isset($_SESSION['success_message'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
            unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan
        }

        // Tampilkan pesan error
        if (isset($_SESSION['error_message'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
            unset($_SESSION['error_message']); // Hapus pesan setelah ditampilkan
        }
        ?>


        <div class="row">
            <aside class="col-12 col-sm-4 col-md-3 bg-light p-3">
                <h2 class="h5">Menu</h2>
                <ul class="list-group">
                    <li class="list-group-item"><a href="index.html">Halaman Utama</a></li>
                    <li class="list-group-item"><a href="form.html">Formulir</a></li>
                    <li class="list-group-item"><a href="table.php">Tabel Data</a></li>
                </ul>
            </aside>

            <main class="col-12 col-sm-8 col-md-9 py-3">
                <div class="scrollable">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Lahir</th>
                                <th>Pemain Favorit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($mahasiswaList)): ?>
                                <?php foreach ($mahasiswaList as $index => $mahasiswa): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= htmlspecialchars($mahasiswa['name']) ?></td>
                                        <td><?= htmlspecialchars($mahasiswa['email']) ?></td>
                                        <td><?= htmlspecialchars($mahasiswa['dob']) ?></td>
                                        <td><?= htmlspecialchars($mahasiswa['favorite_player']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data tersedia.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>