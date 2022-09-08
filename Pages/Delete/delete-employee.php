<?php
$page_roles = array('Admin');
require_once '../../security/checksession.php';

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['delete'])){

	$EmployeeID = $_POST ['EmployeeID'];	
	$query = "DELETE FROM employees where EmployeeID='$EmployeeID' ";
		
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/employees.php");
}

$conn->close();

?>