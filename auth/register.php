<?php
include '../config/db.php';

$message = "";

if(isset($_POST['register'])){

    $name = mysqli_real_escape_string($conn,$_POST['full_name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);

    $check = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check)>0){

        $message = "Email Already Exists";

    }else{

        mysqli_query($conn,
        "INSERT INTO users(full_name,email,password)
        VALUES('$name','$email','$password')");

        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow">

<div class="card-body p-4">

<h2 class="text-center mb-4">Register</h2>

<?php if($message!=""){ ?>
<div class="alert alert-danger">
<?php echo $message; ?>
</div>
<?php } ?>

<form method="POST">

<input type="text"
name="full_name"
class="form-control mb-3"
placeholder="Full Name"
required>

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

<button class="btn btn-primary w-100"
name="register">
Create Account
</button>

</form>

<div class="text-center mt-3">
<a href="login.php">
Already have account?
</a>
</div>

</div>
</div>

</div>
</div>
</div>

</body>
</html>