<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Equipment</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Equipment</h2>

			<?php
			require_once '../components/topnav.php';
			?>
		<div>
		<div class="row">
		  <div class="column" style="background-color:maroon;">
			<a href="../add/add-equipment.php"><h2>Add Equipment</h2></a>
		  </div>
		</div>
			
			<h1>Equipment List</h1>

<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
$query = "SELECT * FROM equipment";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	<pre>
	EquipmentID: <a href='../update/update-equipment.php?EquipmentID=$row[EquipmentID]'>$row[EquipmentID]</a>
	Type: $row[Type]
	Annual Cost: $row[AnnualCost]
	Date: $row[Date]
	</pre>
	
	<form action='../delete/delete-equipment.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='EquipmentID' value='$row[EquipmentID]'>
		<input type='submit' value='DELETE EQUIPMENT'>
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