<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Athletes</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Athletes</h2>

			<?php
			require_once '../components/topnav.php';
			?>
		<div>
		<div class="row">
		  <div class="column" style="background-color:maroon;">
			<a href="../add/add-athlete.php"><h2>Add Athlete</h2></a>
		  </div>
		<div class="row">
		  <div class="column" style="background-color:lightgrey;">
			<a href="scholarships.php"><h2>View Scholarships</h2></a>
		  </div>
		</div>
			
			<h1>Athlete List</h1>

<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
$query = "SELECT * FROM athletes";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	<pre>
	AthleteID: <a href='../update/update-athlete.php?AthleteID=$row[AthleteID]'>$row[AthleteID]</a>
	Last Name: $row[LastName]
	First Name: $row[FirstName]
	Position: $row[Position]
	Academic Level: $row[AcademicLevel]
	Graduation Date: $row[GraduationDate]
	GPA: $row[GPA]
	Captain: $row[Captain]
	Phone Number: $row[Phone]
	Email: $row[Email]
	NCAA Eligible: $row[NCAAEligible]
	</pre>
	
	<form action='../delete/delete-athlete.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='AthleteID' value='$row[AthleteID]'>
		<input type='submit' value='DELETE ATHLETE'>
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