<?php
include 'koneksi.php';

// Menangkap ID dari URL
$id = $_GET['id'];

/* PROSES UPDATE */
if (isset($_POST['update'])) {
    $periode          = $_POST['periode'];
    $total_transaksi  = $_POST['total_transaksi'];
    $total_pendapatan = $_POST['total_pendapatan'];
    $keterangan       = $_POST['keterangan'];
    $tanggal_laporan  = $_POST['tanggal_laporan'];

    $update = mysqli_query($conn, "
        UPDATE laporan SET
            periode          = '$periode',
            total_transaksi  = '$total_transaksi',
            total_pendapatan = '$total_pendapatan',
            keterangan       = '$keterangan',
            tanggal_laporan  = '$tanggal_laporan'
        WHERE id_laporan = '$id'
    ");

    if ($update) {
        echo "<script>alert('Laporan berhasil diperbarui!'); window.location='dashboard.php?page=list_laporan';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}

/* AMBIL DATA LAMA */
$query = mysqli_query($conn, "SELECT * FROM laporan WHERE id_laporan='$id'");
$data  = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='dashboard.php?page=list_laporan';</script>";
    exit;
}
?>

<style>
    .card {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        max-width: 720px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        margin: 20px auto; 
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-edit {
        background: #2980b9;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-batal {
        background: #c0392b;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
    }
</style>

<div class="card">
    <h3>Edit Laporan Penjualan</h3>
    <form method="post">
        <div class="form-group">
            <label>Periode Laporan</label>
            <input type="text" name="periode" value="<?= $data['periode']; ?>" required>
        </div>

        <div class="form-group">
            <label>Total Transaksi</label>
            <input type="number" name="total_transaksi" value="<?= $data['total_transaksi']; ?>" required>
        </div>

        <div class="form-group">
            <label>Total Pendapatan (Rp)</label>
            <input type="number" step="0.01" name="total_pendapatan" value="<?= $data['total_pendapatan']; ?>" required>
        </div>

        <div class="form-group">
            <label>Tanggal Laporan</label>
            <input type="datetime-local" name="tanggal_laporan" 
                   value="<?= date('Y-m-d\TH:i', strtotime($data['tanggal_laporan'])); ?>" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" rows="4"><?= $data['keterangan']; ?></textarea>
        </div>

        <button type="submit" name="update" class="btn-edit">Update Laporan</button>
        <a href="dashboard.php?page=list_laporan" class="btn-batal">Batal</a>
    </form>
</div>