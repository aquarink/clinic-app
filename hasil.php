<?php
include_once 'koneksi.php';
error_reporting(0);
// Logika
if(isset($_POST['regis'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $telpon = $_POST['telpon'];
  $alamat = $_POST['alamat'];

  if(empty($nama) || empty($email) || empty($telpon) || empty($alamat)) {
    $error = 'Kolom Kosong harap isi';
  } else {
    $dataPasien = mysql_query("SELECT * FROM pasien_tb WHERE email = '$email'");
    $cekPasien = mysql_num_rows($dataPasien);

    if($cekPasien > 0) {
      // Artinnya ada
      $error = 'Anda Sudah Terdaftar';
    } else {
      $tgl = date('Y-m-d h:i:s');
      $onlyTgl = date('Y-m-d');
      $simpanDataPasien = mysql_query("INSERT INTO pasien_tb (nama,alamat,email,telepon,status,sekarang) VALUES('$nama','$alamat','$email','$telpon',1,'$tgl')");
      if($simpanDataPasien) {
        $dataPasen = mysql_query("SELECT * FROM pasien_tb ORDER BY id_pasien DESC LIMIT 1");
        $cekPasen = mysql_fetch_assoc($dataPasen);
        $noPasien = $cekPasen['id_pasien'];
        //
        $dataAntri = mysql_query("SELECT * FROM antrian_tb WHERE tanggal = '$onlyTgl' ORDER BY id_antri DESC LIMIT 1");
        $cekAntri = mysql_fetch_assoc($dataAntri);
        $noAntri = $cekAntri['no_antri']+1;
        $simpanDataAntri = mysql_query("INSERT INTO antrian_tb (no_antri,tanggal) VALUES('$noAntri','$onlyTgl')");
        if($simpanDataAntri) {
          $urlLink = 'hasil.php?nama='.$nama.'&alamat='.$alamat.'&email='.$email.'&telp='.$telpon.'&nppas='.$noPasien.'&noantri='.$noAntri.'';
          header('location: '.$urlLink);
        } else {
          $error = 'Query Error';
        }
      } else {
        echo $error = 'Query Errors';
      }
    }
  }
}

if(isset($_POST['antri'])) {
  $onlyTgl = date('Y-m-d');
  $noPasien = $_POST['noPasien'];
  $dataPasen = mysql_query("SELECT * FROM pasien_tb WHERE id_pasien = '$noPasien'");
  $cekUser = mysql_num_rows($dataPasen);
  if($cekUser > 0) {
    $cekPasen = mysql_fetch_assoc($dataPasen);
    $noPasien = $cekPasen['id_pasien'];
    $nama = $cekPasen['nama'];
    $email = $cekPasen['email'];
    $telpom = $cekPasen['telepon'];
    //
    $dataAntri = mysql_query("SELECT * FROM antrian_tb WHERE tanggal = '$onlyTgl' ORDER BY id_antri DESC LIMIT 1");
    $cekAntri = mysql_fetch_assoc($dataAntri);
    $noAntri = $cekAntri['no_antri']+1;
    $simpanDataAntri = mysql_query("INSERT INTO antrian_tb (no_antri,tanggal) VALUES('$noAntri','$onlyTgl')");
    if($simpanDataAntri) {
      $urlLink = 'hasil.php?nama='.$nama.'&alamat='.$alamat.'&email='.$email.'&telp='.$telpon.'&nppas='.$noPasien.'&noantri='.$noAntri.'';
      header('location: '.$urlLink);
    } else {
      $error = 'Query Error';
    }
  } else {
    header('location: index.php?eror=1');
  }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Fuyi | Healthouse Chiropractic & Acupuncture</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

  <style media="screen">
  .center_div{
    margin: 0 auto;
    width:80% /* value of your choice which suits your alignment */
  }
  </style>
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
  <header id="header" role="banner">
    <div class="container">
      <div id="navbar" class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a class="active"  href="index.php">Beranda</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header><!--/#header-->

  <section id="services">
    <div class="container">
      <div class="box first">
        <div class="center gap">
          <br>
          <br>
          <h2 style="margin-bottom:0px; display:block">Pendaftaran Pasien Berhasil</h2>
          <h3>Nama Pasien : <?php if(isset($_GET['nama'])) { echo strtoupper($_GET['nama']); } ?></h3>
          <h3>Email Pasien : <?php if(isset($_GET['email'])) { echo strtoupper($_GET['email']); } ?></h3>
          <h3>Email Pasien : <?php if(isset($_GET['email'])) { echo strtoupper($_GET['alamat']); } ?></h3>
          <h3>Nomor Telepon : <?php if(isset($_GET['telp'])) { echo $_GET['telp']; } ?></h3>
          <h3>Nomor Paseien : <?php if(isset($_GET['nppas'])) { echo strtoupper($_GET['nppas']); } ?></h3>
          <h3 style="color:red">Nomor Antrean : <?php if(isset($_GET['noantri'])) { echo strtoupper($_GET['noantri']); } ?></h3>
        </div><!--/.center-->
      </div><!--/.box-->
    </div><!--/.container-->
  </section><!--/#services-->

  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          &copy; 2016 <a target="_blank" href="#" title="Aplikasi Pendaftaran dan rekam medis pasien Fuyi">Darja Dipura</a>. All Rights Reserved.
        </div>
      </div>
    </div>
  </footer><!--/#footer-->

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
</body>
</html>
