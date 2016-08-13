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
            <li class="active"><a href="#main-slider"><i class="icon-home"></i></a></li>
            <li><a href="#services">Registrasi Pasien</a></li>
            <li><a href="#portfolio">Tentang Klinik</a></li>
            <li><a href="#about-us">Jadwal Praktek</a></li>
            <li><a href="#contact">Kontak</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header><!--/#header-->

  <section id="main-slider" class="carousel">
    <div class="carousel-inner">
      <div class="item active">
        <div class="container">
          <div class="carousel-content">
            <h1>Fuyi Healthouse</h1>
            <p class="lead">CHIROPRACTIC & ACUPUNCTURE</p>
          </div>
        </div>
      </div><!--/.item-->
      <div class="item">
        <div class="container">
          <div class="carousel-content">
            <h1>ACUPUNCTURE</h1>
            <p class="lead">Acupuncture atau akupuntur adalah terapi dengan jarum</p>
          </div>
        </div>
      </div><!--/.item-->
    </div><!--/.carousel-inner-->
    <a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
    <a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
  </section><!--/#main-slider-->

  <section id="services">
    <div class="container">
      <div class="box first">
        <div class="center gap">
          <br>
          <br>
          <h2 style="margin-bottom:0px; display:block">Registrasi Pasien</h2>
          <h5 style="color:red">Isi nomor pasien jika anda sudah pernah berobat</h5>
          <div class="container center_div">
            <p class="lead">
              <b class="color: red">
                <?php
                if(isset($_GET['eror'])) {
                  if($_GET['eror'] == 1) {
                    echo 'Data Pasien Tidak Ditemukan';
                  }
                }
                  ?>
              </b>
              <form class="form-group" action="hasil.php" method="post">
                <input  type="text" name="noPasien" class="form-control" placeholder="Masukan Nomor Pasien">
                <br>
                <input type="submit" name="antri" class="btn btn-info" value="Ambil Antri">
              </form>
            </p>
          </div>
          <h5>Isi formulir dibawah jika anda belum pernah berobat</h5>
          <div class="container center_div">
            <p class="lead">
              <form class="form-group" action="hasil.php" method="post">
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                <br>
                <input type="email" name="email" class="form-control" placeholder="Masukan Email">
                <br>
                <input type="tel" name="telpon" class="form-control" placeholder="Masukan Telpon">
                <br>
                <textarea name="pesan" class="form-control" placeholder="Masukan Pesan"></textarea>
                <br>
                <b style="color: red"><?php if(isset($error)) { echo $error; } ?></b>
                <br>
                <input type="submit" name="regis" class="btn btn-success" value="Register">
              </form>
            </p>
          </div>
        </div><!--/.center-->
      </div><!--/.box-->
    </div><!--/.container-->
  </section><!--/#services-->

  <section id="portfolio">
    <div class="container">
      <div class="box">
        <div class="center gap">
          <h2>Klinik Fuyi Healthouse</h2>
          <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac<br>turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
        </div><!--/.center-->
      </div><!--/.box-->
    </div><!--/.container-->
  </section><!--/#portfolio-->

  <!-- <section id="pricing">
    <div class="container">
      <div class="box">
        <div class="center">
          <h2>See our Pricings</h2>
          <p class="lead">Pellentesque habitant morbi tristique senectus et netus et <br>malesuada fames ac turpis egestas.</p>
        </div>
        <div class="big-gap"></div>
        <div id="pricing-table" class="row">
          <div class="col-sm-4">
            <ul class="plan">
              <li class="plan-name">Basic</li>
              <li class="plan-price">$29</li>
              <li>5GB Storage</li>
              <li>1GB RAM</li>
              <li>400GB Bandwidth</li>
              <li>10 Email Address</li>
              <li>Forum Support</li>
              <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Signup</a></li>
            </ul>
          </div>
          <div class="col-sm-4">
            <ul class="plan featured">
              <li class="plan-name">Standard</li>
              <li class="plan-price">$49</li>
              <li>10GB Storage</li>
              <li>2GB RAM</li>
              <li>1TB Bandwidth</li>
              <li>100 Email Address</li>
              <li>Forum Support</li>
              <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Signup</a></li>
            </ul>
          </div><
          <div class="col-sm-4">
            <ul class="plan">
              <li class="plan-name">Advanced</li>
              <li class="plan-price">$199</li>
              <li>30GB Storage</li>
              <li>5GB RAM</li>
              <li>5TB Bandwidth</li>
              <li>1000 Email Address</li>
              <li>Forum Support</li>
              <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Signup</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#pricing-->

  <section id="about-us">
    <div class="container">
      <div class="box">
        <div class="center gap">
          <h2 style="margin-bottom:0px; display:block">Jadwal Praktek Dokter</h2>
          <!-- <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac<br>turpis egestas. Vestibulum tortor quam, feugiat vitae.</p> -->
        </div><!--/.center-->
        <ul class="portfolio-items col-4">
          <li class="portfolio-item joomla html">
            <div class="item-inner">
              <div class="portfolio-image">
                <img src="images/team1.jpg" alt="">
                <div class="overlay">
                  <a class="preview btn btn-danger" title="Lorem ipsum dolor sit amet" href="images/team1.jpg"><i class="icon-eye-open"></i></a>
                </div>
              </div>
              <h5>Dr. Darja</h5>
            </div>
          </li><!--/.portfolio-item-->

          <li class="portfolio-item wordpress html">
            <div class="item-inner">
              <div class="portfolio-image">
                <h3>Jadwal ajhsash</h3>
              </div>
              <h5>Senin p9a80989</h5>
              <h5>Senin p9a80989</h5>
              <h5>Senin p9a80989</h5>
            </div>
          </li><!--/.portfolio-item-->
        </ul>
      </div><!--/.box-->
    </div><!--/.container-->
  </section><!--/#about-us-->

  <section id="contact">
    <div class="container">
      <div class="box last">
            <h1>Alamat Kami</h1>
            <address>
              <strong>FUYI, Healthouse Chiropractic & Acupuncture</strong> Ruko Golden Road C 28 No.29 (Belakan ITC BSD)<br>
              <abbr title="Phone">P : </abbr>(021) 5315-3623 - (021) 5315-3765
            </address>
      </div><!--/.box-->
    </div><!--/.container-->
  </section><!--/#contact-->

  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          &copy; 2016 <a target="_blank" href="#" title="Aplikasi Pendaftaran dan rekam medis pasien Fuyi">Darja Dipura</a>. All Rights Reserved.
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div>
  </footer><!--/#footer-->

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
