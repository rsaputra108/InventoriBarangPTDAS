<?php
  require_once "koneksi.php";
  require_once "function.php";

  check_login();
  
  //TODO : mengambil array jurusan dari file functions
  $list_status = get_data_status();

  //TODO : membuat default variable & membaca data POST
  $id_barang = $_POST ['id_barang'] ?? '';
  $jenis_barang = $_POST ['jenis_barang'] ?? '';
  $tgl_masuk = $_POST ['tgl_masuk'] ?? '';
  $tgl_keluar  = $_POST ['tgl_keluar'] ?? '';
  $status = $_POST ['status'] ?? '';
  
  $isError = FALSE;
  $error = '';

  //TODO : Jika data disubmit, maka lakukan validasi dan simpan data
  if(isset($_POST['submit'])){
  //contoh validasi data
  if ($id_barang == ''){
  $isError = TRUE;
  $error = 'Kode Buku harap diisi !!';
  }

  //jika tidak ada salah input, makasimpan data ke dalam database
  if (!$isError){
  $conn =open_connection();

  $query ="INSERT INTO tb_transaksi (id_barang, jenis_barang, tgl_masuk, tgl_keluar,status) VALUES ('$id_barang', '$jenis_barang', '$tgl_masuk', '$tgl_keluar', '$status'); ";                          
  $hasil = mysqli_query ($conn, $query);
  if($hasil){
      header("Location: http://localhost/projectdes/belajar-crud/transaksi_barang.php");
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

  <title>Input Data Barang</title>
  <?php include "contents/headscript.php"; ?>
</head>

<body style="background: url('bg4.png') repeat;">

  <?php require_once "contents/navbar.php"; ?>

  <main>
      <div class="container">
  <?php if ($isError) : ?>
  <div class="alert alert-danger" role="alert">
  <?=$error ?>
  </div>
  <?php endif; ?>
    <form method ="POST">
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">ID barang</label>
    <div class="col-sm-10"  > 
      <input type="text" class="form-control" name="id_barang" value="<?= $id_barang ?>">
    </div>
  </div>

    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jenis barang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="jenis_barang" value="<?= $jenis_barang ?>">
    </div>
  </div>

   <div class="form-group row">
    <label class="col-sm-2 col-form-label">Tanggal Masuk</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="tgl_masuk" value="<?= $tgl_masuk ?>">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Tanggal Keluar</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="tgl_keluar" value="<?= $tgl_keluar ?>">
    </div>
  </div>

  
<div class="form-group row">
			<label class="col-sm-2 col-form-label">Status</label>
			<div class="col-sm-10">
				<select class="form-control" name="status">
					<option value="" >-- Status barang --</option>
					<?php
						if(count($list_status) > 0){
							foreach ($list_status as $kode_status => $nama){
								$terpilih =' ';
								if($status == $kode_status){
									$terpilih ='selected';
								}
								echo "<option value='$kode_status' $terpilih> $nama </option>";
							}
						}
					?>
				</select>
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