
<?php
session_start();

//cek apakah sudah login atau belum bila belum maka tidak akan bisa masuk.
//if( !isset($_SESSION["login"]) ) {
	//header("Location: login.php");
	//exit;
//}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = '';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = '';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<link rel="stylesheet" href="css2/style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<nav class="navbar navbar-toggleable-sm ">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="navbar-nav">
				<li class="nav-item">
					 <a class="nav-link" href="landingpage.html">Home</a>
				</li>

				<li class="nav-item">
					 <a class="nav-link" href="halamankuliner.html">Wisata Rekreasi</a>
				</li>

				<li class="nav-item">
						<a class="nav-link" href="halamanrekreasi.html">Wisata Kuliner</a>
				</li>

				<li class="nav-item">
					 <a class="nav-link" href="tambah.php">Registrasi</a>
				<li class="nav-item">
			</ul>
			<ul class="navbar-nav ml-md-auto">
				<li class="nav-item">
					 <a class="nav-link" href="login.php">Login</a>
				<li class="nav-item">
					 <a class="nav-link" href="logout.php">Logout</a>
			</ul>
		</div>
	</nav>
</div>
</head>
<body style="background-color: #eeeeee;">
</br>
</br>


	<div class="list">
		<div class="column">
	<form action="" method="post" enctype="multipart/form-data">
			<h1 style="font-family:serif;">Registrasi</h1>
		<ul>
			<li>
				<input type="text" name="nama" id="nama" placeholder="   Nama" required>
			</li>
		</br>
			<li>
				<input type="text" name="email" id="email" placeholder="   E-mail" required>
			</li>
		</br>
			<li>
				<input type="text" name="notelp" id="notelp" placeholder="   No-Telp" required>
			</li>
		</br>
			<li>
				<input type="text" name="gmaps" id="gmaps" placeholder="   Gmaps" required>
			</li>
		</br>
		</br>


		<label for="wisata">Wisata</label>
  <select id="wisata" name="wisata" required>
		<option value="" disabled selected>Standard Select</option>
    <option value="kuliner">Kuliner</option>
    <option value="rekreasi">Rekreasi</option>
  </select>
	</br>
		</br>
			<li>
				<label for="gambar">Upload Gambar :</label>
			</br>
		</br>
				<input  class="upload" type="file" name="gambar" id="gambar">
			</li>
		</br>
	</br>
			<li>
				<button type="submit" name="submit"><strong>Tambah</strong></button>
			</li>
		</ul>

	</form>
</div>



</body>
</html>
