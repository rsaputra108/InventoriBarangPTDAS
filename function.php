<?php
	session_start();
	define('Base_URL', "http://localhost/projectdes/belajar-crud/");
	
	function check_login(){
		if(!isset($_SESSION['username'])){
			header("Location: http://localhost/projectdes/belajar-crud/login.php");
		}
	}

	function get_data_karyawan(){
		require_once "koneksi.php";
		$conn = open_connection ();

		$query = "SELECT * FROM tb_karyawan";
		$hasil = mysqli_query ($conn, $query);

		$list = array();
		while($row = mysqli_fetch_assoc($hasil) ){
		$list[ $row['id_pegawai'] ] = $row['nama_pegawai'];
		}
		return $list;
	}

	function get_data_barang(){
		require_once "koneksi.php";
		$conn = open_connection ();

		$query = "SELECT * FROM tb_barang";
		$hasil = mysqli_query ($conn, $query);

		$list = array();
		while($row = mysqli_fetch_assoc($hasil) ){
		$list[ $row['kd_barang'] ] = $row['jenis_barang'];
		}
		return $list;
	}
	
	function get_data_keterangan(){
		require_once "koneksi.php";
		$conn = open_connection();
		
		$query = "SELECT kode, keterangan FROM keterangan";
		$hasil = mysqli_query($conn, $query);
		
		$list = array();
		while($row = mysqli_fetch_assoc($hasil)){
			$list[$row['kode']]=$row['keterangan'];
		}
		return $list;
	}
	
	function get_data_status(){
		require_once "koneksi.php";
		$conn = open_connection();
		
		$query = "SELECT kode, kode_status FROM tb_status";
		$hasil = mysqli_query($conn, $query);
		
		$list = array();
		while($row = mysqli_fetch_assoc($hasil)){
			$list[$row['kode']]=$row['kode_status'];
		}
		return $list;
	}

?>