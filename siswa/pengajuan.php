<html lang="en">
<head>
    <title>Pengajuan Siswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container p-3 my-3 border">
    <h1 class="text-center">PENGAJUAN SISWA</h1>
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "config.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if (isset($_POST["Submit"])) {

        $nama=input($_POST["nama"]);
        $nisn=input($_POST["nisn"]);
        $pekerjaan=input($_POST["pekerjaan"]);
		$penghasilan=input($_POST["penghasilan"]);
		$tanggungan=input($_POST["tanggungan"]);
		$saudara=input($_POST["saudara"]);
		$kelas=input($_POST["kelas"]);
		$date_now = date("Y/m/d");
		
        //Query input menginput data kedalam tabel pendaftaraan
        $sql="INSERT INTO log_siswa (nama,nisn,pekerjaan,penghasilan,tanggungan,saudara,kelas,tgl)
		VALUES ('$nama','$nisn','$pekerjaan','$penghasilan','$tanggungan','$saudara','$kelas','$date_now')";
		
        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) { 
            echo "<div class='alert alert-success'> Selamat $nama anda telah berhasil mendaftar.</div>"; 
        }
        else {
            echo "<div class='alert alert-danger'> Pendaftaraan Gagal.</div>";
        }
    }
    ?>
        <form id="form" method="post">
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>Nama Lengkap:</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukan NISN" required>
                    </div>
                </div>
			</div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Pekerjaan Orang Tua</label>
                        <select class="form-control" name="pekerjaan" id="pekerjaan" required>
                            <option selected>Pilih Pekerjaan</option>
                            <option value="5">Petani</option>
                            <option value="4">Buruh Pabrik</option>
							<option value="3">Pegawai</option>
							<option value="2">PNS</option>
							<option value="1">TNI/POLRI</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Penghasilan Orang Tua</label>
                        <select class="form-control" name="penghasilan" id="penghasilan" required>
                            <option selected>Pilih Penghasilan</option>
                            <option value="5"> 0 - Rp.500 ribu </option>
                            <option value="4"> Rp.500 ribu - Rp.1 jt</option>
							<option value="3"> Rp.1 jt - Rp.1.5 jt</option>
							<option value="2"> Rp.1.5 jt - Rp.2 jt</option>
							<option value="1"> >= Rp.2 jt</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <div class="form-group">
                        <label>Jumlah Tanggungan Orang Tua</label>
                        <select class="form-control" name="tanggungan" id="tanggungan" required>
                            <option selected>Pilih Jumlah Tanggungan</option>
                            <option value="5"> > 5 anak </option>
                            <option value="4"> 4 anak</option>
							<option value="3"> 3 anak</option>
							<option value="2"> 2 anak</option>
							<option value="1"> 1 anak</option>
                        </select>
						</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-group">
                        <label>Jumlah Saudara Kandung</label>
                        <select class="form-control" name="saudara" id="saudara" required>
                            <option selected>Pilih Jumlah Suadara</option>
                            <option value="5"> > 5 orang </option>
                            <option value="4"> 4 orang</option>
							<option value="3"> 3 orang</option>
							<option value="2"> 2 orang</option>
							<option value="1"> 1 orang</option>
                        </select>
						</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas" id="kelas" required>
                            <option selected>Pilih Kelas</option>
                            <option value="3"> Kelas 12 </option>
                            <option value="2"> Kelas 11</option>
							<option value="1"> Kelas 10</option>
                        </select>
						</div>
                    </div>
                </div>
			</div>
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Daftar</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>