<?php
  require_once "koneksi.php";
  require_once "function.php";

  check_login();
  
  //TODO : mengambil array jurusan dari file functions
  $list_barang = get_data_barang();

  //TODO : membuat default variable & membaca data POST
  $kd_barang = $_POST ['kd_barang'] ?? '';
  $jenis_barang = $_POST ['jenis_barang'] ?? '';
  $merk = $_POST ['merk'] ?? '';
  $jumlah = $_POST ['jumlah'] ?? '';
  $tahun_pembuatan = $_POST ['tahun_pembuatan'] ?? '';
  
  $isError = FALSE;
  $error = '';

  //TODO : Jika data disubmit, maka lakukan validasi dan simpan data
  if(isset($_POST['submit'])){
  //contoh validasi data
  if ($kd_barang == ''){
  $isError = TRUE;
  $error = 'Kode barang harap diisi !!';
  }

  //jika tidak ada salah input, makasimpan data ke dalam database
  if (!$isError){
  $conn =open_connection();

  $query ="INSERT INTO tb_barang VALUES ('$kd_barang', '$jenis_barang', '$merk', '$jumlah', '$tahun_pembuatan'); ";                          
  $hasil = mysqli_query ($conn, $query);
  if($hasil){
      header("Location: http://localhost/projectdes/belajar-crud/barang.php");
    }else{
  $isError = TRUE; 
  $error = "gagal menyimpan ke database :" . mysqli_error($conn);
  }
    }
}

  if(isset($_POST['batal'])) {
    header("Location: http://localhost/projectdes/belajar-crud/barang.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Input Data barang</title>
  <?php include "contents/headscript.php"; ?>
</head>
<body>
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
    <label class="col-sm-2 col-form-label">Kode Barang</label>
    <div class="col-sm-10"  > 
      <input type="text" class="form-control" name="kd_barang" value="<?= $kd_barang ?>">
    </div>
  </div>

    <div class="form-group row">
    <label class="col-sm-2 col-form-label">jenis barang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="jenis_barang" value="<?= $jenis_barang ?>">
    </div>
  </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jenis merk</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="merk" value="<?= $merk ?>">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jumlah</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="jumlah" value="<?= $jumlah ?>">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Tahun Pembuatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tahun" value="<?= $tahun_pembuatan ?>">
    </div>
  </div>


  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name='submit'>Simpan</button>
      <button type="submit" class="btn btn-danger" name='batal'>  Batal</button>
    </div>
  </div>

</form>
  </div>
  </main>

  <?php include "contents/footer.php"; ?>
</body>
</html>