<?php
//filename: connectdb.php

$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "medi";

$conn=mysqli_connect($host,$user,$password);


mysqli_select_db($conn,$db);	

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<div style ='color:#ff0000'>Connected database successfully...!!!</div>";
echo "<br>";
?>