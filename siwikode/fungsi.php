<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbsiwikode");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$fname = htmlspecialchars($data["fname"]);
	$notelp = htmlspecialchars($data["notelp"]);
	$email = htmlspecialchars($data["email"]);
	$wisata = htmlspecialchars($data["wisata"]);
	$gmaps = htmlspecialchars($data["gmaps"]);
	

	$query = "INSERT INTO testimoni
				VALUES
			  ('', '$fname', '$email', '$notelp', '$gmaps',  '$wisata')
			";



	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);




}






function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM wisatakuliner WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$notelp = htmlspecialchars($data["notelp"]);
	$email = htmlspecialchars($data["email"]);
	$gmaps = htmlspecialchars($data["gmaps"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	$wisata = htmlspecialchars($data["wisata"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	

	$query = "UPDATE wisatakuliner SET
				nama = '$nama',
				notelp = '$notelp',
				email = '$email',
				gmaps = '$gmaps',
				gambar = '$gambar',
				wisata = '$wisata'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM wisatakuliner
				WHERE
			  notelp LIKE '%$keyword%' OR
			  fname LIKE '%$keyword%' OR
			  email LIKE '%$keyword%' OR
			  gmaps LIKE '%$keyword%' OR
			  wisata LIKE '%$keyword%'
			";
	return query($query);
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', 'client' )");

	return mysqli_affected_rows($conn);

}









?>