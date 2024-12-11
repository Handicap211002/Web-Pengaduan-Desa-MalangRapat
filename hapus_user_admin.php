<?php
include 'koneksi.php';
$id = $_GET ['idd'];
mysqli_query ($conn, "DELETE FROM petugas WHERE id_petugas ='$id'");
header ("location: user_admin.php");
?>