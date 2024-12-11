<?php
include 'koneksi.php';
$id = $_GET ['idd'];
mysqli_query ($conn, "DELETE FROM pengaduan WHERE id_pengaduan ='$id'");
header ("location: data_pengaduan.php");
?>