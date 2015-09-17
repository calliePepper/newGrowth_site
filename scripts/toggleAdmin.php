<?php 
include 'dbConnector.php';
include 'functions.php';
sec_session_start();
// Unset all session values
  if ($_SESSION['admin'] == 1) {
    $_SESSION['admin'] = 0;
  } else {
    $_SESSION['admin'] = 1;
  }
  ?>
  <script>history.back(-1)</script>