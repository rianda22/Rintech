<?php  
$id_admin = $_SESSION["admin"]["id_admin"];

$ambil = $koneksi->query("SELECT * from admin where id_admin = '$id_admin'");
$pecah = $ambil->fetch_assoc()
?>

<h2>Selamat Datang <?php echo $pecah["username"]; ?></h2>

		<div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-qrcode"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><a href="index.php?halaman=produk">Produk</a></p><br>
                    <p class="text-muted"><a href="index.php?halaman=tambahproduk">Tambah Data</a></p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-user"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><a href="index.php?halaman=pelanggan">Pelanggan</a></p><br>
                    <p class="text-muted"><a href="index.php?halaman=tambahpelanggan">Tambah Data</a></p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-shopping-cart"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><a href="index.php?halaman=pembelian">Pembelian</a></p><br>
                    <p class="text-muted"><a href="index.php?halaman=pembelian">Lihat Data</a></p>
                </div>
             </div>
		     </div>
        </div>  
        <h3><strong>Informasi Akun <?php echo $pecah["username"]; ?></strong></h3>          
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			
			<th>Username</th>
			<th>Password</th>
			<th>Nama Lengkap</th>
	
			
		</tr>
	</thead>
	<tbody>
		
		<?php $ambil = $koneksi->query("SELECT * from admin where id_admin = '$id_admin'"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			
			<td><?php echo $pecah['username']; ?></td>
			<td><?php echo $pecah['password']; ?></td>
			<td><?php echo $pecah['nama_lengkap']; ?></td>
			
		</tr>
	
		<?php }  ?>
		</tbody>
</table>

