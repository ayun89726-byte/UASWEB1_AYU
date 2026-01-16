<?php
include 'koneksi.php';

// 1. Ambil ID dari URL
// Kita gunakan 'id' sesuai dengan link yang ada di listtransaksi
$id = $_GET['id'];

// 2. Ambil data lama dari database untuk ditampilkan di form
// Gunakan backtick `` pada id-transaksi karena ada tanda hubung
$query_lama = mysqli_query($conn, "SELECT * FROM transaksi WHERE `id-transaksi` = '$id'");
$data = mysqli_fetch_assoc($query_lama);

// 3. Logika untuk menyimpan perubahan (Update)
if (isset($_POST['update'])) {
    $tgl = $_POST['tgl_transaksi'];
    $pel = $_POST['id_pelanggan'];
    $hrg = $_POST['total_harga'];
    $ket = $_POST['keterangan'];

    $query_update = "UPDATE transaksi SET 
                    tgl_transaksi = '$tgl', 
                    id_pelanggan = '$pel', 
                    total_harga = '$hrg', 
                    keterangan = '$ket' 
                    WHERE `id-transaksi` = '$id'";
    
    $hasil = mysqli_query($conn, $query_update);

    if ($hasil) {
        echo "<script>alert('Data Berhasil Diubah'); window.location='dashboard.php?page=listtransaksi';</script>";
    } else {
        echo "Gagal Update: " . mysqli_error($conn);
    }
}
?>

<style>
    .card { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
    .form-control { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
    .btn-update { background: #f1c40f; color: #000; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
    .btn-batal { background: #95a5a6; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block; }
</style>

<div class="card">
    <h3>Edit Transaksi (ID: <?= $data['id-transaksi']; ?>)</h3>
    <form method="post">
        <div class="form-group">
            <label>Tanggal Transaksi</label>
            <input type="datetime-local" name="tgl_transaksi" class="form-control" 
                   value="<?= date('Y-m-d\TH:i', strtotime($data['tgl_transaksi'])); ?>" required>
        </div>

        <div class="form-group">
            <label>ID Pelanggan</label>
            <input type="number" name="id_pelanggan" class="form-control" value="<?= $data['id_pelanggan']; ?>" required>
        </div>

        <div class="form-group">
            <label>Total Harga</label>
            <input type="number" name="total_harga" class="form-control" value="<?= $data['total_harga']; ?>" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?= $data['keterangan']; ?>" required>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" name="update" class="btn-update">Update Data</button>
            <a href="dashboard.php?page=listtransaksi" class="btn-batal">Batal</a>
        </div>
    </form>
</div>