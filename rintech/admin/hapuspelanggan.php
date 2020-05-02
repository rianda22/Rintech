<?php

$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan='$id'");

echo "<script>alert('data terhapus');</script>";
echo "<script>location= 'index.php?halaman=pelanggan';</script>";


  ?>