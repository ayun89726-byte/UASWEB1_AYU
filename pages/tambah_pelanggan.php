<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];
    $email  = $_POST['email'];

    // Kita coba simpan dengan asumsi nama kolom standar
   $sql = "INSERT INTO pelanggan (nama_pelanggan, alamat, no_hp, email)
    VALUES ('$nama', '$alamat', '$no_hp', '$email')";

    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='dashboard.php?page=listPelanggan';</script>";
    } else {
        // JIKA ERROR: Kode ini akan membongkar isi tabel kamu agar kita tahu nama kolom yang benar
        echo "<h3>Terjadi Kesalahan Database!</h3>";
        echo "Pesan Error: " . mysqli_error($conn) . "<br><br>";
        echo "<b>Daftar nama kolom yang ada di tabel 'pelanggan' kamu adalah:</b><br>";
        
        $cek_kolom = mysqli_query($conn, "SHOW COLUMNS FROM pelanggan");
        echo "<ul>";
        while($row = mysqli_fetch_array($cek_kolom)){
            echo "<li>" . $row['Field'] . "</li>";
        }
        echo "</ul>";
        echo "<p>Silakan sesuaikan nama kolom di dalam query INSERT dengan daftar di atas.</p>";
        die();
    }
}
?>

<div style="padding: 20px; font-family: Arial;">
    <h3>Form Tambah Pelanggan</h3>
    <form method="POST">
        Nama Pelanggan:<br>
        <input type="text" name="nama" required><br><br>
        Alamat:<br>
        <textarea name="alamat" required></textarea><br><br>
        No HP:<br>
        <input type="text" name="no_hp" required><br><br>
        Email:<br>
        <input type="email" name="email" required><br><br>
        <button type="submit" name="simpan">Simpan Data</button>
    </form>
</div>