<?php

$con=mysqli_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


mysqli_select_db($con,"Student");

$value = $_POST['content'];

$array = json_decode($value,true); //json_decode

if (empty($array)) {
  $response = array(
			'status' => false,
		);
		echo json_encode($response);
}
else
{
//loop
foreach($array as $item) {
	$sql ="INSERT INTO `reg` (Name, Age, Department) 
	VALUES ('".$item['name']."', '".$item['age']."', '".$item['department']."')";
	$con->query($sql);
		
	}
	$response = array(
			'status' => true,
		);
		echo json_encode($response);
	}

?>