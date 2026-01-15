<?php
include 'koneksi.php';

// Mengambil data transaksi dan menggabungkannya dengan tabel pelanggan
$query = "SELECT transaksi.*, pelanggan.nama_pelanggan 
          FROM transaksi 
          LEFT JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan 
          ORDER BY transaksi.tgl_transaksi DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Transaksi</title>
    <style>
        table { width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        tr:nth-child(even) { background-color: #fafafa; }
    </style>
</head>
<body>

    <h2>Riwayat Transaksi Penjualan</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Total Harga</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id_transaksi']; ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['tgl_transaksi'])); ?></td>
                <td><?= $row['nama_pelanggan'] ?? 'Umum/Tamu'; ?></td>
                <td>Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                <td><?= $row['keterangan']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>