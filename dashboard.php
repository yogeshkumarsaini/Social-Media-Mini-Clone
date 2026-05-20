<?php
session_start();
include 'config/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg">

<div class="container">

<a class="navbar-brand" href="#">
Social Mini Clone
</a>

<div>

<a href="profile.php"
class="btn btn-light btn-sm">
Profile
</a>

<a href="auth/logout.php"
class="btn btn-danger btn-sm">
Logout
</a>

</div>

</div>

</nav>

<div class="container mt-4">

<div class="row">

<div class="col-md-4">

<div class="card shadow mb-3">

<div class="card-body">

<h4>
Welcome,
<?php echo $_SESSION['user_name']; ?>
</h4>

</div>
</div>

<div class="card shadow">

<div class="card-body">

<h5>People You May Know</h5>

<?php

$users = mysqli_query($conn,
"SELECT * FROM users
WHERE id!='".$user_id."'");

while($u = mysqli_fetch_assoc($users)){

?>

<div class="d-flex justify-content-between mb-2">

<div>
<?php echo $u['full_name']; ?>
</div>

<a href="friends/send_request.php?receiver_id=<?php echo $u['id']; ?>"
class="btn btn-primary btn-sm">
Add Friend
</a>

</div>

<?php } ?>

</div>
</div>

</div>

<div class="col-md-8">

<div class="card shadow mb-4">

<div class="card-body">

<form action="posts/create_post.php"
method="POST"
enctype="multipart/form-data">

<textarea
name="content"
class="form-control mb-3"
placeholder="What's on your mind?"
required></textarea>

<input type="file"
name="image"
class="form-control mb-3">

<button class="btn btn-primary"
name="post">
Create Post
</button>

</form>

</div>
</div>

<?php

$posts = mysqli_query($conn,
"SELECT posts.*, users.full_name
FROM posts
JOIN users ON posts.user_id=users.id
ORDER BY posts.id DESC");

while($post = mysqli_fetch_assoc($posts)){

$post_id = $post['id'];

$likes = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM likes WHERE post_id='$post_id'"));

?>

<div class="card shadow mb-4">

<div class="card-body">

<h5>
<?php echo $post['full_name']; ?>
</h5>

<p>
<?php echo $post['content']; ?>
</p>

<?php if($post['image']!=""){ ?>

<img src="uploads/<?php echo $post['image']; ?>"
class="post-img">

<?php } ?>

<div class="mt-3">

<a href="posts/like_post.php?post_id=<?php echo $post['id']; ?>"
class="btn btn-outline-danger btn-sm">
❤️ Like (<?php echo $likes; ?>)
</a>

<?php if($post['user_id']==$user_id){ ?>

<a href="posts/delete_post.php?post_id=<?php echo $post['id']; ?>"
class="btn btn-outline-dark btn-sm">
Delete
</a>

<?php } ?>

</div>

<form action="posts/comment_post.php"
method="POST"
class="mt-3">

<input type="hidden"
name="post_id"
value="<?php echo $post['id']; ?>">

<input type="text"
name="comment"
class="form-control mb-2"
placeholder="Write comment"
required>

<button class="btn btn-outline-primary btn-sm"
name="comment_btn">
Comment
</button>

</form>

<hr>

<?php

$comments = mysqli_query($conn,
"SELECT comments.*, users.full_name
FROM comments
JOIN users ON comments.user_id=users.id
WHERE comments.post_id='$post_id'
ORDER BY comments.id DESC");

while($comment = mysqli_fetch_assoc($comments)){

?>

<div class="mb-2">

<b>
<?php echo $comment['full_name']; ?>:
</b>

<?php echo $comment['comment']; ?>

</div>

<?php } ?>

</div>
</div>

<?php } ?>

</div>

</div>

</div>

</body>
</html>