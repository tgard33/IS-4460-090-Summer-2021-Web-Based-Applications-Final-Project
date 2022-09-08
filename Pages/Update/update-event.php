<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Update Event</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Update Event</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
if(isset($_GET['EventID'])){
	
$EventID = $_GET['EventID'];

$query = "SELECT * FROM events where EventID=$EventID ";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

	<form id="form1" action='../update/update-event.php' method='post'>
	
	<pre>
	EventID: $row[EventID]
	TeamID: <input type='text' name='TeamID' value='$row[TeamID]'>
	Venue: <input type='text' name='Venue' value='$row[Venue]'>
	Date: <input type='text' name='Date' value='$row[Date]'>
	Expenses: <input type='text' name='Expenses' value='$row[Expenses]'>
	Opponent: <input type='text' name='Opponent' value='$row[Opponent]'>
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='EventID' value='$row[EventID]'>
		<input type='submit' value='UPDATE EVENT'>
	</form>
	
_END;

}

}


if(isset($_POST['update'])){
	
	$TeamID = $_POST['TeamID'];
	$EventID = $_POST['EventID'];
	$Venue = $_POST['Venue'];
	$Date = $_POST['Date'];
	$Expenses = $_POST['Expenses'];
	$Opponent = $_POST['Opponent'];
	
	$query = "UPDATE events SET TeamID='$TeamID', Venue='$Venue', Date='$Date', Expenses='$Expenses', Opponent='$Opponent' WHERE EventID = $EventID ";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/events.php");
}
$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>