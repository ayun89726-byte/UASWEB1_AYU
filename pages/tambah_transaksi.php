<?php
include 'koneksi.php'; 

// 1. Logika PHP untuk Simpan Data
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $id_pelanggan  = $_POST['id_pelanggan'];
    $total_harga   = $_POST['total_harga'];
    $keterangan    = $_POST['keterangan'];

    // Perhatikan penggunaan backtick `id-transaksi` karena ada tanda hubung di nama kolom database kamu
    $query = "INSERT INTO transaksi (`tgl_transaksi`, `id_pelanggan`, `total_harga`, `keterangan`) 
              VALUES ('$tgl_transaksi', '$id_pelanggan', '$total_harga', '$keterangan')";
    
    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        echo "<script>alert('Data Berhasil Disimpan'); window.location='dashboard.php?page=listtransaksi';</script>";
    } else {
        echo "Error SQL: " . mysqli_error($conn);
    }
}
?>

<style>
    .card { background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; margin-bottom: 5px; font-weight: bold; text-transform: capitalize; }
    .form-control { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
    .btn-tambah { background-color: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
    .btn-hapus { background-color: #e74c3c; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; }
</style>

<div class="card">
    <h3>Tambah Transaksi</h3>
    <form method="post" action="">
        <div class="form-group">
            <label>Tanggal Transaksi</label>
            <input type="datetime-local" name="tgl_transaksi" class="form-control" required>
        </div>

        <div class="form-group">
            <label>ID Pelanggan</label>
            <select name="id_pelanggan" class="form-control" required>
                <option value="">-- Pilih ID Pelanggan --</option>
                <option value="1">1 (Pelanggan Umum)</option>
                </select>
        </div>

        <div class="form-group">
            <label>Total Harga</label>
            <input type="number" name="total_harga" class="form-control" placeholder="Masukkan angka saja" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Contoh: Lunas / Pending" required>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" name="simpan" class="btn-tambah">Simpan Transaksi</button>
            <a href="dashboard.php?page=listtransaksi" class="btn-hapus">Batal</a>
        </div>
    </form>
</div>