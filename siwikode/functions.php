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

function testimoni($data)
{
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$wisata = htmlspecialchars($data["wisata"]);
	$rating = htmlspecialchars($data["rating"]);
	$comment = htmlspecialchars($data["comment"]);



	$query = "INSERT INTO testimoni
				VALUES
			  ('', '$nama', '$email', '$wisata', '$rating', '$comment')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$notelp = htmlspecialchars($data["notelp"]);
	$email = htmlspecialchars($data["email"]);
	$wisata = htmlspecialchars($data["wisata"]);
	$gmaps = htmlspecialchars($data["gmaps"]);
	
	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO wisatakuliner
				VALUES
			  ('', '$nama', '$email', '$notelp', '$gmaps', '$gambar', '$wisata')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);




}


function upload() {

	$namaFileBaru = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFileBaru);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate notelp gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
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
			  nama LIKE '%$keyword%' OR
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