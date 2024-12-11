<?php
session_start();
include 'koneksi.php';
$idd = $_GET ['id'];
$p = mysqli_query ($conn, "SELECT * FROM pengaduan WHERE id_pengaduan = '$idd'");
$data = mysqli_fetch_array ($p);
if(!isset ($_SESSION['nama_petugas'])){
	header ("location: index.php");
	}else{
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TANGGAPAN</title>
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
                         
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                   
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
                                    <a href="admin_petugas.php">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
<?php
$level = $_SESSION ['level'] == 'petugas';
if ($level == 'petugas') {
?> 
									
                                     <i class="fa fa-home" style="color:white"><li><a class="active" href="admin_petugas.php">Home</a></li></i>
                                     <i class="fa fa-bar-chart" style="color:white"><li><a class="active" href="data_pengaduan_petugas.php">Pengaduan</a></li></i>
                                     <i class="fa fa-file-archive-o" style="color:white"><li><a class="active" href="data_masarakat.php">Data Masyarakat</a></li></i>
                                    <?php }else{ ?>
                                     <i class="fa fa-home" style="color:white"><li><a class="active" href="admin_petugas.php">Home</a></li></i>
                                     <i class="fa fa-bar-chart" style="color:white"><li><a class="active" href="data_pengaduan.php">Pengaduan</a></li></i>
                                     <i class="fa fa-file-archive-o" style="color:white"><li><a class="active" href="data_masarakat.php">Data Masyarakat</a></li></i>
                                     <li><i class="fa fa-user" style="color:white"> <a href="#">Kelola User<i class="ti-angle-down"></i></a></i>
                                                <ul class="submenu">
                                                    <li><a href="user_masarakat.php">Masyarakat</a></li>
                                                    <li><a href="user_admin.php">Admin Petugas</a></li>
                                                </ul>
                                            </li>
                                     <?php } ?>
</ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="search_button">
                                       
                                    </div>
                                    <div class="book_btn d-none d-lg-block">
                                        <a href="logout.php" onclick="return confirm('Yakin Ingin Logout?')">Logout <i class="fa fa-sign-out"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                             <?php
if (isset($_POST['simpan'])){
	$id = $_POST ['id'];
	$idp = $_POST ['idp'];
	$tgl = $_POST ['tgl'];
	$isi = $_POST ['isi'];
	$tgp = $_POST ['tgp'];
	$adm = $_POST ['adm'];
	$tambah = mysqli_query ($conn, "INSERT INTO tanggapan(id_tanggapan,id_pengaduan,tgl_tanggapan,isi_laporan,tanggapan,id_petugas)VALUES('$id','$idp','$tgl','$isi','$tgp','$adm')");
	if($tambah){
		echo "<div class='alert alert-success'><center>Berhasil Ditanggapi</center></div>";
		echo "<meta http-equiv='refresh' content='1;url=data_pengaduan_petugas.php'>";
		} else {
		echo "<div class='alert alert-danger'><center>Tanggapan Gagal</center></div>";
		echo "<meta http-equiv='refresh' content='1;url=tanggapan_ptgs.php'>";
		}
		}
?>
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
    <div class="slider_area2">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay2">
                <div class="container">
                    <div class="row">                  
                        <div class="col-xl-12">
             <div class="slider_text ">
                                <h1 style="color:white">Admin/Petugas Web<br>
                                    Pengaduan Masyarakat</h1>
                                <div class="video_service_btn">
                                    <a href="#" class="boxed-btn3" style="text-transform: uppercase;"><i class="fa fa-user"></i> <?php echo $_SESSION['nama_petugas']?></a>
                                    <a href="#" class="boxed-btn3" style="text-transform: uppercase;"><?php echo $_SESSION['level']?></a>
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
    <div class="project_area">
   
    <h4 class="tulisan_input2">TANGGAPAN</h4>
    <table class="table2" width="40%" align="center">
<form method="post">
<input type="hidden" name="id" class="form_input2">
<input type="hidden" name="idp" value="<?= $data ['id_pengaduan']?>" class="form_input2">
<td><h7>TANGGAL TANGGAPAN</h7></td><td><input type="text" name="tgl" class="form_input2" required value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d (H:i:s)') ?>" readonly></td>
</tr>
<input type="hidden" name="isi" class="form_input2" required value="<?= $data ['isi_laporan']?>"></td>
<tr>
<td><h7>TANGGAPAN</h7></th><td><textarea name="tgp" cols="90" placeholder="Isi Tanggapan" required rows="8"></textarea></td>
</tr>
<tr>
<td><input type="hidden" name="adm" value="1"></td>
</tr>
<tr>
<td colspan="2"><button type="submit" class="btn btn-success" name="simpan" style="float:left; margin-right:25px;">Tanggapi</button>
                <button type="reset" class="btn btn-danger" style="float:left; margin-right:25px;"><i class="fa fa-remove"></i> Reset</button>
                <a class="btn btn-dark" href="data_pengaduan_petugas.php" role="button" style="float:right">Kembali <i class="fa fa-sign-out" style="color:white"></i></a>
</td></form></table>

    </div>
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
<?php } ?>