<html !DOCTYPE>
<head>
	<title> Data Mahasiswa </title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
	<div class="portfolio-modal mfp-hide" id="logo-modal-1">
      <div class="portfolio-modal-dialog bg-white">
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
			<br>
              <h3 class='text-secondary text-uppercase mb-0'>Project Name</h3>
              <hr class="star-dark mb-5">
				  <?php
					$server = "localhost";
					$username = "root";
					$password = "";
					$db = "uas_4c";

					$koneksi = new mysqli($server, $username, $password, $db);
					if($koneksi->connect_error) {
						echo "gagal koneksi : " . $koneksi->connect_error;
					}

					$nim 	= $_POST['nim'];
					$nama   = $_POST['nama'];
					$jenis_kelamin   = $_POST['jk'];
					$jurusan = $_POST['jurusan'];
					$semester   = $_POST['semester'];
					$alamat = $_POST['alamat'];
					
					if($nim=='' || $nama=='' || $jenis_kelamin=='' || $jurusan=='' || $semester=='' || $alamat==''){
						echo " isi form dengan lengkap<br>";
						echo '<a class="btn btn-warning btn-lg rounded-pill portfolio-modal-dismiss" href="index.php">
						<i class="fa fa-close"></i>
						Kembali</a>';
						return;
					}

					$query = "insert into uas_mahasiswa values('$nim','$nama','$jenis_kelamin','$jurusan','$semester','$alamat')";

					//echo "<br>".$query;
						
					if($koneksi->query($query) === true) {
						echo "<h5 class='text-secondary text-uppercase mb-0'>Data Dengan Nama</h5>".$_POST["nama"]. "<br><h5>Berhasil Disimpan</h5>";
					}elseif($nim==$nim){
						echo "<h5 class='text-secondary text-uppercase mb-0'>Data Dengan Nim</h4>".$_POST["nim"]. "<br><h5>Sudah Ada</h5>";
					}else{
						$koneksi->error;
						echo "<h5 class='text-secondary text-uppercase mb-0'>Data Dengan Nim</h5>".$_POST["nim"]. "Nama".$_POST["nama"]."<br><h5>Berhasil Disimpan</h4>";
					}

					$koneksi->close();
				?>
				<hr class="star-dark mb-5">
				<a class="btn btn-warning" href="input.php">
                <i class="fa fa-close"></i>
                kembali</a>
				<a class="btn btn-primary" href="index.php">
                <i class="fa fa-close"></i>
                Lihat Data</a>
            </div>
          </div>
        </div>
      </div>
    </div>	
	</div>
</body>
</html>