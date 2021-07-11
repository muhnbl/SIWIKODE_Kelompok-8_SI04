<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);



}



if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}




if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];


	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {


		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;
			{
				echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
			}


				// cek jika user login sebagai admin
	if($row['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:index.php");
 
	// cek jika user login sebagai pegawai
	} if($row['level']=="client"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "client";
		// alihkan ke halaman dashboard pegawai
		header("location:landingpage.html");
	}

				

		}
	}

}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
ul {
  list-style-type: none;
}
</style>
</head>
<body>

<h1>Halaman Login</h1>

<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">username / password salah</p>
<?php endif; ?>

<div class="container" id="container">
<div class="form-container sign-up-container">

<form action="" method="post">
	<h1>Create Account</h1>
	<input type="text" name="username" placeholder="Name" required>
	<input type="password" name="password" placeholder="Password" required>

	<input type="password" name="password2" id="password2" placeholder="Password2" required>
	<button type="submit" name="register">Register!</button>
</form>
</div>
<div class="form-container sign-in-container">
	<form action="" method="post">
		<h1>Sign In</h1>
	<input type="text" name="username" id="username" placeholder="Username" required>
	<input type="password" name="password" id="password" placeholder="Password" required>
	<button type="submit" name="login" >Login</button>
	</form>

</div>

<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Sudah punya account?</h1>
			<p>Langsung Login aja sini :D</p>
			<button class="ghost" id="signIn">Sign In</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Hai, Kamu</h1>
			<p>Belum punya account? Sign up dulu ya :D </p>

			<button class="ghost" id="signUp">Sign Up</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>
</body>
</html>