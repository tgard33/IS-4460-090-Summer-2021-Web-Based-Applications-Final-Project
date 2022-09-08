<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Add Equipment</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Add Equipment</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
		<form id="form1" method='post' action='../add/add-equipment.php'>
			<pre>
				Type: <input type='text' name='Type'>
				Annual Cost: <input type='text' name='AnnualCost'>
				Date: <input type='text' name='Date'>
				<input type='submit' value='Add Equipment'>
			</pre>
		</form>	
	</body>
</html>
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['Type'])){
	
	$Type = $_POST['Type'];
	$AnnualCost = $_POST['AnnualCost'];
	$Date = $_POST['Date'];
	
	$query = "INSERT INTO equipment (Type, AnnualCost, Date) VALUES ('$Type', '$AnnualCost','$Date')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/equipment.php");
}

$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>