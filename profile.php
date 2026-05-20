<?php
session_start();
include 'config/db.php';

$user_id = $_SESSION['user_id'];

$user = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM users WHERE id='$user_id'"));
?>

<!DOCTYPE html>
<html>
<head>

<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-body text-center">

<img src="uploads/<?php echo $user['profile_pic']; ?>"
class="profile-img mb-3">

<h3>
<?php echo $user['full_name']; ?>
</h3>

<p>
<?php echo $user['email']; ?>
</p>

<a href="dashboard.php"
class="btn btn-primary">
Back
</a>

</div>
</div>

</div>

</body>
</html>