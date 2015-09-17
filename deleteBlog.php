<?php

  // The hashed password from the form
  require $_SERVER['DOCUMENT_ROOT'].'/scripts/dbConnector.php';
  include $_SERVER['DOCUMENT_ROOT'].'/scripts/functions.php';
  sec_session_start();  
  $admin = 0;
  if(login_check($db) == true) {
      $admin = 1;
      if ($_SESSION['admin'] == 1) {
        $clientView = 0;
      } else {
        $clientView = 1;
      }
  }  
  if (isset($_GET['id']) && $_POST['type'] == 'booper') {
      $sql = 'UPDATE articles SET enabled = ? WHERE id = ?';
      $stmt = $db->prepare($sql);
      $enableTime = 0;
      $updateId = $_GET['id'];
      $stmt->bind_param('ii', $enableTime, $updateId);
      $stmt->execute();    
      $status = 'Success';
      $message = 'yay';
   } else {
      $status = 'failed';
      $message = 'Failure';
   }

    $data = array(  
        'status' => $status,  
        'message' => $message,
        'finished' => $finished,
        'admin' => $admin,
        'clientView' => $clientView
    );  
  
    echo json_encode($data);  
  
    exit;  
?>