<?php
$host = "sql100.infinityfree.com";
$user = "if0_41622415";
$pass = "onlinevoting123";
$db = "if0_41622415_online_voting";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>