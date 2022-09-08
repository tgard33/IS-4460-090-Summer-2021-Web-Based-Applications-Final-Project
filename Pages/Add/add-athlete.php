<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Add Athlete</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Add Athlete</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
		<form id="form1" method='post' action='../add/add-athlete.php'>
			<pre>
				Last Name: <input type='text' name='LastName'>
				First Name: <input type='text' name='FirstName'>
				Position: <input type='text' name='Position'>
				Academic Level: <input type='text' name='AcademicLevel'>
				Graduation Date: <input type='text' name='GraduationDate'>
				GPA: <input type='text' name='GPA'>
				Captain: <input type='text' name='Captain'>
				Phone: <input type='text' name='Phone'>
				Email: <input type='text' name='Email'>
				NCAA Eligible: <input type='text' name='NCAAEligible'>
				<input type='submit' value='Add Athlete'>
			</pre>
		</form>	
	</body>
</html>
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['LastName'])){
	
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
	
	$query = "INSERT INTO athletes (LastName, FirstName, Position, AcademicLevel, GraduationDate, GPA, Captain, Phone, Email, NCAAEligible) VALUES ('$LastName', '$FirstName','$Position', '$AcademicLevel', '$GraduationDate', '$GPA', '$Captain', '$Phone', '$Email', '$NCAAEligible')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/athletes.php");
}

$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>