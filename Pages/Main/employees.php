<?php
$page_roles = array('Admin');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Employees</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Employees</h2>

			<?php
			require_once '../components/topnav.php';
			?>
		<div>
		<div class="row">
		  <div class="column" style="background-color:maroon;">
			<a href="../add/add-employee.php"><h2>Add Employee</h2></a>
		  </div>
		</div>
			
			<h1>Employee List</h1>

<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
	
$query = "SELECT * FROM employees";
	
$result = $conn->query($query);
if(!$result) die($conn->error);
	
$rows = $result->num_rows;

for($j=0; $j<$rows; ++$j)
{
	//$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_ASSOC);

echo <<<_END
	<pre>
	EmployeeID: <a href='../update/update-employee.php?EmployeeID=$row[EmployeeID]'>$row[EmployeeID]</a>
	Last Name: $row[LastName]
	First Name: $row[FirstName]
	Title: $row[Title]
	Street Address: $row[StreetAddress]
	City: $row[City]
	State: $row[State]
	Zip Code: $row[ZipCode]
	Phone Number: $row[Phone]
	Email: $row[Email]
	Start Date: $row[StartDate]
	End Date: $row[EndDate]
	Type: $row[Type]
	Salary: $row[AnnualCost]
	</pre>
	
	<form action='../delete/delete-employee.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='EmployeeID' value='$row[EmployeeID]'>
		<input type='submit' value='DELETE EMPLOYEE'>
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