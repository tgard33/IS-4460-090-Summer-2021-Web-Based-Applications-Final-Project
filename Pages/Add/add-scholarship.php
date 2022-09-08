<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Add Scholarship</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Add Scholarship</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
		<form id="form1" method='post' action='../add/add-scholarship.php'>
			<pre>
				AthleteID: <input type='text' name='AthleteID'>
				DonorID: <input type='text' name='DonorID'>
				Amount: <input type='text' name='Amount'>
				Date: <input type='text' name='Date'>
				Type: <input type='text' name='Type'>
				Requirements: <input type='text' name='Requirements'>
				Status: <input type='text' name='Status'>
				<input type='submit' value='Add Scholarship'>
			</pre>
		</form>	
	</body>
</html>
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['AthleteID'])){
	
	$AthleteID = $_POST['AthleteID'];
	$DonorID = $_POST['DonorID'];
	$Amount = $_POST['Amount'];
	$Date = $_POST['Date'];
	$Type = $_POST['Type'];
	$Requirements = $_POST['Requirements'];
	$Status = $_POST['Status'];
	
	$query = "INSERT INTO scholarships (AthleteID, DonorID, Amount, Date, Type, Requirements, Status) VALUES ('$AthleteID', '$DonorID','$Amount', '$Date', '$Type', '$Requirements', '$Status')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/scholarships.php");
}

$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>