<?php
$page_roles = array('Admin', 'Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Add Rank</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
	<body>

			<?php
			require_once '../components/header.php';
			?>
		  <h2>Add Rank</h2>

			<?php
			require_once '../components/topnavsub.php';
			?>
			
		<form id="form1" method='post' action='../add/add-rank.php'>
			<pre>
				Rank: <input type='text' name='Ranks'>
				Date: <input type='text' name='Date'>
				<input type='submit' value='Add Rank'>
			</pre>
		</form>	
	</body>
</html>
<?php

require_once '../../database/DBlogin.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['Ranks'])){
	
	$Ranks = $_POST['Ranks'];
	$Date = $_POST['Date'];
	
	$query = "INSERT INTO ranks (Ranks, Date) VALUES ('$Ranks', '$Date')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: ../main/ranks.php");
}

$conn->close();

?>
		
<?php
require_once '../components/footer.php';
?>