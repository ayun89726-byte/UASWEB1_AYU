<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
$kode = $_POST['tgl_transaksi'];
$nama = $_POST['id_pelanggan'];
$kategori = $_POST['total_harga'];
$harga = $_POST['keterangan'];
mysqli_query($conn, "
INSERT INTO barang
(tgl-transaksi, id_pelanggan, total_harga, keterangan,)
VALUES
('$tgl_transaksi', '$id_pelanggan', '$total_harga', '$keterangan')
");
header("Location: dashboard.php?page=listtransaksi");
}
?>
<style>
/* Card */
.card {
background: #ffffff;
padding: 30px;
border-radius: 10px;
max-width: 720px;
/* INI KUNCINYA */
margin-right: auto;
margin-left: 0;
box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}
/* Judul */
.card h3 {
margin-bottom: 20px;
border-bottom: 1px solid #ddd;
padding-bottom: 10px;
}
/* Form */
.form-group {
margin-bottom: 15px;
}
label {
    display: block;
font-weight: bold;
margin-bottom: 6px;
}
select,input {
width: 100%;
background-color: white;
padding: 10px;
border-radius: 5px;
border: 1px solid #ccc;
}
input:focus {
outline: none;
border-color: #3498db;
}
/* Tombol */
.btn {
padding: 10px 16px;
border-radius: 5px;
text-decoration: none;
color: white;
border: none;
cursor: pointer;
font-size: 14px;
}
.btn-tambah {
background: #27ae60;
}
.btn-tambah:hover {
background: #219150;
}
.btn-hapus {
background: #c0392b;
}
.btn-hapus:hover {
background: #a93226;
}
</style>
<div class="card">
<h3>Tambah transaksi</h3>
<form method="post">
<div class="form-group">
<label>tgl transaksi</label>
<input type="text" name="tgl_transaksi" placeholder="" required>
</div>
<div class="form-group">
    <label>id pelanggan</label>
<input type="select" name="id_pelanggan" placeholder="" required>
</div>
<div class="form-group">
<label>total harga</label>
<number name="total_harga" required>
</div>
<div class="form-group">
<label>keterangan</label>
<input type="number" name="keterangan" placeholder="" required>
</div>
</div>
<button type="submit" name="simpan" class="btn btn-tambah">Simpan</button>
<a href="dashboard.php?page=listtransaksi" class="btn btn-hapus">Batal</a>
</form>
</div>