<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10" required=""></textarea>
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="text" name="stok" class="form-control" required="">
	</div>
	<div class="form-group">
		<select class="form-control" name="kategori">
			<option value="">Pilih Kategori</option>
			<option value="men">Men</option>
			<option value="women">Women</option>
		</select>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control" required="">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php

if (isset($_POST['save']))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	$namafix = date("YmdHis").$nama;
	move_uploaded_file($lokasi, "../foto_produk/".$namafix);
	$koneksi->query ("insert into produk
		(nama_produk,harga_produk,foto_produk,deskripsi_produk,stok_produk,kategori_produk)
		values('$_POST[nama]','$_POST[harga]','$namafix','$_POST[deskripsi]','$_POST[stok]','$_POST[kategori]')
		");
echo "<div class='alert alert-info'>Data Tersimpan</div>";
echo"<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
  ?>
