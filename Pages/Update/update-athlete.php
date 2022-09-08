<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Update Athlete</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Update Athlete</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
if(isset($_GET['AthleteID'])){
	
$AthleteID = $_GET['AthleteID'];

$query = "SELECT * FROM athletes where AthleteID=$AthleteID ";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

	<form id="form1" action='../update/update-athlete.php' method='post'>
	
	<pre>
	AthleteID: $row[AthleteID]
	Last Name: <input type='text' name='LastName' value='$row[LastName]'>
	First Name: <input type='text' name='FirstName' value='$row[FirstName]'>
	Position: <input type='text' name='Position' value='$row[Position]'>
	Academic Level: <input type='text' name='AcademicLevel' value='$row[AcademicLevel]'>
	Graduation Date: <input type='text' name='GraduationDate' value='$row[GraduationDate]'>
	GPA: <input type='text' name='GPA' value='$row[GPA]'>
	Captain: <input type='text' name='Captain' value='$row[Captain]'>
	Phone: <input type='text' name='Phone' value='$row[Phone]'>
	Email: <input type='text' name='Email' value='$row[Email]'>
	NCAAEligible: <input type='text' name='NCAAEligible' value='$row[NCAAEligible]'>
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='AthleteID' value='$row[AthleteID]'>
		<input type='submit' value='UPDATE ATHLETE'>
	</form>
	
_END;

}

}


if(isset($_POST['update'])){
	
	$AthleteID = $_POST['AthleteID'];
	$LastName = $_POST['LastName'];
	$FirstName = $_POST['FirstName'];
	$Position = $_POST['Position'];
	$AcademicLevel = $_POST['AcademicLevel'];
	$GraduationDate = $_POST['GraduationDate'];
	$GPA = $_POST['GPA'];
	$Captain = $_POST['Captain'];
	$Phone = $_POST['Phone'];
	$Email = $_POST['Email'];
	$NCAAEligible = $_POST['NCAAEligible'];
	
	$query = "UPDATE athletes SET LastName='$LastName', FirstName='$FirstName', Position='$Position', AcademicLevel='$AcademicLevel', GraduationDate='$GraduationDate', GPA='$GPA', Captain='$Captain', Phone='$Phone', Email='$Email', NCAAEligible='$NCAAEligible' WHERE AthleteID = $AthleteID ";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/athletes.php");
}
$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>