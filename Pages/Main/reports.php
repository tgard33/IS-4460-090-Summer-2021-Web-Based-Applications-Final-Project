<?php
$page_roles = array('Admin');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Reports</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Reports</h2>

			<?php
			require_once '../components/topnav.php';
			?>
			
			<h1>Report List</h1>

				<h1>Income Vs. Cost Teams</h1>		
				
<?php
require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

			//get results from database
			$result = mysqli_query($conn,"SELECT	T.TeamID,
		T.Type AS Team,
		SUM(DISTINCT E.Expenses) AS Event_Expenses,
		SUM(DISTINCT EQ.AnnualCost) AS Annual_Equipment_Cost,
		SUM(DISTINCT EM.AnnualCost) AS Annual_Coach_Cost,
		SUM(DISTINCT I.Amount) AS Total_Income,
		SUM(DISTINCT I.Amount) - (SUM(DISTINCT E.Expenses) + SUM(DISTINCT EQ.AnnualCost) + SUM(DISTINCT EM.AnnualCost)) AS Profit
FROM Teams AS T
LEFT OUTER JOIN Events AS E
  ON T.TeamID = E.TeamID
LEFT OUTER JOIN Ranks AS R
  ON T.RankID = R.RankID
LEFT OUTER JOIN Equipment AS EQ
  ON T.EquipmentID = EQ.EquipmentID
LEFT OUTER JOIN Income AS I
  ON T.TeamID = I.TeamID
LEFT OUTER JOIN TeamEmployees AS TE
  ON T.TeamID = TE.TeamID
LEFT OUTER JOIN Employees AS EM
  ON TE.EmployeeID = EM.EmployeeID
WHERE I.Date >= '2021-01-01' AND E.Date >= '2021-01-01'
GROUP BY 	T.TeamID");
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
		
		<h1>Income Vs. Cost Teams History (2020)</h1>
		
<?php
require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

			//get results from database
			$result = mysqli_query($conn,"SELECT	T.TeamID,
		T.Type AS Team,
		SUM(DISTINCT E.Expenses) AS Event_Expenses,
		SUM(DISTINCT EQ.AnnualCost) AS Annual_Equipment_Cost,
		SUM(DISTINCT EM.AnnualCost) AS Annual_Coach_Cost,
		SUM(DISTINCT I.Amount) AS Total_Income,
		SUM(DISTINCT I.Amount) - (SUM(DISTINCT E.Expenses) + SUM(DISTINCT EQ.AnnualCost) + SUM(DISTINCT EM.AnnualCost)) AS Profit
FROM Teams AS T
LEFT OUTER JOIN Events AS E
  ON T.TeamID = E.TeamID
LEFT OUTER JOIN Ranks AS R
  ON T.RankID = R.RankID
LEFT OUTER JOIN Equipment AS EQ
  ON T.EquipmentID = EQ.EquipmentID
LEFT OUTER JOIN Income AS I
  ON T.TeamID = I.TeamID
LEFT OUTER JOIN TeamEmployees AS TE
  ON T.TeamID = TE.TeamID
LEFT OUTER JOIN Employees AS EM
  ON TE.EmployeeID = EM.EmployeeID
WHERE I.Date BETWEEN '2020-01-01' AND '2020-12-30' AND E.Date BETWEEN '2020-01-01' AND '2020-12-30'
GROUP BY 	T.TeamID");
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
		
		<h1>Income Vs. Cost Teams History (2019)</h1>
		
<?php
require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

			//get results from database
			$result = mysqli_query($conn,"SELECT	T.TeamID,
		T.Type AS Team,
		SUM(DISTINCT E.Expenses) AS Event_Expenses,
		SUM(DISTINCT EQ.AnnualCost) AS Annual_Equipment_Cost,
		SUM(DISTINCT EM.AnnualCost) AS Annual_Coach_Cost,
		SUM(DISTINCT I.Amount) AS Total_Income,
		SUM(DISTINCT I.Amount) - (SUM(DISTINCT E.Expenses) + SUM(DISTINCT EQ.AnnualCost) + SUM(DISTINCT EM.AnnualCost)) AS Profit
FROM Teams AS T
LEFT OUTER JOIN Events AS E
  ON T.TeamID = E.TeamID
LEFT OUTER JOIN Ranks AS R
  ON T.RankID = R.RankID
LEFT OUTER JOIN Equipment AS EQ
  ON T.EquipmentID = EQ.EquipmentID
LEFT OUTER JOIN Income AS I
  ON T.TeamID = I.TeamID
LEFT OUTER JOIN TeamEmployees AS TE
  ON T.TeamID = TE.TeamID
LEFT OUTER JOIN Employees AS EM
  ON TE.EmployeeID = EM.EmployeeID
WHERE I.Date BETWEEN '2019-01-01' AND '2019-12-30' AND E.Date BETWEEN '2019-01-01' AND '2019-12-30'
GROUP BY 	T.TeamID");
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

		<h1>Income Vs. Cost Teams History (OVERALL)</h1>
		
<?php
require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

			//get results from database
			$result = mysqli_query($conn,"SELECT	T.TeamID,
		T.Type AS Team,
		SUM(DISTINCT E.Expenses) AS Total_Event_Expenses,
		SUM(DISTINCT EQ.AnnualCost) AS Annual_Equipment_Cost,
		SUM(DISTINCT EM.AnnualCost) AS Annual_Coach_Cost,
		SUM(DISTINCT I.Amount) AS Total_Income,
		SUM(DISTINCT I.Amount) - (SUM(DISTINCT E.Expenses) + SUM(DISTINCT EQ.AnnualCost) + SUM(DISTINCT EM.AnnualCost)) AS Profit
FROM Teams AS T
LEFT OUTER JOIN Events AS E
  ON T.TeamID = E.TeamID
LEFT OUTER JOIN Ranks AS R
  ON T.RankID = R.RankID
LEFT OUTER JOIN Equipment AS EQ
  ON T.EquipmentID = EQ.EquipmentID
LEFT OUTER JOIN Income AS I
  ON T.TeamID = I.TeamID
LEFT OUTER JOIN TeamEmployees AS TE
  ON T.TeamID = TE.TeamID
LEFT OUTER JOIN Employees AS EM
  ON TE.EmployeeID = EM.EmployeeID
GROUP BY 	T.TeamID");
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


