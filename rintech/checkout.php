<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Login Terlebih Dahulu')</script>";
    echo "<script>location='login.php'</script>";
}

if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Berbelanja Terlebih Dahulu')</script>";
    echo "<script>location='index.php'</script>";
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
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
                    <h1>Checkout</h1>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
            <div class="container">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0 ?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                <?php
                $ambil = $koneksi->query("select * from produk where id_produk= '$id_produk'");
                $pecah = $ambil->fetch_assoc();
                $total = $pecah['harga_produk']*$jumlah;
                ?>

                <tr>
                    <th><?php echo $nomor; ?></th>
                    <th><?php echo $pecah['nama_produk']; ?></th>
                    <th>Rp. <?php echo number_format($pecah['harga_produk']); ?></th>
                    <th><?php echo $jumlah ?></td>
                    <th>Rp. <?php echo number_format($total); ?></th>
                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$total ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja); ?></th>
                </tr>
            </tfoot>
        </table>
        
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="id_ongkir">
                        <option>Pilih Ongkos Kirim</option>
                        <?php
                            $ambil = $koneksi->query("select * from ongkir");
                            while ($perongkir = $ambil->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $perongkir["id_ongkir"]?>">
                            <?php echo $perongkir['wilayah']; ?>
                            Rp. <?php echo number_format($perongkir['tarif']); ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>  
            <div class="form-group">
                <label>Alamat Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan Alamat Pengiriman" required></textarea>
            </div>
            <button class="primary-btn" name="checkout">Checkout</button>
        </form>
        <?php 
        if (isset($_POST['checkout'])) {
            $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
            $id_ongkir = $_POST['id_ongkir'];
            $tanggal_pembelian = date("Y-m-d");
            $alamat_pengiriman = $_POST['alamat_pengiriman'];

            $ambil = $koneksi->query("select * from ongkir where id_ongkir ='$id_ongkir'");
            $arrayongkir = $ambil->fetch_assoc();
            $wilayah = $arrayongkir['wilayah'];
            $tarif = $arrayongkir['tarif'];
            $total_pembelian = $totalbelanja + $tarif;

            $koneksi->query("insert into pembelian(
            id_pelanggan, id_ongkir, wilayah, tarif, tanggal_pembelian, total_pembelian, alamat_pengiriman)
            values('$id_pelanggan', '$id_ongkir','$wilayah', '$tarif', '$tanggal_pembelian', '$total_pembelian', '$alamat_pengiriman')");

            $id_pembelian_barusan = $koneksi->insert_id;

            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                $ambil = $koneksi->query("select * from produk where id_produk= '$id_produk'");
                $perproduk = $ambil->fetch_assoc();

                $nama = $perproduk['nama_produk'];
                $harga = $perproduk['harga_produk'];

                $subharga = $perproduk['harga_produk']*$jumlah;
                $koneksi->query("insert into pembelian_produk (id_pembelian, id_produk, Jumlah, nama, harga, subharga) values('$id_pembelian_barusan','$id_produk','$jumlah','$nama','$harga','$subharga')");

                $koneksi->query("UPDATE produk set stok_produk = stok_produk -$jumlah where id_produk = '$id_produk'");
            }

            unset($_SESSION['keranjang']);

            echo "<script>alert('Pembelian Sukses');</script>";
            echo "<script>location='riwayat.php?id=$id_pembelian_barusan';</script>";

        }
        ?>


    </div>
    </section>
    <!--================End Checkout Area =================-->

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