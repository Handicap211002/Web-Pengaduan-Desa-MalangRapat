<?php
session_start();
include 'koneksi.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HOME</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                         <li><a href="https://www.google.co.id/maps/place/Kantor+Desa+Malang+Rapat/@1.1176925,104.6131761,3a,75y,107.26h,90t/data=!3m7!1e1!3m5!1sc65ScdDYy9eeA9WoNWwPIw!2e0!6shttps:%2F%2Fstreetviewpixels-pa.googleapis.com%2Fv1%2Fthumbnail%3Fcb_client%3Dmaps_sv.tactile%26w%3D900%26h%3D600%26pitch%3D0%26panoid%3Dc65ScdDYy9eeA9WoNWwPIw%26yaw%3D107.2615!7i13312!8i6656!4m14!1m7!3m6!1s0x31d961936682c035:0x36e8c0fed6ce1779!2sKantor+Desa+Malang+Rapat!8m2!3d1.1175842!4d104.6134269!16s%2Fg%2F11ry5t3yyc!3m5!1s0x31d961936682c035:0x36e8c0fed6ce1779!8m2!3d1.1175842!4d104.6134269!16s%2Fg%2F11ry5t3yyc?entry=ttu&g_ep=EgoyMDI0MTIwNC4wIKXMDSoASAFQAw%3D%3D" style="color:white"><i class="fa fa-podcast"> Kantor Desa Malang Rapat Cek Lokasi disini</i></a></li>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope"></i> Desa_Malang_Rapat@gmail.com</a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i>0822-8666-4714</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                            <i class="fa fa-home" style="color:white"><li><a class="active" href="index.php">Home</a></li></i>&nbsp;
                            <i class="fa fa-sign-in" style="color:white"><li><a class="popup-with-form" href="#test-form">Login Admin/Petugas</a></li></i>
                            			</ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="search_button">
                                       
                                    </div>
                                    
                                </div>
                                               <?php
if (isset($_POST ['login'])) {
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$data_user = mysqli_query ($conn,"SELECT * FROM petugas WHERE username ='$user' AND password ='$pass'");
				$r = mysqli_fetch_array ($data_user);
				$username = $r ['username'];
				$password = $r ['password'];
				$nama_user = $r ['nama_petugas'];
				$nik = $r ['level'];
				if ($user == $username && $pass == $password) {
					$_SESSION['nama_petugas'] = $nama_user;
					$_SESSION['level'] = $nik;
		echo "<div class='alert alert-success' style='margin-top:11px'>Login Sukses</div>";
		echo "<meta http-equiv='refresh' content='1;url=admin_petugas.php'>";
		} else {
		echo "<div class='alert alert-danger' style='margin-top:11px'>Login Gagal</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php'>";

	}
	}
?>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
      <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text">
                                <h3> Web Pelaporan<br>
                                    Pengaduan Masyarakat</h3>
                                <p>Selamat datang di web Pengaduan Masyarakat Desa Malang Rapat<br>
                                    Silahkan Registrasi dan Login dengan akun anda.</p>
                                <div class="video_service_btn">
                                    <a href="registrasi.php" class="boxed-btn3"><i class="fa fa-user-plus"> Registrasi disini</i></a>
                                    <a href="Login/index.php" class="boxed-btn3"> <i class="fa fa-sign-in"></i>
                                        Login Masyarakat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> Web Pelaporan<br>
                                    Pengaduan Masyarakat</h3>
                                <p>Selamat datang di web Pengaduan Masyarakat Desa Malang Rapat<br>
                                Silahkan Registrasi dan Login dengan akun anda.</p>
                                <div class="video_service_btn">
                                    <a href="registrasi.php" class="boxed-btn3"><i class="fa fa-user-plus"> Registrasi disini</i></a>
                                    <a href="Login/index.php" class="boxed-btn3"> <i class="fa fa-sign-in"></i>
                                        Login Masyarakat</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_3 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                               <h3> Web Pelaporan<br>
                                    Pengaduan Masyarakat</h3>
                                <p>Selamat datang di web Pengaduan Masyarakat Desa Malang Rapat<br>
                                Silahkan Registrasi dan Login dengan akun anda.</p>
                                <div class="video_service_btn">
                                    <a href="registrasi.php" class="boxed-btn3"><i class="fa fa-user-plus"> Registrasi disini</i></a>
                                    <a href="Login/index.php" class="boxed-btn3"> <i class="fa fa-sign-in"></i>
                                        Login Masyarakat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- slider_area_end -->

    <!-- service_area_start -->


    <!-- project  -->
    <!--/ project  -->

    <!-- footer start -->
    <footer class="footer">
            
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">DESA MALANG RAPAT</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

    <!-- link that opens popup -->

    <!-- form itself end-->
    <form id="test-form" method="post" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <div class="popup_header">
                    <h3>Login Khusus Admin/Petugas</h3>
                </div>
                <div class="custom_form">
                        <div class="row">
                                <div class="col-xl-12">
                                    <input type="text" name="user" required="required" placeholder="Username">
                                </div>
                                <div class="col-xl-12">
                                    <input type="password" name="pass" required="required" placeholder="Password">
                                </div>
                               
                                <div class="col-xl-12">
                                    <button type="submit" name="login" class="boxed-btn3"><i class="fa fa-sign-in"></i> Login</button>
                                </div>
                                <div class="col-xl-12">
                                </div>
                            </div>
                </div>
            </div>
        </div>
                                           
    </form>
    <!-- form itself end -->

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/slick.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
</body>

</html>