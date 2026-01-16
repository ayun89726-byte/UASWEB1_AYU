<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    // Menangkap data dari form sesuai struktur tabel laporan
    $periode            = $_POST['periode'];
    $total_transaksi    = $_POST['total_transaksi'];
    $total_pendapatan   = $_POST['total_pendapatan'];
    $keterangan         = $_POST['keterangan'];
    $tanggal_laporan    = $_POST['tanggal_laporan'];

    // Query INSERT ke tabel laporan
    // id_laporan tidak dimasukkan karena biasanya Auto Increment
    $query = mysqli_query($conn, "
        INSERT INTO laporan 
        (periode, total_transaksi, total_pendapatan, keterangan, tanggal_laporan) 
        VALUES 
        ('$periode', '$total_transaksi', '$total_pendapatan', '$keterangan', '$tanggal_laporan')
    ");

    if ($query) {
        echo "<script>alert('Data laporan berhasil disimpan!'); window.location='dashboard.php?page=list_laporan';</script>";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>

<style>
/* Menggunakan style yang Anda berikan dengan sedikit penyesuaian */
.card {
    background: #ffffff;
    padding: 30px;
    border-radius: 10px;
    max-width: 720px;
    margin-right: auto;
    margin-left: 0;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}
.card h3 {
    margin-bottom: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}
.form-group {
    margin-bottom: 15px;
}
label {
    display: block;
    font-weight: bold;
    margin-bottom: 6px;
}
input, textarea {
    width: 100%;
    background-color: white;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box; /* Agar padding tidak merusak lebar */
}
input:focus, textarea:focus {
    outline: none;
    border-color: #3498db;
}
.btn {
    padding: 10px 16px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 14px;
    display: inline-block;
}
.btn-tambah { background: #27ae60; }
.btn-tambah:hover { background: #219150; }
.btn-hapus { background: #c0392b; }
.btn-hapus:hover { background: #a93226; }
</style>

<div class="card">
    <h3>Tambah Laporan Baru</h3>
    <form method="post">
        <div class="form-group">
            <label>Periode Laporan (Contoh: Januari 2024)</label>
            <input type="text" name="periode" placeholder="Masukkan periode..." required>
        </div>

        <div class="form-group">
            <label>Total Transaksi</label>
            <input type="number" name="total_transaksi" placeholder="0" required>
        </div>

        <div class="form-group">
            <label>Total Pendapatan (Rp)</label>
            <input type="number" step="0.01" name="total_pendapatan" placeholder="0.00" required>
        </div>

        <div class="form-group">
            <label>Tanggal Laporan</label>
            <input type="datetime-local" name="tanggal_laporan" value="<?= date('Y-m-d\TH:i'); ?>" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" rows="4" placeholder="Tambahkan catatan laporan jika ada..."></textarea>
        </div>

        <button type="submit" name="simpan" class="btn btn-tambah">Simpan Laporan</button>
        <a href="dashboard.php?page=list_laporan" class="btn btn-hapus">Batal</a>
    </form>
</div>