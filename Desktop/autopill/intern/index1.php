<?php


require_once("Config.php");

//คำสั่งอ่านค่า
$GeneralCommand =	$_GET["GenCommand"];

// หลอดไฟห้องนอน
$LEDCommand1 	=	$_GET["LEDCommand1"];
$LEDColor1 		=	$_GET["LEDColor1"];
$LEDValue1	 	= 	$_GET["LEDValue1"];

// หลอดไฟห้องครัว
$LEDCommand2 	=	$_GET["LEDCommand2"];
$LEDColor2 		=	$_GET["LEDColor2"];
$LEDValue2	 	= 	$_GET["LEDValue2"];

// ตรวจจับแก๊ส
$GasCommand		= 	$_GET["GasCommand"];
$GasValue		= 	$_GET["GasValue"];

// ตรวจจับการเคลื่อนไหว
$MotionCommand 	= 	$_GET["MotionCommand"];

//ตรวจจับอุณหภูมิ
$TEMPCommand 	=	$_GET["TEMPCommand"];
$TEMPValue	 	= 	$_GET["TEMPValue"];

// อุปกรณ์ที่เชื่อมต่อ
$Device			=	$_GET["Device"];


// คำสั่งควบคุมการทำงานของไฟห้องนอน
if($LEDCommand1 != Null){
	if($LEDCommand1 == "On"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Led1` = '1' WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
		echo "เปิดไฟห้องนอนให้แล้วครับ!!";
	}else if($LEDCommand1 == "Off"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Led1` = '0' WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
		echo "ปิดไฟห้องนอนให้แล้วครับ!!";
	}else if($LEDCommand1 == "Show"){
		$sql = "SELECT Led_Value1 FROM `IOTBoard` LIMIT 1";
		$result = mysql_query($sql);
		$resultfetch = mysql_fetch_array($result);
		echo "ค่าความเข้มแสงในห้องนอน ปัจจุบัน : ".$resultfetch["Led_Value1"];
	}else if($LEDCommand1 == "SET" && $Device == "ESP8266"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Led_Value1` = $LEDValue1 WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
	}
}
// คำสั่งควบคุมการทำงานของไฟห้องครัว
if($LEDCommand2 != Null){
	if($LEDCommand2 == "On"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Led2` = '1' WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
		echo "เปิดไฟห้องครัวให้แล้วครับ!!";
	}else if($LEDCommand2 == "Off"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Led2` = '0' WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
		echo "ปิดไฟห้องครัวให้แล้วครับ!!";
	}else if($LEDCommand2 == "Show"){
		$sql = "SELECT Led_Value2 FROM `IOTBoard` LIMIT 1";
		$result = mysql_query($sql);
		$resultfetch = mysql_fetch_array($result);
		echo "ค่าความเข้มแสงในห้องครัว ปัจจุบัน : ".$resultfetch["Led_Value2"];
	}else if($LEDCommand2 == "SET" && $Device == "ESP8266"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Led_Value2` = $LEDValue1 WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
	}
}
// ตรวจจับแก๊ส
if($GasCommand != Null){
	if($GasCommand == "On"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Gas` = '1' WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
		echo "เปิดระบบตรวจจับแก๊สแล้วครับ!!";
	}else if($GasCommand == "Off"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Gas` = '0' WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
		echo "ปิดระบบตรวจจับแก๊สแล้วครับ!!";
	}else if($GasCommand == "SET" && $Device == "ESP8266"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Gas_Value` = $GasValue WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
	}		
}
// ตรวจจับการเคลื่อนไหว
if($MotionCommand != Null){
	if($MotionCommand == "On"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `PIR` = '1' WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
		echo "เปิดระบบตรวจจับแก๊สแล้วครับ!!";
	}else if($MotionCommand == "Off"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `PIR` = '0' WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
		echo "ปิดระบบตรวจจับแก๊สแล้วครับ!!";
	}		
}
// ตรวจจับอุณหภูมิ
if($TEMPCommand != Null)
{
	if($TEMPCommand == "On"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Temp_status` = '1' WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
		echo "เปิดระบบตรวจจับแก๊สแล้วครับ!!";
	}else if($TEMPCommand == "Off"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Temp_status` = '0' WHERE `IOTBoard`.`Id` = 1;";
		$result = mysql_query($sql);
		echo "ปิดระบบตรวจจับแก๊สแล้วครับ!!";
	}else if($TEMPCommand == "SET" && $Device == "ESP8266"){
		$sql = "UPDATE `novelth1_test`.`IOTBoard` SET `Temp` = $TEMPValue WHERE `IOTBoard`.`Id` = 1;;";
		$result = mysql_query($sql);
	}else if($TEMPCommand == "Show"){
		$sql = "SELECT Temp FROM `IOTBoard` LIMIT 1";
		$result = mysql_query($sql);
		$resultfetch = mysql_fetch_array($result);
		echo "อุณหภูมิห้องนอนในขณะนี้ คือ ".$resultfetch["Temp"];
	}
}
//คำสั่งอ่านค่าไปยังบอร์ด
if($GeneralCommand != Null)
{
	if($GeneralCommand == "DeviceRead"  && $Device == "ESP8266")
	{
		$sql = "SELECT * FROM `IOTBoard`";
		$result = mysql_query($sql);
		$resultfetch = mysql_fetch_array($result,MYSQL_ASSOC);
		echo json_encode($resultfetch);	
	}
	else if($GeneralCommand == "LineRead")
	{
		$sql = "SELECT * FROM `IOTBoard` LIMIT 1";
		$result = mysql_query($sql);
		$resultfetch = mysql_fetch_array($result);
		echo "รายงานสถานะ ";
		if($resultfetch["Led1"] == "1"){
			echo "สถานะการทำงานของหลอดไฟห้องนอน :  เปิด";
		}else{
			echo "สถานะการทำงานของหลอดไฟห้องนอน :  ปิด";
		}
		echo "ค่าแสงห้องนอนปัจจุบัน   : ".$resultfetch["Led_Value1"];
		
		if($resultfetch["Led2"] == "1"){
			echo "สถานะการทำงานของหลอดไฟห้องครัว :  เปิด";
		}else{
			echo "สถานะการทำงานของหลอดไฟห้องครัว :  ปิด";
		}
		echo "ค่าแสงห้องครัว   : ".$resultfetch["Led_Value2"];
		
		if($resultfetch["Gas"] == "1"){
			echo "ระบบตรวจจับแก๊ส :  เปิด";
		}else{
			echo "ระบบตรวจจับแก๊ส :  ปิด";
		}
		
		if($resultfetch["PIR"] == "1"){
			echo "ระบบตรวจจับการเคลื่อนไหว :  เปิด";
		}else{
			echo "ระบบตรวจจับการเคลื่อนไหว :  ปิด";
		}
		if($resultfetch["Temp_status"] == "1"){
			echo "ระบบตรวจจับอุณหภูมิ :  เปิด";
		}else{
			echo "ระบบตรวจจับอุณหภูมิ :  ปิด";
		}
		echo "อุณหภูมิห้องครัวปัจจุบัน : ".$resultfetch["Temp"];
	}
		
}
?>