<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require('connection.php');

$response = array();

$res=mysqli_query($con,"SELECT * FROM `user` ORDER BY `uid` ASC");
while($row=mysqli_fetch_assoc($res)){
    $response[]=$row;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
