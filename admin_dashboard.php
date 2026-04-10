<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
header("Location: login.php");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>
body{
font-family: Arial, sans-serif;
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
text-align:center;
width:350px;
}

button{
width:100%;
padding:12px;
margin:10px 0;
border:none;
border-radius:8px;
background: linear-gradient(45deg,#3b00ff,#6a00ff);
color:white;
font-size:16px;
cursor:pointer;
}

.logout{
background: linear-gradient(45deg,#ff2e2e,#ff0000);
}
</style>
</head>

<body>

<div class="container">
<h2>Admin Dashboard</h2>

<a href="view_results.php">
<button>View Results</button>
</a>

<a href="view_voters.php">
<button>View Voters</button>
</a>

<a href="view_votes.php">
<button>View Votes</button>
</a>

<a href="logout.php">
<button class="logout">Logout</button>
</a>

</div>

</body>
</html>