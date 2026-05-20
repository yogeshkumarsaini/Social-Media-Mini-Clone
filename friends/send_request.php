<?php
session_start();
include '../config/db.php';

$sender = $_SESSION['user_id'];
$receiver = $_GET['receiver_id'];

$check = mysqli_query($conn,
"SELECT * FROM friend_requests
WHERE sender_id='$sender'
AND receiver_id='$receiver'");

if(mysqli_num_rows($check)==0){

    mysqli_query($conn,
    "INSERT INTO friend_requests(sender_id,receiver_id)
    VALUES('$sender','$receiver')");
}

header("Location: ../dashboard.php");
?>