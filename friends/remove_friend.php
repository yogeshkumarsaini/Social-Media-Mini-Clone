<?php
include '../config/db.php';

$request_id = $_GET['request_id'];

mysqli_query($conn,
"DELETE FROM friend_requests
WHERE id='$request_id'");

header("Location: ../dashboard.php");
?>