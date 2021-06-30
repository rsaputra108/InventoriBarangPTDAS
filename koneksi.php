<?php
	//membuka koneksi ke database
	function open_connection()
	{
		$host = "localhost";
		$username = "root";
		$password = "";
		$databasename = "db_barang";
		
		$koneksi = mysqli_connect($host,$username,$password,$databasename);
		
		//periksa koneksi
		if (mysqli_connect_errno())
		{
			die ("Gagal melakukan koneksi ke MYSQL : ".mysqli_connect_error());
		}
		return $koneksi;
	}
	?>