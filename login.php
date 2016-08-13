<?php

session_start();

if(isset($_SESSION['adm'])) {
  header('location: admin.php');
} else {
  if(isset($_POST['masuk'])) {
    $pass = $_POST['pass'];

    if(empty($_POST['pass'])) {
      $error = 'Kolom Tidak boleh kosong';
    } else {
      if($pass == 'admin') {
        $_SESSION['adm'] = '1234567890';
        header('location: admin.php');
      } else {
        $error = 'Password Salah';
      }
    }
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
  <title>Login Fuyi | Healthouse Chiropractic & Acupuncture</title>
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
  <section id="services">
    <div class="container">
      <div class="box first">
        <div class="center gap">
          <br>
          <br>
          <h2 style="margin-bottom:0px; display:block">Masukan Password Admin Anda</h2>
          <div class="container center_div">
            <p class="lead">
              <form class="form-group" action="" method="post">
                <input  type="password" name="pass" class="form-control" placeholder="Masukan Password Admin">
                <br>
                <b style="color: red"><?php if(isset($error)) { echo $error; } ?></b> 
                <br>
                <input type="submit" name="masuk" class="btn btn-success" value="Login">
              </form>
            </p>
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
