<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Update Donor</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Update Donor</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
if(isset($_GET['DonorID'])){
	
$DonorID = $_GET['DonorID'];

$query = "SELECT * FROM donors where DonorID=$DonorID ";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

	<form id="form1" action='../update/update-donor.php' method='post'>
	
	<pre>
	DonorID: $row[DonorID]
	Last Name: <input type='text' name='LastName' value='$row[LastName]'>
	First Name: <input type='text' name='FirstName' value='$row[FirstName]'>
	Status: <input type='text' name='Status' value='$row[Status]'>
	RegisterDate: <input type='text' name='RegisterDate' value='$row[RegisterDate]'>
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='DonorID' value='$row[DonorID]'>
		<input type='submit' value='UPDATE DONOR'>
	</form>
	
_END;

}

}


if(isset($_POST['update'])){
	
	$DonorID = $_POST['DonorID'];
	$LastName = $_POST['LastName'];
	$FirstName = $_POST['FirstName'];
	$Status = $_POST['Status'];
	$RegisterDate = $_POST['RegisterDate'];
	
	$query = "UPDATE donors SET LastName='$LastName', FirstName='$FirstName', Status='$Status', RegisterDate='$RegisterDate' WHERE DonorID = $DonorID ";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/donors.php");
}
$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>