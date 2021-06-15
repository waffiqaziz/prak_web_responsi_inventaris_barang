<?php  
  // end session
  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

  session_destroy();

  echo "<script>
        alert('Log Out Berhasil!!');
        document.location.href = 'login.php';
       </script>
      ";
  exit;
?>