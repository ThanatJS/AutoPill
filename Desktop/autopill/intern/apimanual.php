<?PHP
	$nsql="select * from auto;";
	include("connectdb.php");
	$nquery	= mysqli_query($conn,$nsql) or die("error=$nsql");
	$nnum	= mysqli_num_rows($nquery);
	for($i=1;$i<=$nnum;$i++)
	{
		$row	= mysqli_fetch_array($nquery); 
	}
	mysqli_close($conn);
 
  ?>

<?php
include ("connectdb.php");
$sql="select * from manual";
$query = mysqli_query($conn,$sql);

	if (!$query) {
		printf("Error: %s\n", $conn->error);
		exit();
	}
	$resultArray = array();
	while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		array_push($resultArray,$result);
	}
	echo json_encode($resultArray);
	
	if ($nnum != 0){
	$sql1 ="select * from auto where timepick <= NOW();";
	$query1 = mysqli_query($conn,$sql1);

		if (!$query1) {
			printf("Error: %s\n", $conn->error);
			exit();
		}
		
		$resultArray1 = array();
		while($result1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
		{
			array_push($resultArray1,$result1);
		}		
	}
	if ($nnum == 0 || $resultArray1 == null){
	$sql1 ="select * from d";
	$query1 = mysqli_query($conn,$sql1);

		if (!$query1) {
			printf("Error: %s\n", $conn->error);
			exit();
		}
		
		$resultArray1 = array();
		while($result1 = mysqli_fetch_array($query1,MYSQLI_ASSOC))
		{
			array_push($resultArray1,$result1);
		}
		
	}
	echo json_encode($resultArray1);
	
	
$sql2 ="DELETE FROM `auto` WHERE timepick <= now();";
$query2 = mysqli_query($conn,$sql2);
	if (!$query2) {
		printf("Error: %s\n", $conn->error);
		exit();
	}
	mysqli_close($conn);

	


?>

  
