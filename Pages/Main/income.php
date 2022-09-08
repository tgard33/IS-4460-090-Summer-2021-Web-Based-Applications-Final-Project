<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Income</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Income</h2>

			<?php
			require_once '../components/topnav.php';
			?>
		<div>
		<div class="row">
		  <div class="column" style="background-color:maroon;">
			<a href="../add/add-income.php"><h2>Add Income</h2></a>
		  </div>
		</div>
			
			<h1>Income List</h1>

<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
$query = "SELECT * FROM income";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	<pre>
	IncomeID: <a href='../update/update-income.php?IncomeID=$row[IncomeID]'>$row[IncomeID]</a>
	TeamID: $row[TeamID]
	DonorID: $row[DonorID]
	EventID: $row[EventID]
	Type: $row[Type]
	Amount: $row[Amount]
	Date: $row[Date]
	</pre>
	
	<form action='../delete/delete-income.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='IncomeID' value='$row[IncomeID]'>
		<input type='submit' value='DELETE INCOME'>
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