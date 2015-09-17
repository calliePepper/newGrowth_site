<?php
// The hashed password from the form
include $_SERVER['DOCUMENT_ROOT'].'/scripts/dbConnector.php';
$password = $_POST['p']; 
$username = 'Fae';
$email = 'Fae';
// Create a random salt
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
// Create salted password (Careful not to over season)
$password = hash('sha512', $password.$random_salt);
echo $random_salt . "<br /><br />" .  $password;
 
// Add your insert to database script here. 
// Make sure you use prepared statements!
if ($insert_stmt = $db->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {    
   $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt); 
   // Execute the prepared query.
   $insert_stmt->execute();
} ?>