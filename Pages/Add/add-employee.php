<?php
$page_roles = array('Admin');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Add Employee</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Add Employee</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
		<form id="form1" method='post' action='add-employee.php'>
			<pre>
				Last Name: <input type='text' name='LastName'>
				First Name: <input type='text' name='FirstName'>
				Title: <input type='text' name='Title'>
				Street Address: <input type='text' name='StreetAddress'>
				City: <input type='text' name='City'>
				State: <input type='text' name='State'>
				Zip Code: <input type='text' name='ZipCode'>
				Phone: <input type='text' name='Phone'>
				Email: <input type='text' name='Email'>
				Start Date: <input type='text' name='StartDate'>
				End Date: <input type='text' name='EndDate'>
				Type: <input type='text' name='Type'>
				Annual Cost: <input type='text' name='AnnualCost'>
				<input type='submit' value='Add Employee'>
			</pre>
		</form>	
	</body>
</html>
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['LastName'])){
	
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
	
	$query = "INSERT INTO employees (LastName, FirstName, Title, StreetAddress, City, State, ZipCode, Phone, Email, StartDate, EndDate, Type, AnnualCost) VALUES ('$LastName', '$FirstName','$Title', '$StreetAddress', '$City', '$State', '$ZipCode', '$Phone', '$Email', '$StartDate', '$EndDate', '$Type', '$AnnualCost')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/employees.php");
}

$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>