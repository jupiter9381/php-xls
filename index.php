<?php 
	$user = "root";
	$pass = "";
	$host = "localhost";
	$db = "roberts";

	$conn = mysqli_connect($host, $user, $pass, $db);

	require('lib/XLSXReader-master/XLSXReader.php');
	
	$xlsx = new XLSXReader('sampleData/1.xlsx');

	$data = $xlsx->getSheetData('Sheet1');

	$start_date = "1899-12-30";

	//var_dump($data[1][5] - );
	for($i = 1; $i < count($data); $i++){
		$title = $data[$i][0];
		$first_name = $data[$i][1];
		$middle_name = $data[$i][2];
		$last_name = $data[$i][3];
		$age = $data[$i][4];
		$dob = date("m/d/Y", strtotime("$start_date +".$data[$i][5]." days"));
		$s_dpid = $data[$i][6];
		$address1 = $data[$i][7];
		$address2 = $data[$i][8];
		$address3 = $data[$i][9];	
		$suburb = $data[$i][10];
		$state1 = $data[$i][11];
		$state2 = $data[$i][12];
		$phone = $data[$i][13];
		$landline = $data[$i][14];
		$email = $data[$i][15];
		$gender = $data[$i][16];


		$sql = 'INSERT INTO details VALUES("", "'.$title.'", "'.$first_name.'", "'.$middle_name.'", "'.$last_name.'",  "'.$age.'",  "'.$dob.'",  "'.$s_dpid.'",  "'.$address1.'",  "'.$address2.'",  "'.$address3.'",  "'.$suburb.'",  "'.$state1.'",  "'.$state2.'",  "'.$phone.'",  "'.$landline.'",  "'.$email.'",  "'.$gender.'")';

		mysqli_query($conn, $sql);
	}
	
	//var_dump(date("Y-m-d", strtotime("$start_date +".$days." days")));

?>