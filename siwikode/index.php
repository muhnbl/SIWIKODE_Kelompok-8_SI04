<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php' ;


// pagination
// konfigurasi
$jumlahDataPerHalaman = 6;
$jumlahData = count(query("SELECT * FROM wisatakuliner"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$wisatakuliner = query("SELECT * FROM wisatakuliner LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari ditekan

if( isset($_POST["cari"]) ) {
	$wisatakuliner = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

<a href="logout.php">Logout</a>

<a href="tambah.php">Tambah data wisatakuliner</a>
<br><br>


<form action="" method="post">


	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
	
</form>
<br><br>

<!-- navigasi -->
<a href="?halaman=1">awal</a>

<?php if( $halamanAktif > 1 ) : ?>
	<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
		<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else : ?>
		<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif < $jumlahHalaman ) : ?>
	<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>

<a href="?halaman=<?= $jumlahHalaman; ?>">akhir</a>


 <section>
 

 <h1>Data Daftar Wisata</h1>
   <div class="tbl-header">
   	  <table cellpadding="0" cellspacing="0" border="0">
   	  	 <thead>
	<tr>
		<th>No.</th>
		<th>Tanggal</th>

		<th>Gambar</th>
		<th>Nama</th>
		<th>No.Telp</th>
		<th>Email</th>
		<th>Gmaps</th>
		<th>Wisata</th>
		<th>Action</th>
	</tr>
	</thead>
	</table>
	 </div>



<div class="tbl-content">
	    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
	<?php $i = 1; ?>
	<?php foreach( $wisatakuliner as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>

		<td><?php echo date("Y/m/d") ; ?></td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["notelp"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["gmaps"]; ?></td>
		<td><?= $row["wisata"]; ?></td>
				<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
		</td>
	</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
      </tbody>
    </table>


  </div>

</section>


/////////////////////////////////////////////////////////////////////////////


<a href="tambah.php">Tambah data Testimoni</a>
<br><br>


<form action="" method="post">


	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
	
</form>
<br><br>

<!-- navigasi -->
<a href="?halaman=1">awal</a>

<?php if( $halamanAktif > 1 ) : ?>
	<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
		<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else : ?>
		<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif < $jumlahHalaman ) : ?>
	<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>

<a href="?halaman=<?= $jumlahHalaman; ?>">akhir</a>


 <section>
 

 <h1>Data Daftar Wisata</h1>
   <div class="tbl-header">
   	  <table cellpadding="0" cellspacing="0" border="0">
   	  	 <thead>
	<tr>
		<th>No.</th>
		<th>Tanggal</th>
		<th>Nama</th>
		<th>No.Telp</th>
		<th>Email</th>
		<th>testimoni</th>
		<th>rating</th>
	</tr>
	</thead>
	</table>
	 </div>



<div class="tbl-content">
	    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
	<?php $i = 1; ?>
	<?php foreach( $wisatakuliner as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>

		<td><?php echo date("Y/m/d") ; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["wisata"]; ?></td>
		<td><?= $row["rating"]; ?></td>
		<td><?= $row["comment"]; ?></td>
				<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
		</td>
	</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
      </tbody>
    </table>


  </div>

</section>
<script>
	// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>

	














</body>
</html>