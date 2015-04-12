<!DOCTYPE html>
<html>
<head>
	<title>Itinerate!</title>
	<link rel="stylesheet" type="text/css" href="css/foundation.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<style type="text/css">

	.city {
		font-size: 50px;
	}

	</style>
</head>
<body>

<nav class="top-bar" data-topbar-role="navigation">
	<ul class="title-area">
		<li class="name">
			<h1><a href="#"><img src="img/logo.png" style="max-height: 45px; width: auto">Itinerate</a></h1>
		</li>
		<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	</ul>

	<section class="top-bar-section">
		<ul class="right">
			<li class="active"><a href="places.php">Places</a></li>
			<li><a href="changepassword.php">Change Password</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</section>
</nav>

<div class="container">
	
<div class="row">
	<div class="medium-12 columns">
		<h1 style="text-align: center;">Select a hotel from the list below:</h1>
	</div>
</div>

<?php foreach ($hotels as $hotel): ?>

<div class="row" style="height: 30px"></div>
<a href="goa.php?hotel=<?php echo $hotel["id"]; ?>" class="city">
	<div class="row city">
		<div class="medium-12 columns" style="text-align: center;">
		<p class="city-name"><?php echo $hotel["name"]; ?></p>
		</div>
	</div>
</a>

<?php endforeach; ?>

</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/foundation.topbar.js"></script>
</body>
</html>