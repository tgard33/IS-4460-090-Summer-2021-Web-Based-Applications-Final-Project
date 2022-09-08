<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Update Rank</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Update Rank</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
if(isset($_GET['RankID'])){
	
$RankID = $_GET['RankID'];

$query = "SELECT * FROM ranks where RankID=$RankID";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END

	<form id="form1" action='../update/update-ranks.php' method='post'>
	
	<pre>
	RankID: $row[RankID]
	Rank: <input type='text' name='Ranks' value='$row[Ranks]'>
	Date: <input type='text' name='Date' value='$row[Date]'>
	</pre>
	
	
		<input type='hidden' name='update' value='yes'>
		<input type='hidden' name='RankID' value='$row[RankID]'>
		<input type='submit' value='UPDATE RANK'>
	</form>
	
_END;

}

}


if(isset($_POST['update'])){
	
	$RankID = $_POST['RankID'];
	$Ranks = $_POST['Ranks'];
	$Date = $_POST['Date'];
	
	$query = "UPDATE ranks SET Ranks='$Ranks', Date='$Date' WHERE RankID = $RankID";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/ranks.php");
}
$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>