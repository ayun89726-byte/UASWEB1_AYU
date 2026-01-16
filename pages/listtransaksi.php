<div class="card">
    <h3>List Transaksi</h3>
    <a href="dashboard.php?page=tambah_transaksi" class="btn btn-primary" style="margin-bottom: 20px; display: inline-block;">+ Tambah Transaksi</a>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>ID Pelanggan</th>
                <th>Total Harga</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $no = 1;
            // Mengambil data dari tabel transaksi
            $query = mysqli_query($conn, "SELECT * FROM transaksi");
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['id-transaksi']; ?></td>
                    <td><?= $row['tgl_transaksi']; ?></td>
                    <td><?= $row['id_pelanggan']; ?></td>
                    <td>Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                    <td><?= $row['keterangan']; ?></td>
                    <td>
                        <a href="dashboard.php?page=edit_transaksi&id=<?= $row['id-transaksi']; ?>" class="btn btn-edit">Edit</a>
                        <a href="dashboard.php?page=hapus_transaksi&id=<?= $row['id-transaksi']; ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<style>
    .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; color: white; font-size: 12px; }
    .btn-primary { background-color: #3498db; }
    .btn-edit { background-color: #f1c40f; margin-right: 5px; }
    .btn-hapus { background-color: #e74c3c; }
    .card { background: white; padding: 20px; border-radius: 8px; }
</style>