<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Teams</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Teams</h2>

			<?php
			require_once '../components/topnav.php';
			?>
		<div>
		<div class="row">
		  <div class="column" style="background-color:maroon;">
			<a href="../add/add-team.php"><h2>Add Team</h2></a>
		  </div>
		<div class="row">
		  <div class="column" style="background-color:lightgrey;">
			<a href="ranks.php"><h2>View Ranks</h2></a>
		  </div>
		</div>
			
			<h1>Team List</h1>

<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
$query = "SELECT * FROM teams";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	<pre>
	TeamID: <a href='../update/update-team.php?TeamID=$row[TeamID]'>$row[TeamID]</a>
	RankID: $row[RankID]
	EquipmentID: $row[EquipmentID]
	Type: $row[Type]
	Email: $row[Email]
	Established Date: $row[EstablishedDate]
	</pre>
	
	<form action='../delete/delete-team.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='TeamID' value='$row[TeamID]'>
		<input type='submit' value='DELETE TEAM'>
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