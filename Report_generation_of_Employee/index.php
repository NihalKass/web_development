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
					<li class="active"><a href="index.php">Employee Master Data</a></li>
					<li><a href="add.php">Employee Entry </a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Employee Data</h2>
			<hr />

			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$nik = $_GET['nik'];
				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data not Found.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM karyawan WHERE nik='$nik'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data successfully deleted.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data failed to delete.</div>';
					}
				}
			}
			?>

			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Employee Current Status</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="Tetap" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Present</option>
						<option value="Kontrak" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Absent</option>
                        <option value="Outsourcing" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>On_Leave</option>
					</select>
				</div>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Employee ID.</th>
					<th>Name</th>
                    <th>City</th>
                    <th>Date Of Birth</th>
					<th>Contact No.</th>
					<th>Employee Post.</th>
					<th>Status</th>
                    <th>Tools</th>
				</tr>
				<?php
				if($filter){
					$sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE status='$filter' ORDER BY nik ASC");
				}else{
					$sql = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY nik ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Data Empaty.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['nik'].'</td>
							<td><a href="profile.php?nik='.$row['nik'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['nama'].'</a></td>
                            <td>'.$row['tempat_lahir'].'</td>
                            <td>'.$row['tanggal_lahir'].'</td>
							<td>'.$row['no_telepon'].'</td>
                            <td>'.$row['jabatan'].'</td>
							<td>';
							if($row['status'] == 'Tetap'){
								echo '<span class="label label-success">Present</span>';
							}
                            else if ($row['status'] == 'Kontrak' ){
								echo '<span class="label label-info">Absent</span>';
							}
                            else if ($row['status'] == 'Outsourcing' ){
								echo '<span class="label label-warning">On_Leave</span>';
							}
						echo '
							</td>
							<td>

								<a href="edit.php?nik='.$row['nik'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="password.php?nik='.$row['nik'].'" title="Ganti Password" data-placement="bottom" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&nik='.$row['nik'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
	<h3>&copy; Pappu Kumar & Shiddhartha Ghosh 2017 (Report Generation of Employee)</h3
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
