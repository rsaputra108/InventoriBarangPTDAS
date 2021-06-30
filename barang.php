<?php
	require_once "function.php";
	check_login();
?>
<link rel="icon" type="image/png" href="logo.png">
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daftar Barang</title>
	<?php include "contents/headscript.php"; ?>
</head>
<body style="background: url('bg4.png') repeat;">
	<?php include "contents/navbar.php"; ?>
	<main>
	<div class ="container">
		<div class="col-sm-12"></div>
			<a href="barang_add.php" class="btn btn-primary mb-2">Tambah Barang</a>
		<table class="table table-striped">

			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Kode barang</th>
					<th scope="col">Jenis Barang</th>
					<th scope="col">Merk Barang</th>
					<th scope="col">Jumlah</th>
					<th scope="col">Tahun Pembuatan</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
			<tbody>
				<?php
				  			require_once "koneksi.php";
							$conn = open_connection();

							$query = "SELECT * FROM tb_barang ";
							$hasil = mysqli_query($conn,$query);
							$i=1;
							while ($row = mysqli_fetch_assoc($hasil)) {
								echo "<tr>";
								echo "<td>".$i++."</td>";
								echo "<td>$row[kd_barang]</td>";
								echo "<td>$row[jenis_barang]</td>";
								echo "<td>$row[merk]</td>";
								echo "<td>$row[jumlah]</td>";
								echo "<td>$row[tahun_pembuatan]</td>";
								echo "<td>	<a class='btn btn-success' href='barang_update.php?kd_barang=$row[kd_barang]'>Ubah</a>
											<a class='btn btn-danger' href='barang_delete.php?kd_barang=$row[kd_barang]'>Hapus</a>
									  </td>";
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

