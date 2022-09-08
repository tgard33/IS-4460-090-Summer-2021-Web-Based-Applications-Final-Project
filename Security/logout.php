<html>
	<head>
		<title>U of U Athletics Department Logout</title>
		<link rel='stylesheet' href='../styles/projectstyles.css'>
	</head>
		<body>
			<?php
			require_once '../pages/components/header.php';
			?>
		  <h2>Logout</h2>
			
				
	</body>
</html>

<?php
require_once '../pages/components/footersub.php';

session_start();

destroy_session_and_data();

function destroy_session_and_data(){
	$_SESSION = array();
	setcookie(session_name(), '', time()-2592000, '/');
	session_destroy();
}

echo "Please login <a href='login.php'> HERE </a>";




?>