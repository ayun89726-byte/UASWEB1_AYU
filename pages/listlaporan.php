<?php
// Pastikan file koneksi menggunakan mysqli agar sesuai dengan gaya codingan Anda
include 'koneksi.php';

// Query mengambil data dari tabel laporan
$data = mysqli_query($conn, "SELECT * FROM laporan ORDER BY tanggal_laporan DESC");
?>

<style>
    .card {
        background: white;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    .btn {
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 4px;
        color: white;
        font-size: 14px;
        display: inline-block;
    }
    .btn-tambah { background: #27ae60; }
    .btn-edit { background: #2980b9; }
    .btn-hapus { background: #c0392b; }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }
    th {
        background: #f8f8f8;
    }
    /* Tambahan agar angka pendapatan rata kanan */
    .text-right {
        text-align: right;
    }
</style>

<div class="card">
    <div class="card-header">
        <h3>List Laporan Penjualan</h3>
        <a href="dashboard.php?page=tambah_laporan" class="btn btn-tambah">+ Tambah Laporan</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Periode</th>
                <th>Total Transaksi</th>
                <th>Total Pendapatan</th>
                <th>Keterangan</th>
                <th>Tanggal Laporan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['periode']); ?></td>
                <td><?= $row['total_transaksi']; ?></td>
                <td class="text-right">Rp <?= number_format($row['total_pendapatan'], 0, ',', '.'); ?></td>
                <td><?= htmlspecialchars($row['keterangan']); ?></td>
                <td><?= date('d-m-Y H:i', strtotime($row['tanggal_laporan'])); ?></td>
                <td>
                    <a href="dashboard.php?page=edit_laporan&id=<?= $row['id_laporan']; ?>" class="btn btn-edit">Edit</a>
                    <a href="dashboard.php?page=hapus_laporan&id=<?= $row['id_laporan']; ?>" 
                       class="btn btn-hapus" 
                       onclick="return confirm('Yakin hapus laporan ini?')">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php } ?>
            
            <?php if(mysqli_num_rows($data) == 0): ?>
            <tr>
                <td colspan="7">Belum ada data laporan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>