<?php
include 'koneksi.php';
$id = $_GET ['idd'];
mysqli_query ($conn, "DELETE FROM data_masyarakat WHERE id_masarakat ='$id'");
header ("location: data_masarakat.php");
?>