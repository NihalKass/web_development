<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--
Project      : Report Generation Of Employee
Author		 : (Pappu & Sidhartha)
Website		 : http://www.NkasS.tk
Email	 	 : pappu.kr26@gmail.com/nihal.kashyap26@gmail.com
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Report Generation of Employee</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<style>
		.content {
			margin-top: 80px;
		}
	</style>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">EMPLOYEE REPORT</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="">EMPLOYEE REPORT</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Employee Master Data</a></li>
					<li><a href="add.php">Employee Entry</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Employee Data; Replace Password</h2>
			<hr />

			<p>Replace Password of Employee ID. <?php echo '<b>'.$_GET['nik'].'</b>'; ?></p>

			<?php
			if(isset($_POST['ganti'])){
				$nik		= $_GET['nik'];
				$password 	= md5($_POST['password']);
				$password1 	= $_POST['password1'];
				$password2 	= $_POST['password2'];

				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik' AND password='$password'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password salah masukan password yang benar</div>';
				}else{
					if($password1 == $password2){
						if(strlen($password1) >= 6){
							$pass = md5($password1);
							$update = mysqli_query($koneksi, "UPDATE karyawan SET password='$pass' WHERE nik='$nik'");
							if($update){
								echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password berhasil dirubah.</div>';
							}else{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password gagal dirubah.</div>';
							}
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Panjang karakter Password minimal 6 karakter.</div>';
						}
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Pasword tidak sama</div>';
					}
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Password long</label>
					<div class="col-sm-4">
						<input type="password" name="password" class="form-control" placeholder="Password Long" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password New</label>
					<div class="col-sm-4">
						<input type="password" name="password1" class="form-control" placeholder="Password New" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Repeat New Password </label>
					<div class="col-sm-4">
						<input type="password" name="password2" class="form-control" placeholder="Repeat New Password " required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="ganti" class="btn btn-sm btn-info" value="Submit">
						<a href="index.php" class="btn btn-sm btn-danger"><b>Cancel</b></a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
