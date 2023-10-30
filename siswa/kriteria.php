<h1 align="center">DATA KRITERIA</h1>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="60px">ID Kriteria</th>
        <th width="80px">Kode</th>
        <th width="200px">Nama Kriteria</th>
		<th width="100px">Bobot</th>
      </tr>
    </thead>
    <tbody>
	<!-- awal proses menampilkan -->
	 <?php
     $sql = "SELECT*FROM kriteria ORDER BY id_kriteria ASC";
     $result = $conn->query($sql);
     while($row = $result->fetch_assoc()) {
	 ?>
		 <tr>
			<td><?php echo $row['id_kriteria']; ?></td>
			<td><?php echo $row['kode']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['bobot']; ?></td>
		 </tr>
	 <?php
		 }
		 $conn->close();
	 ?>
	 <!-- akhir proses menampilkan -->
   </tbody>
</table>