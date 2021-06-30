<?php 
	require_once "koneksi.php";
	require_once "function.php";

	check_login();

	$id_pegawai = $_GET['id_pegawai'];

	$conn = open_connection();

	$query = "DELETE FROM tb_karyawan WHERE id_pegawai = '$id_pegawai' ";

	$hasil = mysqli_query($conn, $query);

	if($hasil){
		header("Location: http://localhost/projectdes/belajar-crud/karyawan.php");
	}else{
		echo "gagal menghapus data $id_pegawai : ". mysqli_error($conn);
	}
?>