<h1 align="center">NORMALISASI</h1>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th>ID </th>
        <th width="200px">Nama Siswa</th>
		<th>NISN</th>
		<th>Pekerjaan Ortu</th>
		<th>Penghasilan Ortu</th>
		<th>Tanggungan</th>
		<th>Saudara</th>
		<th>Kelas</th>
		<th>Tanggal</th>
		<th id="total">Total</th>
      </tr>
    </thead>
    <tbody>
	<!-- awal proses menampilkan -->
	 <?php
	 $no=1;
     $sql = "SELECT*FROM log_siswa ORDER BY id_siswa ASC";
     $result = $conn->query($sql);
     while($row = $result->fetch_assoc()) {
	 ?>
		 <tr>
			<td><?= $no++; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['nisn']; ?></td>
			<td><?php echo $row['pekerjaan']; ?></td>
			<td><?php echo $row['penghasilan']; ?></td>
			<td><?php echo $row['tanggungan']; ?></td>
			<td><?php echo $row['saudara']; ?></td>
			<td><?php echo $row['kelas'];?></td>
			<td><?php echo $row['tgl'];?></td>
			<td><?php echo $row['total_normalisasi'];?></td>
		 </tr>
	 <?php
		 }
	 ?>
	 <!-- akhir proses menampilkan -->
   </tbody>
</table>
<form id="form" method="post">
	 <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Normalisasi</button>
	 <button type="submit" name="desc" id="desc" class="btn btn-primary">Perangkingan</button>
</form>
<?php
	require "config.php";
	function normalisasi(){
		global $conn;
		//Bobot array {C1=0.25, C2=0.25, C3=0.2, C4=0.15, C5=0.15}
		$bobot = array(0.25,0.25,0.20,0.15,0.15);
			//max
			$max=mysqli_query($conn,"SELECT MAX(pekerjaan) AS max1, MAX(penghasilan) AS max2,
			MAX(tanggungan) AS max3, MAX(saudara) AS max4, MAX(kelas) AS max5 FROM log_siswa");			
			$a=mysqli_fetch_assoc($max);	
			
			//min
			$min=mysqli_query($conn,"SELECT MIN(pekerjaan) AS min1,  MIN(penghasilan) AS min2,
			MIN(tanggungan) AS min3, MIN(saudara) AS min4, MIN(kelas) AS min5 FROM log_siswa");
			$b=mysqli_fetch_assoc($min);
		
		$data = mysqli_query($conn,"SELECT * FROM log_siswa");
		$array = [];
		foreach ($data as $data) {
			array_push($array, $data);
		}
		for ($i = 0; $i < count($array); $i++) {
			$id = $array[$i]["id_siswa"];
			$pekerjaan = $array[$i]["pekerjaan"];
			$penghasilan = $array[$i]["penghasilan"];
			$tanggungan = $array[$i]["tanggungan"];
			$saudara = $array[$i]["saudara"];
			$kelas = $array[$i]["kelas"];
			
			$nor_pekerjaan = round(($pekerjaan-$b['min1'])/($a['max1']-$b['min1'])*$bobot[0],2);
			$nor_penghasilan = round(($penghasilan-$b['min2'])/($a['max2']-$b['min2'])*$bobot[1],2);
			$nor_tanggungan = round(($tanggungan-$b['min3'])/($a['max3']-$b['min3'])*$bobot[2],2);
			$nor_saudara = round(($saudara-$b['min4'])/($a['max4']-$b['min4'])*$bobot[3],2);
			$nor_kelas = round(($kelas-$b['min5'])/($a['max5']-$b['min5'])*$bobot[4],2);
			$total = $nor_pekerjaan+$nor_penghasilan+$nor_tanggungan+$nor_saudara+$nor_kelas;
		
			mysqli_query($conn,"UPDATE log_siswa SET pekerjaan=$nor_pekerjaan, penghasilan=$nor_penghasilan,
			tanggungan=$nor_tanggungan, saudara=$nor_saudara, kelas=$nor_kelas, total_normalisasi=$total
			WHERE id_siswa='$id'");
		}
	}
?>
<?php
	require "config.php";
	function rangking(){
		global $conn;
		$cek = 2;
		$data = mysqli_query($conn, "SELECT * FROM log_siswa ORDER BY total_normalisasi DESC LIMIT 5");
		$array = [];
		foreach ($data as $d) {
			array_push($array, $d);
		}
		$siswa1 = $array[0]["nama"];
		$siswa2 = $array[1]["nama"];
		$nisn1 = $array[0]["nisn"];
		$nisn2 = $array[1]["nisn"];
		$idsiswa1 = $array[0]["id_siswa"];
		$idsiswa2 = $array[1]["id_siswa"];
		$tgl = date("Y/m/d");
		mysqli_query($conn, "INSERT INTO siswa VALUES('','$siswa1','$nisn1','DI TERIMA','$tgl','$idsiswa1')");
		mysqli_query($conn, "INSERT INTO siswa VALUES('','$siswa2','$nisn2','DI TERIMA','$tgl','$idsiswa2')");
		$_SESSION["id1"] = $array[0]["id_siswa"];
		$_SESSION["id2"] = $array[1]["id_siswa"];
		$_SESSION["id3"] = $array[2]["id_siswa"];
		$_SESSION["id4"] = $array[3]["id_siswa"];
		$_SESSION["id5"] = $array[4]["id_siswa"];

		if (isset($_SESSION["id1"])) {
			$id1 = $_SESSION["id1"];
			$id2 = $_SESSION["id2"];
			$id3 = $_SESSION["id3"];
			$id4 = $_SESSION["id4"];
			$id5 = $_SESSION["id5"];

			mysqli_query($conn, "DELETE FROM log_siswa WHERE id_siswa = $id1");
			mysqli_query($conn, "DELETE FROM log_siswa WHERE id_siswa = $id2");
			mysqli_query($conn, "DELETE FROM log_siswa WHERE id_siswa = $id3");
			mysqli_query($conn, "DELETE FROM log_siswa WHERE id_siswa = $id4");
			mysqli_query($conn, "DELETE FROM log_siswa WHERE id_siswa = $id5");
		}
	}
?>

<?php
	require "config.php";
	if (isset($_POST["Submit"])){
		normalisasi();
	}
	if (isset($_POST["desc"])){
		rangking();
	}
?>