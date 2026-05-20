<?php
session_start();
include '../config/db.php';

if(isset($_POST['post'])){

    $user_id = $_SESSION['user_id'];
    $content = mysqli_real_escape_string($conn,$_POST['content']);

    $image = "";

    if($_FILES['image']['name']!=""){

        $image = time().$_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../uploads/".$image
        );
    }

    mysqli_query($conn,
    "INSERT INTO posts(user_id,content,image)
    VALUES('$user_id','$content','$image')");

    header("Location: ../dashboard.php");
}
?>