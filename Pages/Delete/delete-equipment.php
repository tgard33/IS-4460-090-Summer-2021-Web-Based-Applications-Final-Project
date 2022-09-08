<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete'])){

	$EquipmentID = $_POST ['EquipmentID'];	
	$query = "DELETE FROM equipment where EquipmentID='$EquipmentID' ";
		
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/equipment.php"); 
}

$conn->close();

?>