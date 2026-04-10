<?php
session_start();
include("config.php");

$voter_id = $_SESSION['voter_id'];

if(isset($_POST['candidate_id'])){
    $candidate_id = $_POST['candidate_id'];

    $check = "SELECT * FROM votes WHERE voter_id='$voter_id'";
    $check_result = mysqli_query($conn, $check);

    if(mysqli_num_rows($check_result) > 0){
        $message = "You already voted!";
    } else {
        $query = "INSERT INTO votes (voter_id, candidate_id) VALUES ('$voter_id', '$candidate_id')";
        mysqli_query($conn, $query);
        $message = "Vote Submitted Successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Vote Status</title>

<!-- Redirect to home page -->
<meta http-equiv="refresh" content="2;url=index.php">

<style>
body{
    font-family: Arial;
    background: linear-gradient(to right, #56ccf2, #2f80ed);
    text-align:center;
    padding-top:120px;
}

.container{
    background:white;
    width:400px;
    margin:auto;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}
</style>

</head>
<body>

<div class="container">
<h2><?php echo $message; ?></h2>
<p>Redirecting to home page...</p>
</div>

</body>
</html>