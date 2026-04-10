<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
header("Location: login.php");
exit();
}

include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Voters</title>

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
width:500px;
text-align:center;
}

.voter-box{
background:#f9f9f9;
padding:12px;
margin:10px 0;
border-radius:8px;
border:1px solid #ccc;
}

button{
margin-top:20px;
padding:12px 25px;
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

<h2>Voters List</h2>

<?php
$query = "SELECT * FROM voters";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<div class='voter-box'>";
        echo "Voter ID: ".$row['voter_id']."<br>";
        echo "Name: ".$row['name'];
        echo "</div>";
    }
}
else
{
    echo "<div class='voter-box'>No voters found</div>";
}
?>

<a href="admin_dashboard.php">
<button>Back</button>
</a>

</div>

</body>
</html>