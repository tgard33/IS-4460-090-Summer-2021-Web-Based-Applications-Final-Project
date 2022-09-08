<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Scholarships</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Scholarships</h2>

			<?php
			require_once '../components/topnav.php';
			?>
		<div>
		<div class="row">
		  <div class="column" style="background-color:maroon;">
			<a href="../add/add-scholarship.php"><h2>Add Scholarship</h2></a>
		  </div>
		</div>
			<h1>Scholarship List</h1>	
				
	
	
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
$query = "SELECT * FROM scholarships";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	<pre>
	ScholarshipID: <a href='../update/update-scholarship.php?ScholarshipID=$row[ScholarshipID]'>$row[ScholarshipID]</a>
	AthleteID: $row[AthleteID]
	DonorID: $row[DonorID]
	Amount: $row[Amount]
	Date: $row[Date]
	Type: $row[Type]
	Requirements: $row[Requirements]
	Status: $row[Status]
	</pre>
	
	<form action='../delete/delete-scholarship.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='ScholarshipID' value='$row[ScholarshipID]'>
		<input type='submit' value='DELETE SCHOLARSHIP'>
	</form>
	
_END;

}

$conn->close();

?>		

<?php
require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

			//get results from database
			$result = mysqli_query($conn,"SELECT 		S.ScholarshipID,
														CONCAT( D.FirstName, ' ', D.Lastname) AS Donor, 
														D.Status, 
														'------->' AS DonatedTo, 
														A.AthleteID, 
														CONCAT( A.FirstName, ' ', A.Lastname) AS Athlete, 
														S.Amount, 
														S.Date, 
														S.Type, 
														S.Requirements, 
														S.Status
														FROM donors AS D 
														INNER JOIN Scholarships AS S 
														  ON S.DonorID = D.DonorID 
														INNER JOIN Athletes AS A 
														  ON A.AthleteID = S.AthleteID");
			$all_property = array();  //declare an array for saving property

			//showing property
			echo '<table class="data-table">
					<tr class="data-heading">';  //initialize table tag
			while ($property = mysqli_fetch_field($result)) {
				echo '<td>' . $property->name . '</td>';  //get field name for header
				array_push($all_property, $property->name);  //save those to array
			}
			echo '</tr>'; //end tr tag

			//showing all data
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				foreach ($all_property as $item) {
					echo '<td>' . $row[$item] . '</td>'; //get items using property value
				}
				echo '</tr>';
			}
			echo "</table>";


$conn->close();

?>	
	</body>
</html>

<?php
require_once '../components/footer.php';
?>


