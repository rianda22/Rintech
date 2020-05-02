<?php

session_start();
include 'koneksi.php'; 

$id_produk = $_GET["id"];

$ambil = $koneksi->query("select * from produk where id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

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
                    <h1>Detail Produk</h1>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					
						<div class="single-prd-item">
							<img class="img-fluid" src="foto_produk/<?php echo $detail['foto_produk']; ?>" alt="">
						</div>
						
					
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $detail['nama_produk']; ?></h3>
						<h2>Rp. <?php echo number_format($detail['harga_produk']); ?></h2>
						<ul class="list">

                            <?php
                            $kategori = $detail["kategori_produk"];

                            if ($kategori == 'men') :?>
							     <li><a class="active" href="men.php"><span>Kategori</span> : <?php echo $detail['kategori_produk']; ?></a></li>
                            <?php elseif ($kategori == 'women'): ?>
                                <li><a class="active" href="women.php"><span>Kategori</span> : <?php echo $detail['kategori_produk']; ?></a></li>
                            <?php endif ?>

							<li><a><span>Stok</span> : <?php echo number_format($detail['stok_produk']); ?></a></li>
						</ul>
						<p><?php echo $detail['deskripsi_produk']; ?></p>
						<form method="post">
						<div class="share-desc">
							<div class="share">
								Jumlah : <input type="number" name="jumlah" class="text_box" value="1" min="1" max="<?php echo $detail['stok_produk']; ?>" required>				
							</div>
							<p></p>
								<div>
								<button class="primary-btn" name="beli">Tambahkan Ke Keranjang</button>
								</div>				
							<div class="clear"></div>
						</div>
					</form>

					<?php 
						if (isset($_POST["beli"])) {
							
							$jumlah = $_POST["jumlah"];

							$_SESSION['keranjang'][$id_produk]+= $jumlah;

							echo "<script>alert('Produk Telah Ditambahkan Ke Keranjang Belanja');</script>";
							echo "<script>location='keranjang.php';</script>";
						}
					 ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
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