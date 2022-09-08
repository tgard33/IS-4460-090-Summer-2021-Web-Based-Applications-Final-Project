<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Update Scholarship</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Update Scholarship</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
if(isset($_GET['ScholarshipID'])){
	
$ScholarshipID = $_GET['ScholarshipID'];

$query = "SELECT * FROM scholarships where ScholarshipID=$ScholarshipID ";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

	<form id="form1" action='../update/update-scholarship.php' method='post'>
	
	<pre>
	ScholarshipID: $row[ScholarshipID]
	AthleteID: <input type='text' name='AthleteID' value='$row[AthleteID]'>
	DonorID: <input type='text' name='DonorID' value='$row[DonorID]'>
	Amount: <input type='text' name='Amount' value='$row[Amount]'>
	Date: <input type='text' name='Date' value='$row[Date]'>
	Type: <input type='text' name='Type' value='$row[Type]'>
	Requirements: <input type='text' name='Requirements' value='$row[Requirements]'>
	Status: <input type='text' name='Status' value='$row[Status]'>
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='ScholarshipID' value='$row[ScholarshipID]'>
		<input type='submit' value='UPDATE SCHOLARSHIP'>
	</form>
	
_END;

}

}


if(isset($_POST['update'])){
	
	$ScholarshipID = $_POST['ScholarshipID'];
	$AthleteID = $_POST['AthleteID'];
	$DonorID = $_POST['DonorID'];
	$Amount = $_POST['Amount'];
	$Date = $_POST['Date'];
	$Type = $_POST['Type'];
	$Requirements = $_POST['Requirements'];
	$Status = $_POST['Status'];
	
	$query = "UPDATE scholarships SET AthleteID='$AthleteID', DonorID='$DonorID', Amount='$Amount', Date='$Date', Type='$Type', Requirements='$Requirements', Status='$Status' WHERE ScholarshipID = $ScholarshipID ";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/scholarships.php");
}
$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>