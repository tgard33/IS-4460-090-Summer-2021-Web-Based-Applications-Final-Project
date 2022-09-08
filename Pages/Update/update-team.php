<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Update Team</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Update Team</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
if(isset($_GET['TeamID'])){
	
$TeamID = $_GET['TeamID'];

$query = "SELECT * FROM teams where TeamID=$TeamID ";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

	<form id="form1" action='../update/update-team.php' method='post'>
	
	<pre>
	TeamID: $row[TeamID]
	RankID: <input type='text' name='RankID' value='$row[RankID]'>
	EquipmentID: <input type='text' name='EquipmentID' value='$row[EquipmentID]'>
	Type: <input type='text' name='Type' value='$row[Type]'>
	Email: <input type='text' name='Email' value='$row[Email]'>
	EstablishedDate: <input type='text' name='EstablishedDate' value='$row[EstablishedDate]'>
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='TeamID' value='$row[TeamID]'>
		<input type='submit' value='UPDATE TEAM'>
	</form>
	
_END;

}

}


if(isset($_POST['update'])){
	
	$TeamID = $_POST['TeamID'];
	$RankID = $_POST['RankID'];
	$EquipmentID = $_POST['EquipmentID'];
	$Type = $_POST['Type'];
	$Email = $_POST['Email'];
	$EstablishedDate = $_POST['EstablishedDate'];
	
	$query = "UPDATE teams SET RankID='$RankID', EquipmentID='$EquipmentID', Type='$Type', Email='$Email', EstablishedDate='$EstablishedDate' WHERE TeamID = $TeamID ";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/teams.php");
}
$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>