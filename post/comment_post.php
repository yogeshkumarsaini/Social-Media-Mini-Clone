<?php
session_start();
include '../config/db.php';

if(isset($_POST['comment_btn'])){

    $post_id = $_POST['post_id'];
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);
    $user_id = $_SESSION['user_id'];

    mysqli_query($conn,
    "INSERT INTO comments(post_id,user_id,comment)
    VALUES('$post_id','$user_id','$comment')");

    header("Location: ../dashboard.php");
}
?>