<h2>Tambah Pelanggan</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="number" name="telepon" class="form-control" required="">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
 
 if (isset($_POST['save'])) {

$koneksi->query ("insert into pelanggan
		(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan)
		values('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telepon]')
		");
echo "<div class='alert alert-info'>Data Tersimpan</div>";
echo"<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
  ?>