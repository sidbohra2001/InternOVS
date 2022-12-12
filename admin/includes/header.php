<?php
ob_start();
session_start();
if (isset($_SESSION['admin_is_logged_in'])) {
	$name = $_SESSION['admin_data']['name'];
	$pimage = $_SESSION['admin_data']['pimage'];
} else {
	header("Location: admin_logout.php");
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://kit.fontawesome.com/320685ab56.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/bootstrap1.css">
	<link rel="icon" type="image/ico" href="assets/images/geulogo.png" />
	<title>Online Voting System - Admin Portal</title>
	<link rel="stylesheet" href="css/nav.css">
	<script src="js/nav.js"></script>
</head>
<body style="font-family: Verdana, Geneva, Tahoma, sans-serif">
	<div id="main">
		<nav class="navbar navbar-expand-lg">
			<a class="navbar-brand ml-3" href="adminpage.php">Online Voting System | Admin Portal</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown"><?php echo $pimage ?></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="adminpage.php">
                            <?php echo $name ?>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="admin_logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>