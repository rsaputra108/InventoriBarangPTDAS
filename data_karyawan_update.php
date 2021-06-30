<?php
  require_once "koneksi.php";
  require_once "function.php";

  check_login();
  $list_karyawan = get_data_karyawan();
  $param_id_pegawai= $_GET['id_pegawai'];

  $conn = open_connection();
  $query = "SELECT * FROM tb_karyawan WHERE id_pegawai='$param_id_pegawai' ";
  $hasil = mysqli_query($conn, $query);
  $old_data = array();
  if($row = mysqli_fetch_assoc($hasil)) {
    $old_data=$row;
  }


  //TODO : membuat default variable & membaca data POST
	$id_pegawai = $_POST ['id_pegawai'] ?? $old_data ['id_pegawai'];
	$nama_pegawai = $_POST ['nama_pegawai'] ?? $old_data ['nama_pegawai'];
	$nik = $_POST ['nik'] ?? $old_data ['nik'];
	$tmp_lahir = $_POST ['tmp_lahir'] ?? $old_data ['tmp_lahir'];
	$tgl_lahir = $_POST ['tgl_lahir'] ?? $old_data ['tgl_lahir'];
	$gender = $_POST ['gender'] ?? $old_data ['gender'];
	$alamat = $_POST ['alamat'] ?? $old_data ['alamat'];
	$nohp = $_POST ['nohp'] ?? $old_data ['nohp'];
  
  $isError = FALSE;
  $error = '';

  //TODO : Jika data disubmit, maka lakukan validasi dan simpan data
  if(isset($_POST['submit'])){
  //contoh validasi data
  if ($id_pegawai == ''){
  $isError = TRUE;
  $error = 'ID Pegawai harap diisi !!';
  }

  //jika tidak ada salah input, makasimpan data ke dalam database
  if (!$isError){
  $conn =open_connection();

  $query ="UPDATE tb_karyawan SET
          nama_pegawai = '$nama_pegawai',
          nik = '$nik',
          tmp_lahir = '$tmp_lahir',
          tgl_lahir = '$tgl_lahir',
		  gender = '$gender',
		  alamat = '$alamat',
		  nohp = '$nohp'

          WHERE
          id_pegawai = '$old_data[id_pegawai]'"; 

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
  <title>Input Data Anggota</title>
  <?php include "contents/headscript.php"; ?>
</head>
<body style="background: url('bg4.png') repeat;">
	<?php include "contents/navbar.php"; ?>
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