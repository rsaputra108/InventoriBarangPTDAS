  <link rel="icon" type="image/png" href="logo.png">
<?php
  require_once "koneksi.php";
  require_once "function.php";

  check_login();
  
  //TODO : mengambil array jurusan dari file functions
  $list_karyawan = get_data_karyawan();

  //TODO : membuat default variable & membaca data POST
	$id_pegawai = $_POST ['id_pegawai'] ?? '';
	$nama_pegawai = $_POST ['nama_pegawai'] ?? '';
	$nik = $_POST ['nik'] ?? '';
	$tmp_lahir = $_POST ['tmp_lahir'] ?? '';
	$tgl_lahir = $_POST ['tgl_lahir'] ?? '';
	$gender = $_POST ['gender'] ?? '';
	$alamat = $_POST ['alamat'] ?? '';
	$nohp = $_POST ['nohp'] ?? '';
  
  $isError = FALSE;
  $error = '';

  //TODO : Jika data disubmit, maka lakukan validasi dan simpan data
  if(isset($_POST['submit'])){
  //contoh validasi data
  if ($id_pegawai == ''){
  $isError = TRUE;
  $error = 'ID Karyawan harap diisi !!';
  }

  //jika tidak ada salah input, makasimpan data ke dalam database
  if (!$isError){
  $conn =open_connection();

  $query ="INSERT INTO tb_karyawan VALUES ('$id_pegawai', '$nama_pegawai', '$nik', '$tmp_lahir', '$tgl_lahir', '$gender', '$alamat', '$nohp'); ";                          
  $hasil = mysqli_query ($conn, $query);
  if($hasil){
      header("Location: http://localhost/projectdes/belajar-crud/karyawan.php");
    }else{
  $isError = TRUE; 
  $error = "gagal menyimpan ke database :" . mysqli_error($conn);
  }
    }
}

  if(isset($_POST['batal'])) {
    header("Location: http://localhost/projectdes/belajar-crud/karyawan.php");
  }
?>
<link rel="icon" type="image/png" href="logo.png">
<!DOCTYPE html>
<html>
<head>
  <title>Input Data Pegawai</title>
  <?php include "contents/headscript.php"; ?>
</head>
<body>
  
<body style="background: url('bg4.png') repeat;">
	<?php include "contents/navbar.php"; ?>
	<main>
  <main>
      <div class="container">
  <?php if ($isError) : ?>
  <div class="alert alert-danger" role="alert">
  <?=$error ?>
  </div>
  <?php endif; ?>
	<form method ="POST">
    <div class="form-group row">
		<label class="col-sm-2 col-form-label">ID Pegawai</label>
		<div class="col-sm-10"  > 
			<input type="text" class="form-control" name="id_pegawai" value="<?= $id_pegawai ?>">
		</div>
	</div>

    <div class="form-group row">
		<label class="col-sm-2 col-form-label">Nama Pegawai</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nama_pegawai" value="<?= $nama_pegawai ?>">
			</div>
	</div>

   <div class="form-group row">
		<label class="col-sm-2 col-form-label">Nik</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nik" value="<?= $nik ?>">
			</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Tempat Lahir</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="tmp_lahir" value="<?= $tmp_lahir ?>">
			</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" name="tgl_lahir" value="<?= $tgl_lahir ?>">
			</div>
	</div>
  
	<fieldset class="form-group">
		<div class="row">
			<legend class="col-form-label col-sm-2 pt-0">Gender</legend>
				<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" 
						value="Pria" >
						<label class="form-check-label">Laki-laki</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" 
						value="Wanita" >
						<label class="form-check-label">Perempuan</label>
					</div>
				</div>
		</div>
	</fieldset>
  
    <div class="form-group row">
		<label class="col-sm-2 col-form-label">Alamat</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="alamat" value="<?= $alamat ?>">
			</div>
	</div>
  
    <div class="form-group row">
		<label class="col-sm-2 col-form-label">No HP</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nohp" value="<?= $nohp ?>">
			</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary" name='submit'>Simpan</button>
			<button type="submit" class="btn btn-danger" name='batal'>Batal</button>
		</div>
	</div>
</form>
</div>
</main>
  <?php include "contents/footer.php"; ?>
</body>
</html>