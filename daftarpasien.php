<?php
error_reporting(0);
session_start();
if(isset($_SESSION['adm'])) {
  include_once 'koneksi.php';

  if(isset($_GET['hapus'])) {
    if(empty($_GET['hapus'])) {
      echo "ID KOSONG";
    } else {
      $idnya = $_GET['haspus'];
      $dataCek = mysql_query('SELECT * FROM pasien_tb WHERE id_pasien = $idnya');
      $cek = mysql_num_rows($dataCek);
      if($cek > 0) {
        $delData = mysql_query('DELETE FROM pasien_tb WHERE id_pasien = $idnya');
        if($delData) {
          header('location: daftarpasien.php');
        } else {
          echo "Error";
        }
      } else {
        header('location: daftarpasien.php?error=PasienTidakAda');
      }
    }
  }
} else {
  header('location: admin.php');
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
            <li><a href="admin.php">Antrian & Rekam Medis</a></li>
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
          <h2 style="margin-bottom:0px; display:block">List Pasien</h2>
        </div>
        <table class="table">
          <tr>
            <th>NO</th>
            <th>ID PASIEN</th>
            <th>NAMA</th>
            <th>TELEPON</th>
            <th>ALAMAT</th>
            <th class="text-center">Action</th>
          </tr>
          <?php
          $dataPasien = mysql_query('SELECT * FROM pasien_tb');
          $no = 1;
          while ($pasien = mysql_fetch_array($dataPasien)) {
          ?>
          <tr>
            <td style="font-align: left"><?php echo $no; ?></td>
            <td style="font-align: left"><?php echo $pasien['id_pasien']; ?></td>
            <td style="font-align: left"><?php echo $pasien['nama']; ?></td>
            <td style="font-align: left"><?php echo $pasien['telepon']; ?></td>
            <td style="font-align: left"><?php echo $pasien['alamat']; ?></td>
            <td class="text-center">
              <a href="editpasien.php?id=<?php echo $pasien['id_pasien']; ?>" class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a>
              <a href="daftarpasien.php?hapus=<?php echo $pasien['id_pasien']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
            </td>
          </tr>
          <?php $no++; } ?>
        </table>
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
