<?PHP
	$timepick = $_GET['timepick'];  
	
	include("connectdb.php");

	$sql = "DELETE FROM `auto` WHERE  `timepick`	= '$timepick'";
	mysqli_query($conn,$sql) or die("error=$sql");

	mysqli_close($conn);

	echo "<script>window.location='index.php';</script>";
?>
