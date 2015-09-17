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
  if (isset($_GET['pageSet'])) {
     $currentPage = $_GET['pageSet'];
     $offset = $currentPage * 4;
     $toEnd = $offset + 4;
     $finished = 0;
     $sql='SELECT * FROM projects WHERE enabled = "1" ORDER BY creationTimestamp DESC LIMIT '.$offset.','.$toEnd;
      
     /* Prepare statement */
     $stmt = $db->prepare($sql);
     if($stmt === false) {
       trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->error, E_USER_ERROR);
     }
       
     /* Execute statement */
     $stmt->execute();

     $message = '';
     $status = 'Success';
     $totalNumber = 0;
     $stmt->bind_result($id, $shortName, $fullName, $tags, $content, $description, $creationUser, $timeStamp, $editUser, $editTimeStamp, $thumbnail, $enabled);
     while ($stmt->fetch()) {
      $message = $message . "<article>";
         if ($admin==1 && $clientView != 1) {
          $message = $message . "<div class='contentEdit'>
             <a href='/editProject.php?action=edit&id=".$id."'><img src='/img/editBtn.png' alt='edit button' /></a>
             <a href='/deleteProject.php?id=".$id."'><img src='/img/deleteBtn.png' alt='edit button' /></a>
           </div>";
          }
          $message = $message . "<div class='date'>
                               " . date('j',$timeStamp) . "<span class='showMobile'><br /></span><span class='hideMobile'>.</span>". date('n',$timeStamp) . "<span class='showMobile'><br /></span><span class='hideMobile'>.</span>" . date('Y',$timeStamp) . "
                           </div>
          <div class='details'>
                               <h2>".$fullName."</h2>
                               <div class='articleTags'>";

                                $test = explode(',',$tags);
                                $first = 1;
                                foreach ($test as $value) {
                                  if ($first != 1) {
                                    $message = $message . ', ';
                                  } else {
                                    $first = 0;
                                  }
                                  $message = $message . '#' . $value; 
                                }
                      
                            $message = $message . "</div>                                 
                               <div class='muted'>".$creationUser."</div>
              <div class='articleContent'>
                  <img src='".$thumbnail."'' alt='".$fullName."' class='projectThumb' />".$description."</p>
                  <a href='/article/".$shortName."' class='moreLink'>&lt;More&gt;</a>
              </div>
          </div>
      </article>";

       }
  
     if ($totalNumber < 4) {
      $finished = 1;
     }
   } else {
      $status = 'failed';
      $message = 'Failure';
   }

    $data = array(  
        'status' => $status,  
        'message' => $message,
        'finished' => $finished
    );  
  
    echo json_encode($data);  
  
    exit;  
?>