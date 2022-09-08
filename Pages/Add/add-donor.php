<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Add Donor</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Add Donor</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
		<form id="form1" method='post' action='add-donor.php'>
			<pre>
				Last Name: <input type='text' name='LastName'>
				First Name: <input type='text' name='FirstName'>
				Status: <input type='text' name='Status'>
				Register Date: <input type='text' name='RegisterDate'>
				<input type='submit' value='Add Donor'>
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
	$Status = $_POST['Status'];
	$RegisterDate = $_POST['RegisterDate'];
	
	$query = "INSERT INTO donors (LastName, FirstName, Status, RegisterDate) VALUES ('$LastName','$FirstName', '$Status', '$RegisterDate')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/donors.php");
}

$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>