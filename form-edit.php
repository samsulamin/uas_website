<html !DOCTYPE>
<head>
	<title>Ubah Data</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><h2>Ubah Data</h2></div>
	<hr>
<?php
    include('koneksi.php');

    if($_GET['nim']!=null){
        $nim = $_GET['nim'];

        $koneksiObj = new Koneksi();
        $koneksi = $koneksiObj->getKoneksi();

        if($koneksi->connect_error){
            echo "Gagal Koneksi : ". $koneksi->connect_error;
        }

        $query = "select * from uas_mahasiswa where nim='$nim'";
        $data = $koneksi->query($query);

    }
?>

<?php
        if($data->num_rows <= 0){
            echo "Data tidak ditemukan";
        } else{
            while($row = $data->fetch_assoc()){
                $nim    = $row['nim'];
                $nama   = $row['nama'];
                $jk     = $row['jenis_kelamin'];
				$jurusan  = $row['jurusan'];
                $semester    = $row['semester'];
                $alamat    = $row['alamat'];
            }
        }
    ?>

    <div class="panel-body">
		<form action = "update.php" method="post">
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">NIM</label>
				<div class="col-3">
					<input class="form-control" type="text" name="nim" readonly="true"
					value="<?php echo $_GET["nim"]; ?>" requered>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">NAMA</label>
				<div class="col-3">
					<input class="form-control" type="text" name="nama" placeholder="nim" value="<?php echo $nama;?>">
				</div>
			</div>
			
			<div class="form-group row">
			  <label class="col-sm-2 control-label">JENIS KELAMIN</label>
			  <div class="col-3">
				  <select class="form-control" name="jk">
					<option selected>Jenis Kelamin</option>
					<option value="laki-laki" <?php echo $jk=='laki-laki' ? 'selected':'';?>>Laki-laki</option>
                    <option value="perempuan" <?php echo $jk=='perempuan' ? 'selected':'';?>>Perempuan</option>
				  </select>
			  </div>
			</div>
			
			<div class="form-group row">
			  <label class="col-sm-2 control-label">JURUSAN</label>
			  <div class="col-3">
				  <select class="form-control" name="jurusan" value="<?php echo $_GET["jurusan"]; ?>">
					<option selected>Pilih Jurusan</option>
					<option value="D4 Teknik Informatika" <?php echo $jurusan=='D4 Teknik Informatika' ? 'selected':'';?>>D4 Teknik Informatika</option>
					<option value="D3 Kebidanan" <?php echo $jurusan=='D3 Kebidanan' ? 'selected':'';?>>D3 Kebidanan</option>
					<option value="D3 Farmasi" <?php echo $jurusan=='D3 Farmasi' ? 'selected':'';?>>D3 Farmasi</option>
					<option value="D4 TI" <?php echo $jurusan=='D3 Mesin' ? 'selected':'';?>>D3 Mesin</option>
					<option value="D3 Kebidanan" <?php echo $jurusan=='D3 Akutansi' ? 'selected':'';?>>D3 Akutansi</option>
					<option value="D3 Farmasi" <?php echo $jurusan=='D3 Komputer' ? 'selected':'';?>>D3 Komputer</option>
				  </select>
			  </div>
			</div>
			
			<div class="form-group row">
			  <label class="col-sm-2 control-label">SEMESTER</label>
			  <div class="col-3">
				  <select class="form-control" name="semester" value="<?php echo $_GET["semester"]; ?>">
					<option selected>Semester</option>
					<option value="1" <?php echo $semester=='1' ? 'selected':'';?>>1</option>
					<option value="2" <?php echo $semester=='2' ? 'selected':'';?>>2</option>
					<option value="3" <?php echo $semester=='3' ? 'selected':'';?>>3</option>
					<option value="4" <?php echo $semester=='4' ? 'selected':'';?>>4</option>
					<option value="5" <?php echo $semester=='5' ? 'selected':'';?>>5</option>
					<option value="6" <?php echo $semester=='6' ? 'selected':'';?>>6</option>
					<option value="7" <?php echo $semester=='7' ? 'selected':'';?>>7</option>
					<option value="8" <?php echo $semester=='8' ? 'selected':'';?>>8</option>
				  </select>
			  </div>
			</div>
			
			<div class="form-group row">
				<label for="example-text-input" class="col-2 col-form-label">ALAMAT</label>
				<div class="col-3">
					<input class="form-control" type="text" name="alamat" placeholder="nim" value="<?php echo $alamat;?>">
				</div>
			</div>
			
			<input class="btn btn-primary" type="submit" value="Submit">
			<input class="btn btn-primary" type="reset" value="Reset">
		</form>
	</div>
  </div>
	</div>
</div>
</body>
</html>