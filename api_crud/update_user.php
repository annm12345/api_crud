<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require('connection.php');

$response = array();

if(isset($_POST['uid']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $uid = mysqli_real_escape_string($con, $_POST['uid']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = mysqli_query($con, "UPDATE `user` SET `name`='$name',`email`='$email',`password`='$password' WHERE `uid`='$uid'");

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
