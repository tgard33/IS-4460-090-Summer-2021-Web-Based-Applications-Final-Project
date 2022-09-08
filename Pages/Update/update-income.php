<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Update Income</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Update Income</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
if(isset($_GET['IncomeID'])){
	
$IncomeID = $_GET['IncomeID'];

$query = "SELECT * FROM income where IncomeID=$IncomeID ";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

	<form id="form1" action='../update/update-income.php' method='post'>
	
	<pre>
	IncomeID: $row[IncomeID]
	TeamID: <input type='text' name='TeamID' value='$row[TeamID]'>
	DonorID: <input type='text' name='DonorID' value='$row[DonorID]'>
	EventID: <input type='text' name='EventID' value='$row[EventID]'>
	Type: <input type='text' name='Type' value='$row[Type]'>
	Amount: <input type='text' name='Amount' value='$row[Amount]'>
	Date: <input type='text' name='Date' value='$row[Date]'>
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='IncomeID' value='$row[IncomeID]'>
		<input type='submit' value='UPDATE INCOME'>
	</form>
	
_END;

}

}


if(isset($_POST['update'])){
	
	$IncomeID = $_POST['IncomeID'];
	$TeamID = $_POST['TeamID'];
	$DonorID = $_POST['DonorID'];
	$EventID = $_POST['EventID'];
	$Type = $_POST['Type'];
	$Amount = $_POST['Amount'];
	$Date = $_POST['Date'];
	
	$query = "UPDATE income SET TeamID='$TeamID', DonorID='$DonorID', EventID='$EventID', Type='$Type', Amount='$Amount', Date='$Date' WHERE IncomeID = $IncomeID ";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/income.php");
}
$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>