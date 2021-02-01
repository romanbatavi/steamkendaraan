<?php
session_start();
if( empty( $_SESSION['id_user'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> MOHON UNTUK MELAKUKAN LOGIN';
	header('Location: ./');
	die();
} else {
	include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kasir Steam Anugrah Permata</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/jquery-ui.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>


	<style type="text/css">
	body {
	  min-height: 200px;
	  padding-top: 70px;
	  
	}
   @media print {
	   .container {
		   margin-top: -30px;
	   }
	   #tombol,
      .noprint {
         display: none;
      }
   }
	</style>

  </head>

  <body>

    <?php include "menu.php"; ?>

    <div class="container">

	<?php
	if( isset($_REQUEST['hlm'] )){

		$hlm = $_REQUEST['hlm'];

		switch( $hlm ){
			case 'transaksi':
				include "transaksi.php";
				break;
			case 'laporan':
				include "laporan.php";
				break;
			case 'user':
				include "user.php";
				break;
			case 'biaya':
				include "biaya.php";
				break;
			case 'cetak':
				include "cetak_nota.php";
				break;
		}
	} else {
	?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2><marquee style="color:white;" bgcolor="#4169E1"><b>Selamat Datang Di Aplikasi Kasir Steam Anugrah Permata</b></marquee></h2>
		
        <p>Halo <strong><?php echo $_SESSION['nama']; ?></strong>, Anda login sebagai
			<strong>
			<?php
				if($_SESSION['level'] == 1){
					echo 'Admin.';
				} else {
						echo 'Petugas Kasir.';
				}
			?>
			</strong>
		</p>
      </div>
	  <?php 
	  $sql = mysqli_query($koneksi, "SELECT count(nama), sum(total) FROM transaksi");
	  list($nama, $total) = mysqli_fetch_array($sql);
	  echo '
	  <div class="col-sm-6">
	  <div class="panel"> 
	  <h4>Jumlah Pelanggan</h4>
	  <h4>
	  <span class="glyphicon glyphicon-user"></span>
	  <b>'.$nama.'</b> Pelanggan
	  </h4>
	  </div>
	  </div>
	  <div class="col-sm-6">
	  <div class="panel"> 
	  <h4>Jumlah Pendapatan</h4>
	  <h4>
	  <span class="glyphicon glyphicon-book"></span>
	  <b>RP. '.number_format($total).'</b>
	  </h4>
	  </div>
	  </div>
	  ' ?>
	<?php
	}
	?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>

  </body>

</html>
<?php
}
?>
