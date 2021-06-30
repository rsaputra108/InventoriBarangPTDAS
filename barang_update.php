<?php
  require_once "koneksi.php";
  require_once "function.php";

  check_login();
  $list_barang = get_data_barang();
  $param_kd_barang= $_GET['kd_barang'];

  $conn = open_connection();
  $query = "SELECT * FROM tb_barang WHERE kd_barang='$param_kd_barang' ";
  $hasil = mysqli_query($conn, $query);
  $old_data = array();
  if($row = mysqli_fetch_assoc($hasil)) {
    $old_data=$row;
  }


  //TODO : membuat default variable & membaca data POST
  $kd_barang = $_POST ['kd_barang'] ?? $old_data ['kd_barang'];
  $jenis_barang = $_POST ['jenis_barang'] ?? $old_data ['jenis_barang'];
  $merk = $_POST ['merk'] ??  $old_data['merk'];
  $jumlah = $_POST ['jumlah'] ?? $old_data['jumlah'];
  $tahun_pembuatan = $_POST ['tahun_pembuatan'] ?? $old_data['tahun_pembuatan'];
  
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

  $query ="UPDATE tb_barang SET
          jenis_barang= '$jenis_barang',
          merk = '$merk',
          jumlah = '$jumlah',
          tahun_pembuatan = '$tahun_pembuatan'

          WHERE
          kd_barang = '$old_data[kd_barang]'"; 

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
    header("Location: http://localhost/project/belajar-crud/buku.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Input Data Barang</title>
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
      <input type="text" class="form-control" name="tahun_pembuatan" value="<?= $tahun_pembuatan ?>">
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