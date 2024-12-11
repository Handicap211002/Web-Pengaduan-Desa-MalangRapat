<?php
include 'koneksi.php';
$id = $_GET ['idd'];
mysqli_query ($conn, "DELETE FROM masyarakat WHERE nik ='$id'");
header ("location: user_masarakat.php");
?>