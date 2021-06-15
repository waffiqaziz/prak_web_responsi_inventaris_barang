<!-- WAFFIQ AZIZ / 123190070 -->
<?php  
  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }
  // $nama_lengkap = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>INVENTARIS BARANG</title>
  <!-- STYLE -->
  <link href="vendor/style.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <!-- Header -->
  <div class="top-header cf">
    <header>
      <center>
        <h1>DAFTAR INVENTARIS BARANG</h1>
        <h1>KANTOR SERBA ADA</h1>
      </center>  
    </header>
  </div>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Beranda
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="daftar_inventaris.php">Daftar Inventaris
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							List per Karegori
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="showby.php?kategori=Bangunan">Bangunan</a>
							<a class="dropdown-item" href="showby.php?kategori=Kendaraan">Kendaraan</a>
							<a class="dropdown-item" href="showby.php?kategori=Alat Tulis Kantor">Alat Tulis Kantor</a>
							<a class="dropdown-item" href="showby.php?kategori=Elektronik">Elektronik </a>
						</div>
					</li>
        </ul>
        <button class="btn-work">
          <a href="logout.php" style="color: white;">Log Out</a>
        </button>
      </div>
    </div>
  </nav>

  <!-- Footer -->
  <footer>
    <center>
      Inventaris 2020
    </center>  
  </footer>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="welcome">
          <h2>Selamat Datang</h2>
          <h3><?= $_SESSION["user"]; ?></h3>
          <h1></h1>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
