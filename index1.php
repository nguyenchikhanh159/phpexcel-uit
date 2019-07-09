


<?php
// require('Connect/db_connect.php');
// require('Classes/PHPExcel.php');
	
// 	if(isset($_POST['student_id']))
// 	{

		
// 		 $text=$_POST['student_id'];
// 		$selectdata="SELECT StudentsID,Name,TenMT,PT,NT,mstudents.STT FROM mnm,mstudents,mnstudents WHERE StudentsID=$text AND mnm.IDHV=mstudents.IDHV AND mnm.IDMT=mnstudents.IDMT";

// 		$result= $connect->query($selectdata);
// 		if($result->num_rows > 0)
// 		{
// 			while($row=$result->fetch_assoc())
// 			{


// 				echo 'Mon Thi: ';
// 				echo $row['TenMT'].'	__Phong Thi:    '. $row['PT'].'	__Ngay Thi:   '. $row['NT']. '__STT: '. $row['STT'].'	<br>';
// 			}
// 		}
// 	}
//?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 <link rel="stylesheet" type="text/css" href="lichthi.css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<body>
<!-- 	  <div id="content" class="content-with-preloader container">
  <div class="row">
    <div id="us-creator" class="col s12 m12 l12">
      <div class="card-panel">

        <form action="https://uesc.foxfizz.com/" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
          <div class="input-field">
            <input type="text" name="student_id" id="student-id" autocomplete="off" class="center-align">
            <label class="" for="student_id">Mã số sinh viên</label>
          </div>
</form>
      </div>

    </div>
  </div>
</div> -->
	<div class=Main style="width: 1400px;">
		<div class=Menu>
			<div class=MenuLeft>
			<i class="material-icons" style="margin: 50px 50px 50px 50px;font-size: 35px; ">&#xe85d;UIT CREATOR</i>
				
			</div>
			<div class=MenuRight style="margin:-30px 0px 20px 1100px;" >
				<i class="material-icons">&#xe88a;</i>
				<i class="material-icons">&#xe8fe;</i>
				<i class="material-icons">&#xe89e;</i>
			</div>
		</div>
		<div class=Wapper>
			<form method="POST" enctype="multipart/form-data">
		<!-- <input type ="text" name ="mssv" style="height:50px; width: 500px;">
		<input type ="submit" name="ok"> -->
		            <input type="text" name="student_id" id="student-id" autocomplete="off" class="center-align" style="width: 800px; height: 125px; margin:70px 20px 50px 250px; text-align: 10px;overflow: auto;border:2px solid #EFF8FB;position:relative;font-size: 30px; text-align: center;">
            <label class="" for="student_id" style="position: absolute; right:700px; top: 180px; font-size: 11px;">Mã số sinh viên</label>

			</form>	
		</div>
		</div>
			<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require('Connect/db_connect.php');
require('Classes/PHPExcel.php');
	
	if(isset($_POST['student_id']))
	{

			 $text=$_POST['student_id'];
		$selectdata="SELECT StudentsID,Name,TenMT,PT,NT,mstudents.STT FROM mnm,mstudents,mnstudents WHERE StudentsID=$text AND mnm.IDHV=mstudents.IDHV AND mnm.IDMT=mnstudents.IDMT";

		$result= $connect->query($selectdata);
		if($result->num_rows > 0)
		$row=$result->fetch_assoc();
		echo"<div class=container>";
  		echo"<h2>$row[Name]</h2>";
  		echo "<table class=table>";
   		echo "<thead>";
     	echo  "<tr>";
        echo "<th>Môn thi</th>";
        echo "<th>Phòng Thi</th>";
        echo "<th>Ngày thi</th>";
     	echo "</tr>";
   		echo "</thead>";
    	echo "<tbody>";
    	

		
	
		{
			while($row=$result->fetch_assoc())
			{

				
				// echo 'Mon Thi: ';
				// echo $row['TenMT'].'	__Phong Thi:    '. $row['PT'].'	__Ngay Thi:   '. $row['NT']. '__STT: '. $row['STT'].'	<br>';
				echo "<tr>";   
		        echo "<td>$row[TenMT]</td>";
		        echo "<td>$row[PT]</td>";
		        echo "<td>$row[NT]</td>";
		    	echo "</tr>";
			}
		}
		echo "</tbody>";
  		echo "</table>";
		echo "</div>";
	}
?>
		
	</body>
</html>