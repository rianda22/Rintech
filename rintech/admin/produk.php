<h2>Data Produk</h2>

<a href="index.php?halaman=tambahproduk" class="btn btn-info">Tambah Data</a>
<p></p>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Kategori</th>
			<th>Foto</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<body>
		<?php $nomor= 1;?>
		<?php $ambil=$koneksi->query("select * from produk");?>
		<?php while($pecah=$ambil->fetch_assoc()){  ?>
		<tr>
			<td><?php echo $nomor;  ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['stok_produk']; ?></td>
			<td><?php echo $pecah['kategori_produk']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
			</td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=editproduk&id=<?php echo $pecah['id_produk'];?>" class="btn-warning btn">Edit</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php }  ?>
	</body>
</table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>




