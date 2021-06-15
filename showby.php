<?php  
  session_start();
  require 'functions.php';
  
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

  $kategori = $_GET["kategori"];
  // echo $kategori;
  $dt = read("SELECT * FROM inventaris WHERE kategori = '$kategori'");
  
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
        <ul class="navbar-nav mr-auto" class="color-me">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="daftar_inventaris.php">Daftar Inventaris
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown active">
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
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-12">
        <button class="btn-work" style="margin-top: 10px;">
          <a href="input.php" style="color: white; text-decoration: none; font-weight: bold;">+ Tambah</a>
        </button>
      </div>
      <div class="col-lg-12">
        <center>
          <h2>Inventaris Kategori <?= $kategori; ?></h2>
        </center>
      </div>
      <div class = "offset-1 col-lg-11 text-center" style="margin-top: 10px;">
        <table cellpadding="10" cellspacing="0" border="1" class="table text-center table-striped">
          <thead style="background-color: blue; color: white;">
            <tr>
              <th class="align-middle">NO</th>
              <th class="align-middle">Kode</th>
              <th class="align-middle">Nama Barang</th>
              <th class="align-middle">Jumlah Satuan</th>
              <th class="align-middle">Satuan</th>
              <th class="align-middle">Tanggal Datang</th>
              <th class="align-middle">Kategori</th>
              <th class="align-middle">Status</th>
              <th class="align-middle">Harga Satuan</th>
              <th class="align-middle">Total Harga</th>
              <th class="align-middle">Aksi</th>
            </tr>
          </thead>

          <!-- Output Data -->
          <?php $i = 1;?>
          <tbody>
            <?php $harga;$jumlah;$total;$totalinventaris = 0;   
              function rupiah($harga){
                $hasil_rupiah = "Rp. ".number_format($harga,2,',','.');
                return $hasil_rupiah;
              }
            ?>
            <?php foreach ($dt as $data) : ?>
              <tr>
                <?php
                  $harga = $data -> harga;
                  $jumlah = $data -> jumlah;
                  $total = $harga*$jumlah;
                  $newDate = date("d-m-Y", strtotime($data -> tgl_datang));
                ?>
                <td class="align-middle"> <?= $i++; 										?> </td>
                <td class="align-middle">	<?= $data -> kode_barang;			?> </td>
                <td class="align-middle"> <?= $data -> nama_barang; 		?> </td>
                <td class="align-middle"> <?= $data -> jumlah;				 	?> </td>
                <td class="align-middle"> <?= $data -> satuan; 				  ?> </td>
                <td class="align-middle"> <?= $newDate;            			?> </td>
                <td class="align-middle"> <?= $data -> kategori; 				?> </td>
                <td class="align-middle"> <?= $data -> status_barang; 	?> </td>
                <td class="align-middle"> <?= rupiah($harga);	          ?> </td>
                <td class="align-middle"> <?= rupiah($total);           ?> </td>
                <?php $totalinventaris += $total ?>
                <!-- OPSI HAPUS -->
                <td width="110px" class="align-middle">
                  <form action="confirm.php" method="post">
                    <input type="hidden" name="id" value="<?= $data -> kode_barang; ?>">
                    <button class="btn-work" style="width: 100px; margin : 2px; color: white;font-weight: bold;" type="submit" >Delete</button>
                  </form>

                  <form action="update.php" method="post">
                    <input type="hidden" name="id" value="<?= $data -> kode_barang; ?>">
                    <button class="btn-work" style="width: 100px; margin : 2px ;color: white;font-weight: bold;" type="submit">Edit</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
            <tr> 
              <td colspan='9' style="font-weight: bold;">
                Total Inventaris Kategori <?= $kategori; ?>
              </td>
              <td style="font-weight: bold;"><?= rupiah($totalinventaris)  ?></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
