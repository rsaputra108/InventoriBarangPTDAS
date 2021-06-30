<!DOCTYPE html>
<html>
<head>
	<title>Laporan Barang PT DELTA ART STAR</title>
</head>
<body>
 
	<center>
 
		<h2>Laporan Barang PT DELTA ART STAR<br/>E-Library DELTA ART STAR © 2021</h2>
 
 
		<?php 
		include 'config.php';
		?>
 
		<table border="1">
			<tr>
				<th>Kode Barang</th>
				<th>Jenis Barang</th>
				<th>Merk</th>
				<th>Jumlah</th>
				<th>Tahun Pembuatan</th>
			</tr>
			<?php 
			$no = 1;
			$sql = mysqli_query($koneksi,"select * from tb_barang");
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['kd_barang']; ?></td>
				<td><?php echo $data['jenis_barang']; ?></td>
				<td><?php echo $data['merk']; ?></td>
				<td><?php echo $data['jumlah']; ?></td>
				<td><?php echo $data['tahun_pembuatan']; ?></td>
			</tr>
			<?php 
			}
			?>
		</table>
 
		<br/>
 
		<a href="print.php" target="_blank">PRINT</a>
 
 
	</center>
</body>
</html>