<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM transaksi WHERE `id-transaksi`='$id'");

header("Location: dashboard.php?page=listproducts");