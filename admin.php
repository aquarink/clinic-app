<?php

session_start();
if(isset($_SESSION['adm'])) {
  include_once 'koneksi.php';

  if(isset($_POST['cariId'])) {
    $noPasien = $_POST['noPasien'];
    //
    $dataPasen = mysql_query("SELECT * FROM pasien_tb WHERE id_pasien = '$noPasien'");
    $cekPasen = mysql_fetch_assoc($dataPasen);
  }

  //

  if(isset($_POST['diagnos'])) {
    $tensi = $_POST['tensi'];
    $diagnosa = $_POST['pesan'];
    $nopasien = $_POST['id'];
    $onlyTgl = date('Y-m-d');

    if(empty($tensi) || empty($diagnosa) || empty($nopasien)) {
      $error = 'Kolom Kosong harap isi';
    } else {
      $simpanMedik = mysql_query("INSERT INTO rekmedik_tb (id_pasien,tensi,diagnosa,sekarang,status) VALUES('$nopasien','$tensi','$diagnosa','$onlyTgl',1)");
      if($simpanMedik) {
        $urlLink = 'http://localhost/darja/admin.php?nppas='.$nopasien;
        header('location: '.$urlLink);
      } else {
        echo "asas";
      }
    }
  }

} else {
  header('location: login.php');
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
            <li><a href="#">Antrian & Rekam Medis</a></li>
            <li><a href="daftarpasien.php">List Pasien</a></li>
            <li><a href="logout.php">Logout</a></li>
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
          <br>
          <br>
          <div class="container center_div" style="width: 100%">
            <div class="col-md-4">
              <h2 style="margin-bottom:0px; display:block">Antrian Pasien</h2>
              <h5 style="color:blue">Isi nomor pasien untuk mencari data pasien</h5>
              <p class="lead">
                <form class="form-group" action="" method="post">
                  <input  type="text" name="noPasien" class="form-control" placeholder="Masukan Nomor Pasien">
                  <br>
                  <input type="submit" name="cariId" class="btn btn-warning" value="Cari Antrian">
                </form>
              </p>
              <hr>
              <h3>DATA PASIEN <?php if(isset($cekPasen)) { echo strtoupper($cekPasen['nama']); } ?></h3>
              <div class="container center_div" style="width: 100%">
                <p class="lead">
                  <form class="form-group" action="" method="post">
                    <input  type="text" name="tensi" class="form-control" placeholder="Masukan Nilai Tensi Darah">
                    <br>
                    <textarea name="pesan" class="form-control" placeholder="Masukan Diagnosa"></textarea>
                    <br>
                    <input type="hidden" name="id" value="<?php if(isset($cekPasen)) { echo $cekPasen['id_pasien']; } if(isset($_GET['nppas'])) { echo $_GET['nppas']; } ?>">
                    <input type="submit" name="diagnos" class="btn btn-success" value="Simpan Rekam Medis">
                  </form>
                </p>
              </div>
            </div>
            <div class="col-md-8">
              <h4 style="margin-bottom:0px; display:block">Rekam Medis
                <?php
                if(isset($_GET['nppas'])) {
                  $idPas = $_GET['nppas'];
                  $dataPasen = mysql_query("SELECT * FROM pasien_tb WHERE id_pasien = '$idPas'");
                  $Pasen = mysql_fetch_assoc($dataPasen);
                  echo strtoupper($Pasen['id_pasien'].' - '.$Pasen['nama']);
                }
                if(isset($cekPasen)) {
                  echo strtoupper($cekPasen['id_pasien'].' - '.$cekPasen['nama']);
                }
                ?>
              </h4>
              <p class="lead">
                <table class="table table-responsive">
                  <tr>
                    <th>Tanggal</th>
                    <th>Tensi</th>
                    <th>Diagnosa</th>
                  </tr>
                  <?php
                  if(isset($cekPasen)) {
                    $ids = $cekPasen['id_pasien'];
                    $dataDiagno = mysql_query("SELECT * FROM rekmedik_tb WHERE id_pasien = '$ids'");
                    while ($dataDiag = mysql_fetch_array($dataDiagno)) {
                      ?>
                      <tr>
                        <th><?php echo $dataDiag['sekarang']; ?></th>
                        <th><?php echo $dataDiag['tensi']; ?></th>
                        <th><?php echo $dataDiag['diagnosa']; ?></th>
                      </tr>
                      <?php
                    }
                  }

                  if(isset($_GET['nppas'])) {
                    $ids = $_GET['nppas'];
                    $dataDiagno = mysql_query("SELECT * FROM rekmedik_tb WHERE id_pasien = '$ids'");
                    while ($dataDiag = mysql_fetch_array($dataDiagno)) {
                      ?>
                      <tr>
                        <th><?php echo $dataDiag['sekarang']; ?></th>
                        <th><?php echo $dataDiag['tensi']; ?></th>
                        <th><?php echo $dataDiag['diagnosa']; ?></th>
                      </tr>
                      <?php
                    }
                  }
                  ?>
                </table>
              </p>
            </div>
          </div>
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
