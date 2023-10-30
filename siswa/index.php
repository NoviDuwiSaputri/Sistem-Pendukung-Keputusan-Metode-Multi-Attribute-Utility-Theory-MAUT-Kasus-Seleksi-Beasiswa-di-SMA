<?php 
    date_default_timezone_set("Asia/Jakarta");
    include "config.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- dataTables CSS -->
	<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">

    <title>SPK Penerimaan Beasiswa</title>
  </head>
  <body>
	<!-- awal navbar -->
	     <!-- navbar menu -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?page=kriteria">Data Kriteria</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?page=pengajuan">Pengajuan Siswa</a>
            </li>
			<li class="nav-item">
            <a class="nav-link" href="?page=normalisasi">Normalisasi</a>
            </li>
			<li class="nav-item">
            <a class="nav-link" href="?page=siswa">Penerima</a>
            </li>
        </ul>
        </nav>
	<!-- akhir navbar -->
	<!-- awal container -->
    <div class="container" style="margin-top: 20px">
	
	<?php
		//setting variabel page & action
		$page = isset($_GET['page']) ? $_GET['page'] : "";
		$action = isset($_GET['action']) ? $_GET['action'] : "";
		
		//setting halaman
		if ($page==""){
			include "welcome.php";
		}elseif ($page=="kriteria"){
			if ($action==""){
				include "kriteria.php";
			}
		}elseif ($page=="pengajuan"){
			if ($action==""){
				include "pengajuan.php";
			}
		}elseif ($page=="normalisasi"){
			if ($action==""){
				include "normalisasi.php";
			}
		}else{
			include "siswa.php";
		}
	?>
	</div>
  </body>
</html>