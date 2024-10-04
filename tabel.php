<?php
include "koneksi.php"; // Pastikan file koneksi.php berisi koneksi ke database dbpendaftaran

// Ambil data dari tabel pendaftaran
$query_data = "SELECT * FROM siswa_mendaftar";
$result = mysqli_query($conn, $query_data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar Mahasiswa Baru</title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            border: 2px solid #ddd;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        table thead {
            background-color: #3498db;
            color: white;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #d6e0f5;
            transform: scale(1.01);
            transition: all 0.3s ease;
        }

        th {
            text-transform: uppercase;
        }

        td {
            color: #333;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #777;
            font-size: 18px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Judul Tabel -->
        <h2>Data Pendaftar Mahasiswa Baru 2023/2024</h2>

        <!-- Tabel Data Pendaftaran -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. WA</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $no . "</td>
                                <td>" . $row['nama'] . "</td>
                                <td>" . $row['alamat'] . "</td>
                                <td>" . $row['wa'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['jenis_kelamin'] . "</td>
                                <td>" . $row['agama'] . "</td>
                                <td>" . $row['sekolah_asal'] . "</td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='8' class='no-data'>Belum ada data pendaftar.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            &copy; 2023 Universitas Negeri Yogyakarta
        </div>
    </div>

    <?php
    // Tutup koneksi
    mysqli_close($conn);
    ?>

</body>
</html>
