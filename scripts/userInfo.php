
<?php
include 'dbConnector.php';
// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-type: application/json');

// This ID parameter is sent by our javascript client.
$currentUserId= $_GET['userId'];

$projectquery = "SELECT id,user,email,fullName,userType,active FROM login WHERE id = '$currentUserId' LIMIT 1";
$projectquerymt=$mysqli->prepare($projectquery);
$projectquerymt->execute(); 
$projectquerymt->bind_result($userId,$username,$email,$fullName, $userType,$active);
$projectquerymt->store_result(); 

while ($projectquerymt->fetch()) {
	$data["userId"] = $userId;
	$data["username"] = $username;
	$data["email"] = $email;
	$data["fullName"] = $fullName;
	$data["userType"] = $userType;
	$data["active"] = $active;	
}

// Here's some data that we want to send via JSON.
// We'll include the $id parameter so that we
// can show that it has been passed in correctly.
// You can send whatever data you like.

// Send the data.
echo json_encode($data);
?>
