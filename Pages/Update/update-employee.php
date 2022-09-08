<?php
$page_roles = array('Admin');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Update Employee</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Update Employee</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
if(isset($_GET['EmployeeID'])){
	
$EmployeeID = $_GET['EmployeeID'];

$query = "SELECT * FROM employees where EmployeeID=$EmployeeID ";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

	<form id="form1" action='../update/update-employee.php' method='post'>
	
	<pre>
	EmployeeID: $row[EmployeeID]
	Last Name: <input type='text' name='LastName' value='$row[LastName]'>
	First Name: <input type='text' name='FirstName' value='$row[FirstName]'>
	Title: <input type='text' name='Title' value='$row[Title]'>
	Street Address: <input type='text' name='StreetAddress' value='$row[StreetAddress]'>
	City: <input type='text' name='City' value='$row[City]'>
	State: <input type='text' name='State' value='$row[State]'>
	Zip Code: <input type='text' name='ZipCode' value='$row[ZipCode]'>
	Phone: <input type='text' name='Phone' value='$row[Phone]'>
	Email: <input type='text' name='Email' value='$row[Email]'>
	Start Date: <input type='text' name='StartDate' value='$row[StartDate]'>
	End Date: <input type='text' name='EndDate' value='$row[EndDate]'>
	Type: <input type='text' name='Type' value='$row[Type]'>
	Annual Cost: <input type='text' name='AnnualCost' value='$row[AnnualCost]'>
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='EmployeeID' value='$row[EmployeeID]'>
		<input type='submit' value='UPDATE EMPLOYEE'>
	</form>
	
_END;

}

}


if(isset($_POST['update'])){
	
	$EmployeeID = $_POST['EmployeeID'];
	$LastName = $_POST['LastName'];
	$FirstName = $_POST['FirstName'];
	$Title = $_POST['Title'];
	$StreetAddress = $_POST['StreetAddress'];
	$City = $_POST['City'];
	$State = $_POST['State'];
	$ZipCode = $_POST['ZipCode'];
	$Phone = $_POST['Phone'];
	$Email = $_POST['Email'];
	$StartDate = $_POST['StartDate'];
	$EndDate = $_POST['EndDate'];
	$Type = $_POST['Type'];
	$AnnualCost = $_POST['AnnualCost'];
	
	$query = "UPDATE employees SET LastName='$LastName', FirstName='$FirstName', Title='$Title', StreetAddress='$StreetAddress', City='$City', State='$State', ZipCode='$ZipCode', Phone='$Phone', Email='$Email', StartDate='$StartDate', EndDate='$EndDate', Type='$Type', AnnualCost='$AnnualCost' WHERE EmployeeID = $EmployeeID ";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/employees.php");
}
$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>