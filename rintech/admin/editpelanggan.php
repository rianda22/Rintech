<h2>Edit Pelanggan</h2>

<?php  

$ambil = $koneksi->query("select * from pelanggan where id_pelanggan= '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan'];?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" class="form-control" value="<?php echo $pecah['password_pelanggan'];?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan'];?>">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="number" name="telepon" class="form-control" value="<?php echo $pecah['telepon_pelanggan'];?>">
	</div>
	<button class="btn btn-primary" name="save">Simpan Perubahan</button>
</form>
<?php
 
 if (isset($_POST['save'])) {

$koneksi->query ("update pelanggan set email_pelanggan='$_POST[email]', password_pelanggan='$_POST[password]', nama_pelanggan='$_POST[nama]', telepon_pelanggan='$_POST[telepon]' where id_pelanggan='$_GET[id]'
		");
echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
echo"<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
  ?>