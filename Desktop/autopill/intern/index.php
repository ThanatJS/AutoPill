
<!DOCTYPE HTML>
<html>
  <head>
    <script type="text/javascript" src="date_time.js"></script>
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
  </head>
  <body background ="white.jpg">	
      <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5"><center><u>Automatic Medicine</u></center></h1>
		  <h3><center>Powered By<img src="logo.png" height="200" width="200" ></center></h3>
		    <h3><center><span id="date_time"></span></center></h3>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
			<br>
		  <h4><center><u>จ่ายยา</u></center></h4>
		    <table class="table table-bordered">
    <tbody>
      <tr>
	  <form action="/intern/manual.php" method="post" id="form1" >
        <td><center><b>ยาตัวที่ 1 <br>จำนวน : <input type="text"  maxlength="1" name="mmedi1" value="0"><br><font color="red"> *** สั่งได้สูงสุด 9 เม็ด *** </b></font></center></td>
        <td><center><b>ยาตัวที่ 2 <br>จำนวน : <input type="text"  maxlength="1" name="mmedi2" value="0"><br><font color="red"> *** สั่งได้สูงสุด 9 เม็ด *** </b></font></center></td>
        <td><center><b>ยาตัวที่ 3 <br>จำนวน : <input type="text"  maxlength="1" name="mmedi3" value="0"><br><font color="red"> *** สั่งได้สูงสุด 9 เม็ด *** </b></font></center></td>
		<input type="hidden"  name="ini" value="0">
	  </form>	
      </tr>
    </tbody>
  </table>
  <center><input type="submit" class="btn btn-primary btn-lg" form="form1" onclick="return confirm('คุณแน่ใจว่าจะจ่ายยา ?')"  value="จ่ายยา">
  <!--<input type="submit" class="btn btn-danger" form="form2" value="ยกเลิกการจ่ายยา"></center>
  <form action="/intern/manual.php" method="post" id="form2" >
  <input type="hidden" name="mmedi1" value="0">
  <input type="hidden" name="mmedi2" value="0">
  <input type="hidden" name="mmedi3" value="0">	
  <input type="hidden" name="ini" value="1">
  </form>-->
</div>
  <br>
  <br>
			<h4><center><u>ตั้งวันเวลาจ่ายยาอัตโนมัติ</u></center></h4>
		  	  <table class="table table-bordered">
    <tbody>
	<form action="/intern/auto.php" method="post" id="form3" >
      <tr>
        <td><center><b>ตั้งวันเวลาจ่ายยา</b></center></td>
        <td>    <div id="datetimepicker" class="input-append date">
      <input type="text" name="timepick" value="<?php
date_default_timezone_set("Asia/Bangkok");
echo date("d/m/Y");
echo " ";
echo date("h:i:s");
?>"></input>
      <span class="add-on">	
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
    </div></td>
      </tr>
      <tr>
        <td><center><b>ยาตัวที่ 1 <br>จำนวน : <input type="text"  maxlength="1" value ="0" name="amedi1"><br><font color="red"> *** สั่งได้สูงสุด 9 เม็ด ***</b></center></td>
        <td><center><b>ยาตัวที่ 2 <br>จำนวน : <input type="text"  maxlength="1" value ="0" name="amedi2"><br><font color="red"> *** สั่งได้สูงสุด 9 เม็ด ***</b></center></td>
        <td><center><b>ยาตัวที่ 3 <br>จำนวน : <input type="text"  maxlength="1" value ="0" name="amedi3"><br><font color="red"> *** สั่งได้สูงสุด 9 เม็ด ***</b></center></td>
      </tr>
      </tr>
	  </tr>
	  </form>
    </tbody>
  </table>
  <center><b><u><font color="red">*** สามารถตั้งวันเวลาจ่ายยาสูงสุดได้  5 เวลา ***</font></u></b></center><br>
  <center><input type="submit" class="btn btn-success" form="form3" onclick="clicked(event)"  value="บันทึก"></button>
  <br>
  <br>
  <br>
  <h4><center><u>บันทึกการจ่ายยาอัตโนมัติ</u></center></h4>
	  <?PHP
	$sql="select * from auto;";
	include("connectdb.php");
	$query	= mysqli_query($conn,$sql) or die("error=$sql");
	$num	= mysqli_num_rows($query);
	for($i=1;$i<=$num;$i++)
	{
		$row	= mysqli_fetch_array($query); 

  ?>
	
	<table  class="table table-bordered"><center>
	<tbody>
    <td><center><b>ยาตัวที่  1 : <font color="red"><?PHP echo $row['amedi1']?></font> เม็ด</b></td>
	<td><center><b>ยาตัวที่  2 :<font color="red"> <?PHP echo $row['amedi2']?></font> เม็ด</b></td>
	<td><center><b>ยาตัวที่  3 : <font color="red"><?PHP echo $row['amedi3']?></font> เม็ด</b></td>
	<td><center><b>วันเวลาจ่ายยา : <font color="red"><?PHP echo $row['timepick']?><b></td>
    <td><center><a href="delete.php?timepick=<?PHP echo $row['timepick']?>"
     onclick="return confirm('คุณแน่ใจที่จะลบไหม??'); "><img src="delete.png" width="22" height="22"/></a></td>
  <?PHP
  }
  mysqli_close($conn);
  if ($num == 0){
	  echo "<div style ='color:red'>!!! ไม่มีข้อมูลการตั้งวันเวลาจ่ายยาอัตโนมัติ !!!</div>";
	  
  } 
  ?>
  </tbody></center>
  </table>
        </div> 	
      </div>
</div>
<div id="dom-target" style="display: none;">
    <?php 
        echo htmlspecialchars($num); 
    ?>
</div>
<script type="text/javascript">
    var div = document.getElementById("dom-target");
    var num = div.textContent;
function clicked(e)
{
    if(!confirm('คุณแน่ใจว่าจะบันทึก ??')){
		e.preventDefault();
	}
	if (num >= 5)
	{
		alert("ไม่สามารถตั้งวันเวลาได้ กรุณาตรวจสอบข้อมูล !!! ");
		e.preventDefault();
	}
}
</script>
    <script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'en'
      });
    </script>
  </body>
<html>