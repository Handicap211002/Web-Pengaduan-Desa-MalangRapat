<?php
session_start();
include 'koneksi.php';
if(!isset ($_SESSION['level'])){
	header ("location: index.php");
	}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<style type="text/css">
.head {
	width:100%;
	height:100px;
	border-bottom:1px solid;
	}
</style>
<div class="head">
<table>
<tr>
<td width="10%"><img src="img/Bintan.png" width="80px" /></td>
<td align="center" width="90%"><font style="font-size:22px; font-family:Arial, Helvetica, sans-serif;">PEMERINTAH KABUPATEN BINTAN<br />KECAMATAN GUNUNG KIJANG<br/>DESA MALANG RAPAT</font><br /><i><font style="font-size:15px;">Jalan Trikora IV Km. 43 Desa Malang Rapat 29151</font></i></td>
</tr>
</table>
</div><br /><br />
<div style="font-size:24px; text-align:center;">Laporan User Masyarakat</div><br /><br />
<table align="center" border="1" cellpadding="8" cellspacing="0">
<tr>
			<th>No</th>
			<th>Nama</th>
			<th>NIK</th>
			<th>Alamat</th>
            <th>RT/RW</th>
            <th>Telepon</th>
		</tr>
<?php
$no = 1;
$query = mysqli_query ($conn, "SELECT * FROM masyarakat");
if (mysqli_num_rows ($query)){
while ($data = mysqli_fetch_array ($query)) {
?>
<tr align="left">
<tr>
<td><?php echo $no++ ?></td>
<td><?php echo $data['nama'] ?></td>
<td><?php echo $data['nik'] ?></td>
<td><?php echo $data['alamat'] ?></td>
<td><?php echo $data['rt_rw'] ?></td>
<td><?php echo $data['tlp'] ?></td>
</tr>
<?php }}else{
	echo '<tr><td colspan="6" align="center">TIDAK ADA DATA</td></tr>';
}?>
</table>
<br/>
<table class="titik">
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Malang Rapat,.........................<script>document.write(new Date().getFullYear());</script></td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KEPALA Malang Rapat</td>
</tr>
</table>
<br/><br/><br/><br/>
<table class="titik">
<tr>
<td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>. . . . . . . . . . . . . . . . . . . . . .</u></b></td>
</tr>
</table>
<script>
window.print() 
</script>
</body>
</html>
<?php } ?>