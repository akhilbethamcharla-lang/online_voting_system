<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("config.php");

if(!isset($_SESSION['voter_id']) || $_SESSION['role'] != 'voter'){
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM candidates";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Vote</title>
<style>
body{
    font-family: Arial;
    background: linear-gradient(to right, #43cea2, #185a9d);
    text-align:center;
    padding-top:40px;
}

.container{
    background:white;
    width:450px;
    margin:auto;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}

.card{
    border:1px solid #ddd;
    padding:15px;
    margin:10px;
    border-radius:8px;
}

button{
    padding:8px 15px;
    background:#007BFF;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#0056b3;
}

.logout{
    background:red;
    margin-bottom:15px;
}

.logout:hover{
    background:darkred;
}
</style>
</head>
<body>

<div class="container">
<h2>🗳 Vote for Candidate</h2>

<a href="logout.php">
<button class="logout">Logout</button>
</a>

<?php
while($row = mysqli_fetch_assoc($result)){
?>
<div class="card">
<b><?php echo $row['name']; ?></b><br>
Party: <?php echo $row['party']; ?><br><br>

<form action="vote.php" method="POST">
<input type="hidden" name="candidate_id" value="<?php echo $row['candidate_id']; ?>">
<button type="submit">Vote</button>
</form>
</div>

<?php } ?>

</div>

</body>
</html>