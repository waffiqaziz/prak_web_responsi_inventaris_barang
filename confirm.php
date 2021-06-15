<?php  
  session_start();
  require 'functions.php';
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

  $id = $_POST["id"];
  $dt = read("SELECT * FROM inventaris where kode_barang = '$id'")[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CONFIRM DELETE</title>
  <!-- STYLE -->
  <link href="vendor/style.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <div class="row">
    <div class="blok col-sm-4 offset-4 text-center" style="vertical-align: middle;">
      <div class="form-group form-group-sm col-sm-12">
        <h4 style="background-color: blue; color: white;" class="text-center">Hapus Data Inventaris</h4><br>
        <p>Yakin Akan Menghapus <span style="color: blue;"><?= $dt -> nama_barang; ?> </span>?</p>
        <button class="btn-work" style="width: 100px; margin : 2px; color: white;font-weight: bold;" id="yes">Yes</button>
        <button class="btn-work" style="width: 100px; margin : 2px ;color: white;font-weight: bold;" id="no">No
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript">
    var string = "<?= $id; ?>";
		document.getElementById('yes').onclick = function() {
      window.location.href = "delete.php?id=" + string;
    }
  </script>
  <script type="text/javascript">
		document.getElementById('no').onclick = function() {
			document.location.href = 'daftar_inventaris.php';
    };
  </script>
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
