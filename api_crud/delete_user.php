<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require('connection.php');

$response = array();

if(isset($_POST['id']) ) {
    
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $sql = mysqli_query($con, "DELETE FROM `user`WHERE `uid`='$id'");

    if($sql) {
        $response['success'] = "true";
    } else {
        $response['success'] = "false";
        $response['error'] = mysqli_error($con);
    }
} else {
    $response['success'] = "false";
    $response['error'] = "Invalid input";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
