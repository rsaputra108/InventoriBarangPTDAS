<?php 
	require_once "koneksi.php";
	require_once "function.php";

	check_login();

	$kd_barang = $_GET['kd_barang'];

	$conn = open_connection();

	$query = "DELETE FROM tb_barang WHERE kd_barang = '$kd_barang' ";

	$hasil = mysqli_query($conn, $query);

	if($hasil){
		header("Location: http://localhost/projectdes/belajar-crud/barang.php");
	}else{
		echo "gagal menghapus data $kd_barang : ". mysqli_error($conn);
	}
?>