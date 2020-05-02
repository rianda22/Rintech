<h2>Pembayaran</h2>
<?php

$id_pembelian = $_GET["id"]; 

$ambil = $koneksi->query("SELECT * from Pembayaran where id_pembelian = '$id_pembelian'");
$detail = $ambil->fetch_assoc();

?>
 <div class="row">
 	<div class="col-md-6">
 		<table class="table">
 			<tr>
 				<th>Nama</th>
 				<td><?php echo $detail["nama"]; ?></td>
 			</tr>
 			<tr>
 				<th>Bank</th>
 				<td><?php echo $detail["bank"]; ?></td>
 			</tr>
 			<tr>
 				<th>Jumlah</th>
 				<td>Rp: <?php echo number_format($detail["jumlah"]); ?></td>
 			</tr>
 			<tr>
 				<th>Tanggal</th>
 				<td><?php echo $detail["tanggal"]; ?></td>
 			</tr>
 		</table>
 	</div>
 	<div class="col-md-6">
 		<img src="../bukti_pembayaran/<?php echo $detail["bukti"]?>" class="img-responsive" width="300" >
 	</div>
 </div>

 <form method="post">
 	<button class="btn btn-success" name="proses">Verifikasi</button>
 </form>
 <?php 

if (isset($_POST["proses"])) {
	

	$koneksi->query("UPDATE pembelian set status_pembelian = 'Lunas' where id_pembelian = '$id_pembelian'");

	echo "<script>alert('Pembayaran Diproses')</script>";
	echo "<script>location='index.php?halaman=pembelian'</script>";
}

  ?>