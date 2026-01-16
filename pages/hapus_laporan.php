<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM laporan WHERE id_laporan='$id'");

header("Location: dashboard.php?page=listproducts");