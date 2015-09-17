<?php
$db = new mysqli('localhost', 'web06679_cmsLog', 'f$sd.Hf3122Zc', 'web06679_cms');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
?>