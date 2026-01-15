<?php
include 'koneksi.php';

$id = $_GET['id'];

/* PROSES UPDATE */
if (isset($_POST['update'])) {
    mysqli_query($conn, "
        UPDATE pelanggan SET
            id_pelanggan='$_POST[id_pelanggan]',
            kode_pelanggan='$_POST[kode_pelanggan]',
            nama_pelanggan='$_POST[nama_pelanggan]',
            alamat='$_POST[alamat]',
            no_hp='$_POST[no_hp]',
            email='$_POST[email]'
        WHERE id_pelanggan='$id'
    ");

    header("Location: dashboard.php?page=listpelanggan");
}

/* AMBIL DATA */
$id = $_GET['id']; // <--- Tambahkan baris ini
$query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$data = mysqli_fetch_assoc($query);
$query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$data = mysqli_fetch_assoc($query);
?>

<style>
    .card {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        max-width: 720px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        margin: 20px auto; /* Tambahan agar ke tengah */
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }

    input {
        width: 100%;
        padding: 10px;
        box-sizing: border-box; /* Agar padding tidak merusak lebar */
    }

    .btn-edit {
        background: #2980b9;
        color: #fff;
        padding: 8px 16px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-hapus {
        background: #c0392b;
        color: #fff;
        padding: 8px 16px;
        text-decoration: none;
        display: inline-block;
    }
</style>

<div class="card">
    <h3>Edit Pelanggan</h3>
    <form method="post">
        <div class="form-group">
            <label>id pelanggan</label>
            <input type="text" name="id_pelanggan" value="<?= $data['id_pelanggan']; ?>" required>
        </div>

        <div class="form-group">
            <label>kode pelanggan</label>
            <input type="text" name="kode_pelanggan" value="<?= $data['kode_pelanggan']; ?>" required>
        </div>

        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" value="<?= $data['nama_pelanggan']; ?>">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= $data['alamat']; ?>" required>
        </div>

        <div class="form-group">
            <label>no_hp</label>
            <input type="number" name="no_hp" value="<?= $data['no_hp']; ?>" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?= $data['email']; ?>">
        </div>

        <button type="submit" name="update" class="btn-edit">Update</button>
        <a href="dashboard.php?page=listpelanggan" class="btn-hapus"> Batal</a>
    </form>
</div>