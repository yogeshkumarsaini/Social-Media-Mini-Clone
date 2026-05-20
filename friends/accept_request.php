<?php
include '../config/db.php';

$request_id = $_GET['request_id'];

mysqli_query($conn,
"UPDATE friend_requests
SET status='accepted'
WHERE id='$request_id'");

header("Location: ../dashboard.php");
?>