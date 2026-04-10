<?php
session_start();

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == "admin@gmail.com" && $password == "admin123")
    {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit();
    }
    else
    {
        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body{
font-family: Arial;
background: linear-gradient(to right,#5aa6d1,#5ed0c8);
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.container{
background:#eee;
padding:40px;
border-radius:15px;
width:300px;
text-align:center;
}

input{
width:100%;
padding:10px;
margin:10px 0;
border-radius:6px;
border:1px solid #ccc;
}

button{
width:100%;
padding:12px;
border:none;
border-radius:8px;
background: linear-gradient(45deg,#3b00ff,#6a00ff);
color:white;
cursor:pointer;
}
</style>
</head>

<body>
<div class="container">
<h2>Admin Login</h2>

<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
<input type="text" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="login">Login</button>
</form>

</div>
</body>
</html>