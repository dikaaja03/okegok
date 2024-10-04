<?php
include "koneksi.php"; // Pastikan file koneksi.php berisi koneksi ke database

$pendaftaran_berhasil = false; // Inisialisasi variabel untuk menandakan apakah pendaftaran berhasil

if (isset($_POST["proses"])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $wa = $_POST['wa'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];

    // Query untuk memasukkan data ke tabel siswa_mendaftar
    $query = "INSERT INTO siswa_mendaftar (nama, alamat, wa, email, jenis_kelamin, agama, sekolah_asal)
              VALUES ('$nama', '$alamat', '$wa', '$email', '$jenis_kelamin', '$agama', '$sekolah_asal')";

    // Jalankan query dan cek apakah berhasil
    if (mysqli_query($conn, $query)) {
        $pendaftaran_berhasil = true; // Set variabel menjadi true jika pendaftaran berhasil
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Mahasiswa Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 400px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            border: 2px solid #ddd;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .logo-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 100px;
            height: auto;
        }
        h2, h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border: 1px solid #d6e9c6;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            width: 100%;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        label {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
        input, select, textarea {
            margin-top: 5px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border: none;
            padding: 12px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .container-footer {
            margin-top: 10px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Bagian Logo -->
        <div class="logo-container">
            <img src="logosmk.jpeg" alt="Logo SMK">
            <img src="logouniv.jpeg" alt="Logo Universitas">
        </div>

        <!-- Tampilkan pesan jika pendaftaran berhasil -->
        <?php if ($pendaftaran_berhasil): ?>
            <div class="success-message">
                Pendaftaran berhasil!
            </div>
        <?php endif; ?>

        <!-- Judul Pendaftaran -->
        <h2>PENDAFTARAN MAHASISWA BARU</h2>
        <h3>UNIVERSITAS NEGERI YOGYAKARTA</h3>
        <h3>TAHUN 2023/2024</h3>

        <!-- Formulir Pendaftaran -->
        <form action="" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required></textarea>

            <label for="wa">No. WA:</label>
            <input type="tel" id="wa" name="wa" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label for="agama">Agama:</label>
            <select id="agama" name="agama" required>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
            </select>

            <label for="sekolah_asal">Sekolah Asal:</label>
            <input type="text" id="sekolah_asal" name="sekolah_asal" required>

            <input type="submit" name="proses" value="Daftar">
        </form>

        <!-- Bagian Footer -->
        <div class="container-footer">
        </div>
    </div>

</body>
</html>
