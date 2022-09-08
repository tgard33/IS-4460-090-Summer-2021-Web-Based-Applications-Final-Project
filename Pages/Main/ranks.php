<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Ranks</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Ranks</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
		<div>
		<div class="row">
		  <div class="column" style="background-color:maroon;">
			<a href="../add/add-rank.php"><h2>Add Rank</h2></a>
		  </div>
		</div>			
			<h1>Rank List</h1>
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
$query = "SELECT * FROM ranks";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	<pre>
	RankID: <a href='../update/update-ranks.php?RankID=$row[RankID]'>$row[RankID]</a>
	Rank: $row[Ranks]
	Date: $row[Date]
	</pre>
	
	<form action='../delete/delete-rank.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='RankID' value='$row[RankID]'>
		<input type='submit' value='DELETE RANK'>
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
			$result = mysqli_query($conn,"SELECT R.RankID, R.Ranks, R.Date, T.Type AS Team FROM Ranks AS R INNER JOIN Teams AS T ON R.RankID = T.RankID ORDER BY RankID");
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


