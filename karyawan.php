
<?php
	require_once "function.php";
	check_login();
?>
<link rel="icon" type="image/png" href="logo.png">
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daftar Anggota | E-Library</title>
	<?php include "contents/headscript.php"; ?>
</head>
<body style="background: url('bg4.png') repeat;">
	<?php include "contents/navbar.php"; ?>
	<main>
	<div class ="container">
		<div class="col-sm-12"></div>
			<a href="data_karyawan_add.php" class="btn btn-primary mb-2">Tambah Anggota</a>
		<table class="table table-striped">

			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Id Pegawai</th>
					<th scope="col">Nama Pegawai</th>
					<th scope="col">Nik</th>
					<th scope="col">Tempat Lahir</th>
					<th scope="col">Tanggal Lahir</th>
					<th scope="col">Gender</th>
					<th scope="col">Alamat</th>
					<th scope="col">No Hp</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
			<tbody>
				<?php
				  			require_once "koneksi.php";
							$conn = open_connection();

							$query = "SELECT * FROM tb_karyawan ";
							$hasil = mysqli_query($conn,$query);
							$i=1;
							while ($row = mysqli_fetch_assoc($hasil)) {
								echo "<tr>";
								echo "<td>".$i++."</td>";
								echo "<td>$row[id_pegawai]</td>";
								echo "<td>$row[nama_pegawai]</td>";
								echo "<td>$row[nik]</td>";
								echo "<td>$row[tmp_lahir]</td>";
								echo "<td>$row[tgl_lahir]</td>";
								echo "<td>$row[gender]</td>";
								echo "<td>$row[alamat]</td>";
								echo "<td>$row[nohp]</td>";
								echo "<td>	<a class='btn btn-success' href='data_karyawan_update.php?id_pegawai=$row[id_pegawai]'>Ubah</a>
											<a class='btn btn-danger' href='data_karyawan_delete.php?id_pegawai=$row[id_pegawai]'>Hapus</a>
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

