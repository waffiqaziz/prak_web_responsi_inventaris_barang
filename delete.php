<?php  
  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }


  // echo "halaman delete";
  require 'functions.php';
  $id = $_GET["id"];
    
  if(hapus($id) < 0){
    echo "
          <script>
            alert('Hapus Gagal!!!');
            document.location.href = 'daftar_inventaris.php';
          </script>
        ";
        echo mysqli_error($db);
  }else{
    echo "
      <script>
        alert('Hapus Berhasil!!!');
        document.location.href = 'daftar_inventaris.php';
      </script>
    ";
  }
?>