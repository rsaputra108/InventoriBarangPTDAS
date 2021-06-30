<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login &copy DELTA ART STAR</title>
	<!--Load CSS-->
	<link rel ="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
	<link rel ="stylesheet" type="text/css" href="./assets/css/signin.css">
	<link rel="icon" type="image/png" href="logo.png">
	<!--Load JS-->
	<script type ="text/javascript" src="./assets/js/jquery-3.4.1.slim.min.js"></script>
	<script type ="text/javascript" src="./assets/js/popper.min.js"></script>
	<script type ="text/javascript" src="./assets/js/bootstrap.min.js"></script>
	</head>
<body class="text-center" style="background: url('bg4.png') repeat;">
<div class="container" style="height: 100%; display: flex; justify-content: center; align-items: center;">
<table>
	<tr>
		<td style="padding: 10px;"></br>
			<div class="container" style="height: 100%; display: flex; justify-content: center; align-items: center;">
				<div style="top: 50%; transform:translate(0, -50%); position: absolute;">
					<div class="well">
						<p align="center"><img src="logo.png" height="75" /></p>
						<h4 align="center" style="margin: 15px 0 -10px 0;"><b>SISTEM INFORMASI INVENTORY</br> PT DELTA ART STAR</b></h4>
						<hr>
							<form class="form-signin" method="POST">
							<fieldset>
								<div class="form-group" style="min-width: 250px;">
									<input type="text" class="form-control" placeholder="unsername" id="Yourname" name="username" value="" onblur="if(this.value=='') this.value='Username';" onfocus="if(this.value=='Username') this.value='';" />
								</div>
								<div class="form-group">
									<input name="password" class="form-control" placeholder="password" type="password" id="password" value="" onblur="if(this.value=='') this.value='Password';" onfocus="if(this.value=='Password') this.value='';" />
								</div>
								<div class="form-group" style="margin-bottom: -10px;">
									<p align="center"><input type="submit" name="submit" id="submit" value="LOGIN" class="btn btn-danger"></p>
								</div>
							</fieldset>
								<?php
								session_start();
								if(isset($_SESSION['username'])){
									header("Location: http://localhost/projectdes/belajar-crud/index.php");
								}			
								if(isset($_POST['username']) && isset($_POST['password'])) {
									require "koneksi.php";
								//buka koneksi
								$conn = open_connection();
								
								//buat query SQL
								$query = "SELECT*FROM tb_admin WHERE username = '$_POST[username]' AND password_hash = MD5('$_POST[password]')";
								
								//eksekusi query
								$hasil = mysqli_query($conn, $query);
								
								//cek hasil, masuk ke index.php jika berhasil
								if($isi = mysqli_fetch_assoc($hasil)){
									$_SESSION['username'] = $isi['username'];
									header("Location: http://localhost/projectdes/belajar-crud/index.php");
								}else{
									echo '<div class ="alert alert-danger" role="alert">Username dan Password tidak valid</div>';
								}
								}
								?>
							</form>
					</div>
				</div>
			</div>
		</td>
	</tr>
</table>
</div>
</body>
</html>