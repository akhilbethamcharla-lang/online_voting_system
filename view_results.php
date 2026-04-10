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
<title>Voting Results</title>

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

.result-box{
background:#f9f9f9;
padding:15px;
margin:12px 0;
border-radius:10px;
border:1px solid #ccc;
font-size:18px;
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

<h2>Voting Results</h2>

<?php
$query = "SELECT candidate_id, COUNT(*) as total 
          FROM votes 
          GROUP BY candidate_id";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<div class='result-box'>";
        echo "Candidate: <b>".$row['candidate_id']."</b><br>";
        echo "Votes: ".$row['total'];
        echo "</div>";
    }
}
else
{
    echo "<div class='result-box'>No votes yet</div>";
}
?>

<a href="admin_dashboard.php">
<button>Back</button>
</a>

</div>

</body>
</html>