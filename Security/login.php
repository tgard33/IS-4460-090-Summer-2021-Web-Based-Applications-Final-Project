<html>
	<head>
		<title>U of U Athletics Department</title>
		<link rel='stylesheet' href='../styles/projectstyles.css'>
	</head>
	<body>
			<?php
			require_once '../pages/components/header.php';
			require_once 'sanitization.php';
			?>
		<form id="form1" action='login.php'  method='post' >
			User Name: <br>
			<input type='text' name='username'><br>
			Password: <br>
			<input type='text' name='password'><br><br>
			<input type='submit' value='LOGIN'>
		
		</form>		
	</body>
</html>

<?php

require_once '../database/dblogin.php';
require_once 'User.php';


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	//Get values from login screen
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	//get password from DB w/ SQL
	$query = "SELECT password FROM users WHERE username = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$result->data_seek($j); 
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}
	
	//Compare passwords
	if(password_verify($tmp_password,$passwordFromDB))
	{
		echo "successful login<br>";
		
		$user = new User($tmp_username);

		session_start();
		$_SESSION['user'] = $user;
		
		header("Location: ../pages/main/home.php");
	}
	else
	{
		echo "login error<br>";
	}	
	
}

$conn->close();



require_once '../pages/components/footersub.php';


?>