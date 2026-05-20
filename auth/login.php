<?php
session_start();
include '../config/db.php';

$message = "";

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn,
    "SELECT * FROM users
    WHERE email='$email'
    AND password='$password'");

    if(mysqli_num_rows($query)>0){

        $user = mysqli_fetch_assoc($query);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['full_name'];

        header("Location: ../dashboard.php");

    }else{
        $message = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow">

<div class="card-body p-4">

<h2 class="text-center mb-4">Login</h2>

<?php if($message!=""){ ?>
<div class="alert alert-danger">
<?php echo $message; ?>
</div>
<?php } ?>

<form method="POST">

<input type="email"
name="email"
class="form-control mb-3"
placeholder="Email"
required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button class="btn btn-success w-100"
name="login">
Login
</button>

</form>

<div class="text-center mt-3">
<a href="register.php">
Create New Account
</a>
</div>

</div>
</div>

</div>
</div>
</div>

</body>
</html>