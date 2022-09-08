<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Donors</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Donors</h2>

			<?php
			require_once '../components/topnav.php';
			?>
		<div>
		<div class="row">
		  <div class="column" style="background-color:maroon;">
			<a href="../add/add-donor.php"><h2>Add Donor</h2></a>
		  </div>
		</div>
			
			<h1>Donor List</h1>

<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
$query = "SELECT * FROM donors";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	<pre>
	DonorID: <a href='../update/update-donor.php?DonorID=$row[DonorID]'>$row[DonorID]</a>
	Last Name: $row[LastName]
	First Name: $row[FirstName]
	Status: $row[Status]
	Register Date: $row[RegisterDate]
	</pre>
	
	<form action='../delete/delete-donor.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='DonorID' value='$row[DonorID]'>
		<input type='submit' value='DELETE DONOR'>
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