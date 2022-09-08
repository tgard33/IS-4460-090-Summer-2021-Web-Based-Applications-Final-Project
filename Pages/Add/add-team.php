<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Add Team</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Add Team</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
		<form id="form1" method='post' action='../add/add-team.php'>
			<pre>
				RankID: <input type='text' name='RankID'>
				EquipmentID: <input type='text' name='EquipmentID'>
				Type: <input type='text' name='Type'>
				Email: <input type='text' name='Email'>
				Established Date: <input type='text' name='EstablishedDate'>
				<input type='submit' value='Add Team'>
			</pre>
		</form>	
	</body>
</html>
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['RankID'])){
	
	$RankID = $_POST['RankID'];
	$EquipmentID = $_POST['EquipmentID'];
	$Type = $_POST['Type'];
	$Email = $_POST['Email'];
	$EstablishedDate = $_POST['EstablishedDate'];
	
	$query = "INSERT INTO teams ( RankID, EquipmentID, Type, Email, EstablishedDate) VALUES ('$RankID', '$EquipmentID', '$Type', '$Email', '$EstablishedDate')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/teams.php");
}

$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>