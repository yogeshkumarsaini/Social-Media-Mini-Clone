<?php
session_start();
include '../config/db.php';

$post_id = $_GET['post_id'];

mysqli_query($conn,
"DELETE FROM posts
WHERE id='$post_id'
AND user_id='".$_SESSION['user_id']."'");

header("Location: ../dashboard.php");
?>