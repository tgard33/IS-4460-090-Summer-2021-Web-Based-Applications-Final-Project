<?php
$page_roles = array('Admin','Employee');
require_once '../../security/checksession.php';
?>

<html>
	<head>
		<title>U of U Athletics Department Home</title>
		<link rel='stylesheet' href='../../styles/projectstyles.css'>
	</head>
		<body>
			<?php
			require_once '../components/header.php';
			?>
		  <h2>Home</h2>

			<?php
			require_once '../components/topnav.php';
			?>
				
		<div>
		<div class="row">
		  <div class="column" style="background-color:maroon;">
			<a href="../../security/logout.php"><h2>Logout</h2></a>
		  </div>
		</div>
				
	</body>
</html>

<?php
require_once '../components/footer.php';
?>