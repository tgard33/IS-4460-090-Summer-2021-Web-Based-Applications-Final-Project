<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Update Equipment</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Update Equipment</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
if(isset($_GET['EquipmentID'])){
	
$EquipmentID = $_GET['EquipmentID'];

$query = "SELECT * FROM equipment where EquipmentID=$EquipmentID ";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

	<form id="form1" action='../update/update-equipment.php' method='post'>
	
	<pre>
	EquipmentID: $row[EquipmentID]
	Type: <input type='text' name='Type' value='$row[Type]'>
	Annual Cost: <input type='text' name='AnnualCost' value='$row[AnnualCost]'>
	Date: <input type='text' name='Date' value='$row[Date]'>
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='EquipmentID' value='$row[EquipmentID]'>
		<input type='submit' value='UPDATE EQUIPMENT'>
	</form>
	
_END;

}

}


if(isset($_POST['update'])){
	
	$EquipmentID = $_POST['EquipmentID'];
	$Type = $_POST['Type'];
	$AnnualCost = $_POST['AnnualCost'];
	$Date = $_POST['Date'];
	
	$query = "UPDATE equipment SET Type='$Type', AnnualCost='$AnnualCost', Date='$Date' WHERE EquipmentID = $EquipmentID ";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/equipment.php");
}
$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>