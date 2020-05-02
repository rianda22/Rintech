<h2>Edit Data Produk</h2>
<?php  

$ambil = $koneksi->query("select * from produk where id_produk= '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'];?>">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk'];?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['deskripsi_produk'];?></textarea>
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="text" name="stok" class="form-control" value="<?php echo $pecah['stok_produk'];?>">
	</div>
	<div class="form-group">
		<select class="form-control" name="kategori">
			<option value="<?php echo $pecah['kategori_produk'];?>">Pilih Kategori</option>
			<option value="men">Men</option>
			<option value="women">Women</option>
		</select>
	</div>
	<div>
		<img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100">
	</div>
	<div class="form-group">
		<label>Ubah Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-primary" name="save">Simpan Perubahan</button>
</form>

<?php

if (isset($_POST['save'])) {
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	$namafix = date("YmdHis").$namafoto;

	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "../foto_produk/$namafix");

		$koneksi->query("update produk set nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',
			foto_produk='$namafix',deskripsi_produk='$_POST[deskripsi]' ,stok_produk='$_POST[stok]', kategori_produk='$_POST[kategori]' where id_produk='$_GET[id]'");
	}else{
		$koneksi->query("update produk set nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',
			deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]', kategori_produk='$_POST[kategori]' where id_produk='$_GET[id]'");
	}
echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
echo"<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}


  ?>