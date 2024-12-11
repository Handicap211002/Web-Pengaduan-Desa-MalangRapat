<?php
session_start();
include 'koneksi.php';
if(!isset ($_SESSION['nama'])){
	header ("location: index.php");
	}else{
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
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
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
                                    <a href="masarakat_admin.php">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <i class="fa fa-home" style="color:white"><li><a class="active" href="masarakat_admin.php">Home</a></li></i>
                                           <i class="fa fa-bar-chart" style="color:white"><li><a class="active" href="pengaduan1.php">Pengaduan Saya</a></li></i>

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
if (isset($_POST['simpan'])) {
    $tgl = $_POST['tgl'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $laporan = $_POST['laporan'];
    $tlp = $_POST['tlp'];
    $st = $_POST['st'];

    // Proses file gambar
    $gambar = null; // Default jika tidak ada gambar yang diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'image/'; // Folder tempat gambar disimpan
        $filename = time() . '_' . basename($_FILES['gambar']['name']); // Tambahkan timestamp untuk nama file unik
        $target_file = $upload_dir . $filename;

        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            $gambar = $filename; // Nama file untuk disimpan ke database
        } else {
            echo "<div class='alert alert-danger'><center>Gagal mengunggah file gambar</center></div>";
            exit;
        }
    }

    // Query untuk menyimpan data ke database
    $tambah = mysqli_query($conn, "INSERT INTO pengaduan (tgl_pengaduan, nama_pengadu, nik, isi_laporan, tlp, foto, status) 
                                    VALUES ('$tgl', '$nama', '$nik', '$laporan', '$tlp', '$gambar', '$st')");
    if ($tambah) {
        echo "<div class='alert alert-success'><center>Pengaduan Berhasil</center></div>";
        echo "<meta http-equiv='refresh' content='1;url=pengaduan1.php'>";
    } else {
        echo "<div class='alert alert-danger'><center>Pengaduan Gagal</center></div>";
        echo "<meta http-equiv='refresh' content='1;url=pengaduan.php'>";
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
                                <h3 style="color:white"> Web Pelaporan<br>
                                    Pengaduan Masyarakat</h3>
                                <p style="color:white">Selamat datang di web Pengaduan Masyarakat Desa Malang Rapat Kec. Gunung Kijang<br>
                                Silahkan adukan Keluh Kesah anda terhadap pemerintahan Desa Malang Rapat</p>
                                <div class="video_service_btn">
                                    <a href="#" class="boxed-btn3" style="text-transform: uppercase; font-size:15px"><i class="fa fa-user"> <?php echo $_SESSION['nama']?></i></a>
                                    <a href="pengaduan.php" class="boxed-btn3">Pengaduan disini</a>
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


<!-- Project Area -->
<div class="project_area">
    <h4 class="tulisan_input2">PENGADUAN</h4>
    <table class="table2" width="40%" align="center">
        <form method="post" enctype="multipart/form-data">
            <!-- Tanggal Pengaduan -->
            <tr>
                <td><h7>TANGGAL PENGADUAN</h7></td>
                <td><input type="text" name="tgl" class="form_input2" required 
                           value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('Y-m-d (H:i:s)'); ?>" readonly></td>
            </tr>
            <!-- Nama -->
            <tr>
                <td><h7>NAMA</h7></td>
                <td><input type="text" name="nama" class="form_input2" required value="<?php echo $_SESSION['nama']; ?>" readonly></td>
            </tr>
            <!-- NIK -->
            <tr>
                <td><h7>NIK</h7></td>
                <td><input type="text" name="nik" class="form_input2" required value="<?php echo $_SESSION['nik']; ?>" readonly></td>
            </tr>
            <!-- Isi Laporan -->
            <tr>
                <td><h7>ISI LAPORAN</h7></td>
                <td><textarea name="laporan" cols="90" required rows="8"></textarea></td>
            </tr>
            <!-- No Telepon -->
            <tr>
                <td><h7>NO TELEPON</h7></td>
                <td><input type="text" name="tlp" required class="form_input2" value="<?php echo $_SESSION['tlp']; ?>" readonly></td>
            </tr>
            <!-- Foto -->
            <tr>
                <td><h7>FOTO</h7></td>
                <td><input type="file" required name="gambar"></td>
            </tr>
            <!-- Status -->
            <tr>
                <td><input type="hidden" name="st" value="Proses"></td>
            </tr>
            <!-- Buttons -->
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-success" name="simpan" style="float:left; margin-right:25px;">Adukan</button>
                    <button type="reset" class="btn btn-danger" style="float:left; margin-right:25px;">Reset</button>
                </td>
            </tr>
        </form>
    </table>
</div>
  
<form>
</table>
    </div>
   <footer class="footer">   
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">DESA Malang Rapat</a>
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