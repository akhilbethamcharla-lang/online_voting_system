<?php
session_start();

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

include("config.php");

$query = "SELECT c.name, c.party, COUNT(v.candidate_id) as total_votes 
FROM votes v
JOIN candidates c ON v.candidate_id = c.candidate_id
GROUP BY v.candidate_id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Results</title>
<style>
body{
    font-family: Arial;
    background: linear-gradient(to right, #11998e, #38ef7d);
    text-align:center;
    padding-top:50px;
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

a{
    display:inline-block;
    margin-top:15px;
    padding:10px 15px;
    background:#007BFF;
    color:white;
    text-decoration:none;
    border-radius:5px;
}
</style>
</head>
<body>

<div class="container">
<h2>📊 Voting Results</h2>

<?php
while($row = mysqli_fetch_assoc($result)){
?>
<div class="card">
<b><?php echo $row['name']; ?></b><br>
Party: <?php echo $row['party']; ?><br>
Votes: <b><?php echo $row['total_votes']; ?></b>
</div>
<?php } ?>

<a href="admin_dashboard.php">Back</a>

</div>

</body>
</html>