<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Events</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Events</h2>

			<?php
			require_once '../components/topnav.php';
			?>
		<div>
		<div class="row">
		  <div class="column" style="background-color:maroon;">
			<a href="../add/add-event.php"><h2>Add Event</h2></a>
		  </div>
		</div>
			
			<h1>Event List</h1>

<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
$query = "SELECT * FROM events";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	<pre>
	EventID: <a href='../update/update-event.php?EventID=$row[EventID]'>$row[EventID]</a>
	TeamID: $row[TeamID]
	Venue: $row[Venue]
	Date: $row[Date]
	Expenses: $row[Expenses]
	Opponent: $row[Opponent]
	</pre>
	
	<form action='../delete/delete-event.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='EventID' value='$row[EventID]'>
		<input type='submit' value='DELETE EVENT'>
	</form>
	
_END;

}

$conn->close();

?>		
		
		
	</body>
</html>

<?php
require_once '../components/footer.php';
?>