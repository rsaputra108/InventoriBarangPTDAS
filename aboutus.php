<?php
	require_once "function.php";
	check_login();
?>
<link rel="icon" type="image/png" href="logo1.png">
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
	<h2> DAFTAR ANGGOTA KELOMPOK</H2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NPM</th>
      <th scope="col">Nama</th>
      <th scope="col">Gender</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>201843500907</td>
      <td>DESRA APRILIANSAH HARAHAP</td>
      <td>Laki-laki</td>
    </tr>
	<tr>
      <th scope="row">2</th>
      <td>201843501595</td>
      <td>SEPTIAN RACHMANUGRAHA</td>
      <td>Laki-Laki</td>
    </tr>
	<tr>
      <th scope="row">3</th>
      <td>201843500285</td>
      <td>JOKO SUPRIYONO</td>
      <td>Laki-laki</td>
    </tr>
	<tr>
      <th scope="row">4</th>
      <td>201843501133</td>
      <td>HANDIKA EKA PUTRA</td>
      <td>Laki-laki</td>
    </tr>
	<tr>
      <th scope="row">5</th>
      <td>201843501353</td>
      <td>AHMAD RIZAL</td>
      <td>Laki-laki</td>
    </tr>
	<tr>
      <th scope="row">6</th>
      <td>201843500989</td>
      <td>RANGGA PERMANA</td>
      <td>Laki-laki</td>
    </tr>
	<tr>
      <th scope="row">7</th>
      <td>201643501006</td>
      <td>MUHHAMAD RIZKY SAPUTRA</td>
      <td>Laki-laki</td>
    </tr>
	<tr>
      <th scope="row">8</th>
      <td>201843501290</td>
      <td>DICKY RIDHO HUTOMO</td>
      <td>Laki-laki</td>
    </tr>
  </tbody>
</table>
	</div>
	</main>
	<?php include "contents/footer.php"; ?>
</body>
</html>

