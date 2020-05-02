<h2>Data Pembelian</h2>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Status</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<body>
		<?php $nomor = 1; ?>
		<?php $ambil=$koneksi->query("select * from pembelian join Pelanggan on 
		pembelian.id_pelanggan = pelanggan.id_pelanggan
		");  ?>

		<?php while ($pecah = $ambil-> fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor;  ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td>Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
			<td><strong><?php echo $pecah['status_pembelian']; ?></strong></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn-info btn">Detail</a>

				<?php if ($pecah["status_pembelian"]== "Sudah Kirim Pembayaran"):?>
					<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-success">Verifikasi</a>

				<?php endif ?>


			</td>
		</tr>
		<?php $nomor++;  ?>
		<?php } ?>
	</body>
</table>
