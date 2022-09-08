<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';


require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete'])){

	$TeamID = $_POST ['TeamID'];	
	$query = "DELETE FROM teams where TeamID='$TeamID' ";
		
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/teams.php"); 
}

$conn->close();

?>