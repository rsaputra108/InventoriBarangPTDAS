<!DOCTYPE html>
<html>
<head>
	<title>Laporan Barang PT DELTA ART STAR</title>
</head>
<body>

	<center>

		<h2>DATA LAPORAN BARANG</h2>

	</center>

	<?php 
	include 'config.php';
	?>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Kode Barang</th>
			<th>Jenis Barang</th>
			<th>Merk</th>
			<th width="5%">Jumlah</th>
			<th>Tahun Pembuatan</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tb_barang");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['Kode Barang']; ?></td>
			<td><?php echo $data['Jenis Barang']; ?></td>
			<td><?php echo $data['Merk']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td><?php echo $data['Tahun Pembuatan']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>