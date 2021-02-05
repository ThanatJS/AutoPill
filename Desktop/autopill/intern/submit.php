<?php
include ("connectdb.php");
$medi1 =$_REQUEST["medi1"];
$medi2 =$_REQUEST["medi2"];	
$medi3 =$_REQUEST["medi3"];


//mysqli_select_db($conn,$database);	
if ($medi1 == null){
	$medi1 = 0;
}
if ($medi2 == null){
	$medi2 = 0;
}
if ($medi3 == null){
	$medi3 = 0;
}
$sql ="UPDATE `manual` SET `medi1`=$medi1,`medi2`=$medi2,`medi3`=$medi3";
//mysqli_query($conn,$sql);
echo $medi1;
echo $medi2;
echo $medi3;

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
	sleep(1);
	$sql ="UPDATE `manual` SET `medi1`='0',`medi2`='0',`medi3`='0'";
	mysqli_query($conn,$sql);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}	

?>


<meta http-equiv="refresh" content="0;url=index.php">