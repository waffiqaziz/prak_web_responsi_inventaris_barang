<?php  
  session_start();
  require 'functions.php';
  
  if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
  }

  if (isset($_POST["login"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($db, "SELECT * FROM petugas WHERE username = '$username'");

		// cek apakah ada username dalam database user/tidak
		if (mysqli_num_rows($result) === 1) { // mysqli_num_rows => mengambalikan nilai
    // echo $password;
    // echo $username;

			// cek password
      $row = mysqli_fetch_object($result);
      $password1 = $row -> password;
      $nama_lengkap = $row -> nama_lengkap;
      // echo  $password1;
			if ($password1 == $password) {

				// set session
        $_SESSION["login"] = true;
        $_SESSION["user"] = $nama_lengkap;

				header("Location: index.php");
				exit; // prosess akan berakhir
			}
    }
  }
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

  <!-- Page Content -->
  <div class="row">
    <div class="block-login container col-sm-4 offset-4">
      <div class="form-group form-group-sm col-sm-12">
        <h4 style="background-color: blue; color: white; " class="text-center">LOGIN</h4><br>
          <form action="" method="post" role="form">
            <!-- USERNAME & PASSWORD -->
            <section>
              <input type="text" name="username" class="form-control" placeholder="Username" required>
              <input style="margin-top: 10px;" type = "password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
            </section>

            <!-- SUBMIT -->
            <div class="submit text-center" style="margin-top: 10px;">
              <button type="submit" class="btn-work" style="width: 100px;" name="login">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
