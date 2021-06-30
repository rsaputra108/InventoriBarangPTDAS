<?php
	require_once "function.php";
	check_login();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daftar karywan</title>
	<?php include "contents/headscript.php"; ?>
</head>
<body>
	<?php include "contents/navbar.php"; ?>
	<main>
	<div class ="container">
		<div class="col-sm-12">
			<a href="form_.php" class="btn btn-primary mb-2">Tambah id karywaan</a>
		</div>
		<div class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">NIK</th>
					<th scope="col">Nama Lengkap</th>
					<th scope="col">Action</th>
				</tr>
				</thead>
	</div>
	</div>
	</main>
	<?php include "contents/footer.php"; ?>
</body>
</html>

