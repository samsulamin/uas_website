<!DOCTYPE html>
<head>
	<title> Data Mahasiswa </title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>           
    <div class="row">
        <div class="container">
		<br>
            <h2>Aplikasi Data Mahasiswa</h2>
            <hr>
            <a href="input.php" class="btn btn-success">Tambah Data</a>
            <br><br>
	<table class="table table-striped table-bordered table-hover" id="tb-mahasiswa">
    <thead>
      <tr>
        <th class="text-center">NIM</th>
        <th class="text-center">NAMA</th>
		<th class="text-center">JENIS KELAMIN</th>
        <th class="text-center">JURUSAN</th>
		<th class="text-center">SEMESTER</th>
        <th class="text-center">ALAMAT</th>
		<th class="text-center">PILIHAN</th>
      </tr>
    </thead>
    <tbody>
		<?php
		include "koneksi.php";

		$koneksiObj = new Koneksi();
		$koneksi = $koneksiObj->getKoneksi();

		if($koneksi->connect_error) {
			echo "<tr><td>";
			echo "Gagal koneksi : ". $koneksi->connect_error;
			echo "</td></tr>";
		}

		$query = "select * from uas_mahasiswa order by nama";
		$data = $koneksi->query($query);
		
		
		if($data->num_rows <= 0) {
			echo "<tr><td colspan='7'>";
			echo "<p align='center'>Tidak ada data</p>";
			echo "</td></tr>";
		}else {
			while ($row = $data->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["nim"]. "</td>"; 
				echo "<td>" . $row["nama"]. "</td>";
				echo "<td>" . $row["jenis_kelamin"]. "</td>";
				echo "<td>" . $row["jurusan"] . "</td>";
				echo "<td>" . $row["semester"]. "</td>";
				echo "<td>" . $row["alamat"] . "</td>";
				echo '<td class="text-center"><a href="form-edit.php?nim='. $row["nim"] .'"><button type="button" class="btn btn-warning">Edit</button></a> 
				<a href="hapus.php?nim='. $row["nim"] .'"><button type="button" class="btn btn-danger">Hapus</button></a></td>';
				echo "</tr>";
			}
		}
		
		$koneksi->close();
	?>
		</table>
		</div>
    </div>
</body>
</html>