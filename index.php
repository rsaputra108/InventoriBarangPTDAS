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
	<title>E-Library &copy </title>
	<?php include "contents/headscript.php"; ?>
</head>
<body style="background: url('bg4.png') repeat;">
	<?php include "contents/navbar.php"; ?>
	<main>
	<div class ="container">
	<table>
	<div class=" alert alert-dismissable alert-success" style="margin-bottom: 0px;">
		<h4 align="left" style="text-transform: uppercase;"> SELAMAT DATANG</b> ANDA LOGIN SEBAGAI <strong>ADMIN</strong>
			</b>
		</h4>
	</div>
	</div>
    </table>
		<div class="jumbotron">
			<p class="lead">SELAMAT DATANG DI PROGRAM WEB DELTA ART STAR . 
			PT DELTA ART STAR Merupakan perusahaan yang bergerak dibidang jasa pelayanan mengenai IT dan Internet.
</p>
<p class="lead"> Yang beralamat di Jl. Rawajati Timur, RT.7/RW.6, Rawajati, Kec. Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12750</p>


			</p>
		</div>
		
	</div>
	</main>
	<?php include "contents/footer.php"; ?>
</body>
</html>

