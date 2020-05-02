<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Login Terlebih Dahulu')</script>";
    echo "<script>location='login.php'</script>";
}

$idpem = $_GET["id"];
$ambil = $koneksi->query("select * from pembelian where id_pembelian= '$idpem'");
$detpem = $ambil->fetch_assoc();

$idygbeli = $detpem["id_pelanggan"];
$idyglogin = $_SESSION["pelanggan"]["id_pelanggan"];

    if ($idygbeli!==$idyglogin) {
        echo "<script>alert('Akses Ini Tidak tersedia Untuk Anda');</script>";
        echo "<script>location='riwayat.php';</script>";
    }

  ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Rin-Tech</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <!-- Start Header Area -->
<?php include 'menu.php'; ?>
	<!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Konfirmasi Pembayaran</h1>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
    <h2>Konfirmasi Pembayaran</h2>
    <hr>

    <div class="alert alert-info">Total Tagihan Anda Sebesar <strong>Rp. <?php echo number_format($detpem['total_pembelian']) ?></strong></div>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Penyetor</label>
            <input type="text" name="nama" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Bank</label>
            <input type="text" name="bank" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="<?php echo $detpem['total_pembelian']; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Foto Bukti</label>
            <input type="file" name="bukti" class="form-control" required="">
            <p class="text-danger">File Maksimal 2MB (Format Harus .JPG)</p>
        </div>
        <button class="primary-btn" name="kirim">Kirim</button>
    </form>
</div>
<?php 

if (isset($_POST["kirim"])) {
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafix = date("YmdHis").$namabukti;
    move_uploaded_file($lokasibukti , "bukti_pembayaran/$namafix");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $tanggal = date("Y-m-d");

    $koneksi->query("insert into pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti) 
        values('$idpem','$nama','$bank','$jumlah','$tanggal','$namafix')");

    $koneksi->query("UPDATE pembelian set status_pembelian = 'Sudah Kirim Pembayaran' where id_pembelian = '$idpem' ");

    echo "<script>alert('Terima Kasih Telah Melakukan Pembayaran');</script>";
    echo "<script>location='riwayat.php';</script>";
}

?>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <?php include 'footer.php'; ?>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>