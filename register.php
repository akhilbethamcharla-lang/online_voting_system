<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("config.php");

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = "SELECT * FROM voters WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0){
        $error = "Email already registered!";
    } else {
        $query = "INSERT INTO voters (name, email, password, role) 
                  VALUES ('$name', '$email', '$password', 'voter')";

        if(mysqli_query($conn, $query)){
            header("Location: login.php");
            exit();
        } else {
            $error = "Registration failed";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<style>
body{
    font-family: Arial;
    background: linear-gradient(to right, #00c6ff, #0072ff);
    text-align:center;
    margin-top:80px;
}

.container{
    background:white;
    width:350px;
    margin:auto;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}

input{
    width:90%;
    padding:10px;
    margin:10px;
    border-radius:5px;
    border:1px solid #ccc;
}

button{
    width:95%;
    padding:12px;
    background:#28a745;
    color:white;
    border:none;
    border-radius:5px;
    font-weight:bold;
}

.error{
    color:red;
    font-size:14px;
}
</style>
</head>
<body>

<div class="container">
<h2>📝 Register</h2>

<?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

<form method="POST">
<input type="text" name="name" placeholder="Enter Name" required><br>
<input type="text" name="email" placeholder="Enter Email" required><br>
<input type="password" name="password" placeholder="Enter Password" required><br>
<button type="submit" name="register">Register</button>
</form>

</div>

</body>
</html>