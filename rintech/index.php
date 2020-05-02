<?php
session_start();
include 'koneksi.php';


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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
<?php include 'menu.php' ?>
	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Rin-Tech New <br>Collection!</h1>
									<p>Digital and analog-digital watches with a contemporary<br>design and suitable for various groups.</p>
									
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/banner-img2.png" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Rin-Tech New <br>Collection!</h1>
									<p>Digital and analog-digital watches with a contemporary<br>design and suitable for various groups.</p>
									
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/banner-img2.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Fast Delivery</h6>
						
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Kebijakan Pengembalian</h6>
						
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>Support 24 Jam</h6>
						
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Pembayaran Aman</h6>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<h1>Kategori Produk</h1>
				<p></p>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="row">
						
						<div class="col-lg-4 col-md-2">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/women1.jpg" alt="">
								<a href="women.php">
									<div class="deal-details">
										<h6 class="deal-title">Product For Women</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-2">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/man1.jpg" alt="">
								<a href="men.php">
									<div class="deal-details">
										<h6 class="deal-title">Product For Men</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End category Area -->

	<!-- start product Area -->
	
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Produk</h1>
							<p>Digital and analog-digital watches with a contemporary<br>design and suitable for various groups.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php $ambil = $koneksi->query("SELECT * from produk");  ?>
    	    				<?php while ($perproduk = $ambil->fetch_assoc()) {  ?>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">
							<img class="img-fluid" src="foto_produk/<?php echo $perproduk['foto_produk']?>" alt="">
							</a>
							<div class="product-details">
								<h6><?php echo $perproduk['nama_produk']?></h6>
								<div class="price">
									<h6>Rp. <?php echo number_format($perproduk['harga_produk'])?></h6>
									
								</div>
								<div class="prd-bottom">

									<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">Beli</p>
									</a>
									
									<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">Detail</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
				<?php } ?>
				</div>
			</div>
		</div>
		<!-- single product slide -->
		
	
	<!-- end product Area -->

	<!-- Start exclusive deal Area -->
	
	<!-- End exclusive deal Area -->

	<!-- Start brand Area -->

	<!-- End brand Area -->

	<!-- Start related-product Area -->
	
	<!-- End related-product Area -->

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
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>