<?php
	require_once "function.php";
	require_once "koneksi.php";
	check_login();
?>
<link rel="icon" type="image/png" href="logo.png">
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Transaksi | E-Library</title>
	<?php include "contents/headscript.php"; ?>
</head>
<body style="background: url('bg4.png') repeat;">
	<?php include "contents/navbar.php"; ?>
	<main>
	<div class ="container">
		<div class="col-sm-12"></div>
			<a href="transaksi_barang_add.php" class="btn btn-primary mb-2">Tambah Transaksi</a>
		<table class="table table-striped">

			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">ID Barang</th>
					<th scope="col">Jenis barang</th>
					<th scope="col">Tanggal masuk</th>
					<th scope="col">Tanggal keluar</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
		<tbody>
				<?php
				  			require_once "koneksi.php";
							$conn = open_connection();

							$query = "SELECT * FROM tb_transaksi ";
							$hasil = mysqli_query($conn,$query);
							$i=1;
							while ($row = mysqli_fetch_assoc($hasil)) {
								echo "<tr>";
								echo "<td>".$i++."</td>";
								echo "<td>$row[id_barang]</td>";
								echo "<td>$row[jenis_barang]</td>";
								echo "<td>$row[tgl_masuk]</td>";
								echo "<td>$row[tgl_keluar]</td>";
								echo "<td>$row[status]</td>";
								echo "</tr>";
							}
				  		?>	
			</tbody>
		</table>
	</div>
	</div>
	</main>
	<?php include "contents/footer.php"; ?>
</body>
</html>

