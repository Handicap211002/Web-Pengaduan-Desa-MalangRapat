<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Masyarakat</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
					SILAHKAN LOGIN
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="user" required="required" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" required="required" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						
					</div>

					<div class="container-login100-form-btn">
						<button name="login" class="login100-form-btn">
							<i class="fa fa-sign-in"></i> Login
						</button>
						<?php
if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Validasi input untuk mencegah SQL Injection
    $user = mysqli_real_escape_string($conn, $user);
    $pass = mysqli_real_escape_string($conn, $pass);

    // Query ke database
    $query = "SELECT * FROM masyarakat WHERE username = '$user' AND password = '$pass'";
    $data_user = mysqli_query($conn, $query);

    // Periksa apakah ada hasil dari query
    if ($data_user && mysqli_num_rows($data_user) > 0) {
        $r = mysqli_fetch_array($data_user);
        
        // Ambil data pengguna
        $username = $r['username'];
        $password = $r['password'];
        $nama_user = $r['nama'];
        $nik = $r['nik'];
        $tlp = $r['tlp'];

        // Login berhasil
        $_SESSION['nama'] = $nama_user;
        $_SESSION['nik'] = $nik;
        $_SESSION['tlp'] = $tlp;
        echo "<div class='alert alert-success'>Login Sukses</div>";
        echo "<meta http-equiv='refresh' content='1;url=masarakat_admin.php'>";
    } else {
        // Login gagal
        echo "<div class='alert alert-danger'>Login Gagal</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }
}
?>
					</div>
                    <br/>
                    <center>Belum Punya Acount? Registrasi <a href="../registrasi.php" class="txt3">disini</a></center>
                    <br>

					<div>

						<center><a href="../index.php" class="txt3">
							Kembali
						</a></center>
					</div>
                   
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>