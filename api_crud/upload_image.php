<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require('connection.php');

$response = array();

if(isset($_POST['name']) && isset($_POST['caption']) && isset($_POST['data'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $caption = mysqli_real_escape_string($con, $_POST['caption']);
    $data = mysqli_real_escape_string($con, $_POST['data']);

    $path="image/$name";

    $sql = mysqli_query($con, "INSERT INTO `image`(`caption`, `imgdata`) VALUES ('$caption','$path')");
    file_put_contents($path,base64_decode($data));

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
