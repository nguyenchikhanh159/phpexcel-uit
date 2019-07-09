<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require('Connect/db_connect.php');
require('Classes/PHPExcel.php');
	ini_set('max_execution_time', 300);
	$path = "./Excel/";
	$theFilePath = "";		
	$theFileName = glob ($path . "*.xlsx");
			
	for($j = 0; $j< count($theFileName); $j++) 
      {
		$theFilePath = $theFileName[$j];
		
	
		$objReader = PHPExcel_IOFactory::createReaderForfile($theFilePath); 
		$objExcel =$objReader->load($theFilePath);

	foreach ($objExcel->getWorksheetIterator() as $worksheet) 
	{

		$sheetData= $worksheet->toArray(null,true,true,true);
		$highestRow= $worksheet->getHighestRow();
		$id=0;
		$MT= $sheetData['6']['C'];
		$MaMT=trim(substr($sheetData['1']['F'],8));
		$NT=trim(substr($sheetData['5']['F'],10));
		$NT=date('Y-m-d', strtotime($NT));
		$PT=trim(substr($sheetData['6']['F'],12));
		
     	

		if($PT) 
		{
			$sql= "INSERT INTO  mnstudents(IDMT,MaMT,TenMT,NT,PT) VALUES ('$id','$MaMT','$MT', '$NT','$PT')";
			$connect->query($sql);
			$getIDMT = mysqli_insert_id($connect);
			for ($row=11;$row<=$highestRow-5;$row++)
			{
				$MSSV=$sheetData[$row]['B'];
				$Name= $sheetData[$row]['C'];
				$STT=($sheetData[$row]['A']);
	
	 			$sqlid="SELECT IDHV FROM mstudents WHERE StudentsID='$MSSV'";
	 			$data = $connect->query($sqlid);
	 			if ($data->num_rows == 0) 
	 			{	
	 				$sqlx= "INSERT INTO mstudents(StudentsID,Name,STT) VALUES ('$MSSV','$Name','$STT');";
	 				$connect->query($sqlx);
	 				$getIDHV = mysqli_insert_id($connect);
	 			}
	 			else 
	 			{
	 				$getIDHV = $data->fetch_object()->IDHV;
	 			}
	 			
				$sqlx1="INSERT INTO mnm(IDHV, IDMT) VALUES ('$getIDHV', '$getIDMT')"; 
				$connect->query($sqlx1);
			}
		}
		
	}
}
	echo "success";
	
	$connect->Close();
?>