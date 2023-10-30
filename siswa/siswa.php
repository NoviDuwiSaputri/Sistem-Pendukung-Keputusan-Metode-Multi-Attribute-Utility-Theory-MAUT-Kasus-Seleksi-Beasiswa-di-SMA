<h1 align="center">SISWA</h1>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
		<th>NISN</th>
        <th>Status</th>
		<th>Tanggal Di Terima</th>
      </tr>
    </thead>
	<tbody id="body">
                <?php
				require "config.php";
                $no=1;
				$datasiswa = mysqli_query($conn,"SELECT * FROM siswa");
                foreach ($datasiswa as $data) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td class="text-center"><?= $data["nama"]; ?></td>
					<td class="text-center"><?= $data["nisn"]; ?></td>
                    <td class="text-center"><?= $data["status"]; ?></td>
                    <td class="text-center"><?= $data["tgl"]; ?></td>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
</table>