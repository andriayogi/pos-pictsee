<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari Aplikasi'); window.location = 'index.php'</script>";
?>