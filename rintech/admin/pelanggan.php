<h2>Data Pelanggan</h2>

<a href="index.php?halaman=tambahpelanggan" class="btn btn-info">Tambah Data</a>
<p></p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Password</th>
			<th>Telepon</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil=$koneksi-> query("select * from pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td><?php echo $pecah['password_pelanggan']; ?></td>
			<td><?php echo $pecah['telepon_pelanggan']; ?></td>
			<td>
				<a href=index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan'];?>" class="btn-danger btn" class="btn btn-danger">Hapus</a>
				<a href="index.php?halaman=editpelanggan&id=<?php echo $pecah['id_pelanggan'];?>" class="btn-warning btn">Edit</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php }  ?>
		</tbody>
</table>
