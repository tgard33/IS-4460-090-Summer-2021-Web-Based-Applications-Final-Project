<?php

$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete'])){

	$AthleteID = $_POST ['AthleteID'];	
	$query = "DELETE FROM athletes where AthleteID='$AthleteID' ";
		
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/athletes.php"); 
}

$conn->close();

?>