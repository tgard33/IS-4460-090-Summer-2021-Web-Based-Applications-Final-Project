<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Add Event</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Add Event</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
		<form id="form1" method='post' action='../add/add-Event.php'>
			<pre>
				TeamID: <input type='text' name='TeamID'>
				Venue: <input type='text' name='Venue'>
				Date: <input type='text' name='Date'>
				Expenses: <input type='text' name='Expenses'>
				Opponent: <input type='text' name='Opponent'>
				<input type='submit' value='Add Event'>
			</pre>
		</form>	
	</body>
</html>
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['TeamID'])){
	
	$TeamID = $_POST['TeamID'];
	$Venue = $_POST['Venue'];
	$Date = $_POST['Date'];
	$Expenses = $_POST['Expenses'];
	$Opponent = $_POST['Opponent'];
	
	$query = "INSERT INTO events (TeamID, Venue, Date, Expenses, Opponent) VALUES ('$TeamID', '$Venue','$Date', '$Expenses', '$Opponent')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/events.php");
}

$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>