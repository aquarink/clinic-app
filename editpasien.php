<?php

session_start();
if(isset($_SESSION['adm'])) {
  include_once 'koneksi.php';
  if(isset($_GET['id'])) {
    $idp = $_GET['id'];
    $dataId = mysql_query('SELECT * FROM pasien_tb WHERE id_pasien ='.$idp);
    $cekId = mysql_num_rows($dataId);
    if($cekId > 0) {
      $dataPasien = mysql_fetch_assoc($dataId);

      if(isset($_POST['updatepasien'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telpon = $_POST['telpon'];
        $alamat = $_POST['alamat'];

        if(empty($nama) || empty($email) || empty($telpon) || empty($alamat)) {
          $error = 'Kolom Kosong harap isi';
        } else {
          $updateDataPasien = mysql_query("UPDATE pasien_tb SET nama = '$nama', alamat = '$alamat', email = '$email', telepon = '$telpon' WHERE id_pasien = '$idp'");

          if($updateDataPasien) {
            header('location: daftarpasien.php?pesan=BerhasilUbahDataPasien');
          } else {
            header('location: daftarpasien.php?pesan=GagalUbahDataPasien');
          }
        }
      }
    } else {
      header('location: daftarpasien.php');
    }
  } else {
    header('location: daftarpasien.php');
  }
} else {
  header('location: daftarpasien.php');
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
          <br>
          <br>
          <div class="container center_div">
            <h2 style="margin-bottom:0px; display:block">Edit Data Pasien</h2>
            <div class="container center_div" style="width: 100%">
              <p class="lead">
                <form class="form-group" action="" method="post">
                  <input  type="text" name="nama" class="form-control" value="<?php echo $dataPasien['nama']; ?>">
                  <br>
                  <input  type="text" name="email" class="form-control" value="<?php echo $dataPasien['email']; ?>">
                  <br>
                  <input  type="text" name="telpon" class="form-control" value="<?php echo $dataPasien['telepon']; ?>">
                  <br>
                  <textarea name="alamat" class="form-control"><?php echo $dataPasien['alamat']; ?></textarea>
                  <br>
                  <input type="hidden" name="id" value="<?php echo $dataPasien['id_pasien']; ?>">
                  <input type="submit" name="updatepasien" class="btn btn-success" value="Update Data Pasien">
                </form>
              </p>
            </div>
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
