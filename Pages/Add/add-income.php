<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Add Income</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Add Income</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
		<form id="form1" method='post' action='../add/add-income.php'>
			<pre>
				TeamID: <input type='text' name='TeamID'>
				DonorID: <input type='text' name='DonorID'>
				EventID: <input type='text' name='EventID'>
				Type: <input type='text' name='Type'>
				Amount: <input type='text' name='Amount'>
				Date: <input type='text' name='Date'>
				<input type='submit' value='Add Income'>
			</pre>
		</form>	
	</body>
</html>
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['DonorID'])){
	
	$TeamID = $_POST['TeamID'];
	$DonorID = $_POST['DonorID'];
	$EventID = $_POST['EventID'];
	$Type = $_POST['Type'];
	$Amount = $_POST['Amount'];
	$Date = $_POST['Date'];
	
	$query = "INSERT INTO income (TeamID, DonorID, EventID, Type, Amount, Date) VALUES ('$TeamID', '$DonorID','$EventID', '$Type', '$Amount','$Date')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/income.php");
}

$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>