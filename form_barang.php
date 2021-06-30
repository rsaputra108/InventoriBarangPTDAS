<?php
	require_once "function.php";
	check_login();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Input Data Barang</title>
	<?php include "contents/headscript.php"; ?>
</head>
<body>
	<?php include "contents/navbar.php"; ?>
	<main>
	<div class ="container">
		<form method="POST">
  <div class="row mb-3">
    <label for="kd_barang" class="col-sm-2 col-form-label">Kode Barang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kd_barang" placeholder="Masukan Kode Barang" name="kd_barang">
    </div>
  </div>
  
  <div class="row mb-3">
    <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jenis_barang" placeholder="Masukan Jenis Barang"
	  name = "jenis_barang">
    </div>
  </div>
  
  <div class="row mb-3">
    <label for="merk" class="col-sm-2 col-form-label">Merk</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="merk" placeholder="Masukan Jenis Merk"
    name = "merk">
    </div>
  </div>

  <div class="row mb-3">
    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="jumlah" placeholder="Masukan Jumlah"
    name = "jumlah">
    </div>
  </div>

  <div class="row mb-3">
    <label for="tahun_pembuatan" class="col-sm-2 col-form-label">Tahun Pembuatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tahun_pembuatan" placeholder="Masukan tahun_pembuatan"
    name = "tahun_pembuatan">
    </div>
  </div>
 
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
	</div>
	</main>
	<?php include "contents/footer.php"; ?>
</body>
</html>

