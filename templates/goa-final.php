<!DOCTYPE html>
<html>
<head>
	<title>Itinerate: Goa</title>
	<link rel="stylesheet" type="text/css" href="css/foundation.css">
	<link rel="stylesheet" type="text/css" href="css/goa.css">
	<!-- INSERT SCRIPt TAG FOR MAPS API (JS) HERE -->
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/foundation.js"></script>
    <script type="text/javascript" src="js/foundation.reveal.js"></script>
	<script type="text/javascript" src="js/foundation.topbar.js"></script>
    <script type="text/javascript" src="js/maps-globals.js"></script>
	<script type="text/javascript" src="js/maps-functions.js"></script>
	<script type="text/javascript" src="js/goa-map-init.js"></script>
	<script type="text/javascript" src="js/json3.min.js"></script>
	<script type="text/javascript" src="js/gmaps-bigdistancematrix.js"></script>
	<script type="text/javascript">
		function initialize () {

			$(document).foundation();

			createMap(15.4989, 73.8278, 'map-canvas');
			createHotel($('#hotelData').data('identifier'), $('#hotelData').data('name'), $('#hotelData').data('xco'), $('#hotelData').data('yco'));

			// Add events to buttons on the left to add Markers to the map
			var $places = $('.place');
			$places.each(function(i) {
				var $this = $(this);
				$this.on('click', function() {
					console.log('Name: ' + $this.data('name'));
					if ($this.data('added') == false) {
						$this.data('added', true);
						$this.addClass('added');

						// Add marker
						addMarker($this.data('identifier'), $this.data('name'), $this.data('xco'), $this.data('yco'), $this.data('time'));
					} else {
						$this.data('added', false);
						$this.removeClass('added');

						// Remove marker
						removeMarker($this.data('identifier'));
					}
					console.log('Added? ' + $this.data('added'));
				});
			});


			// What happens when Generate Itinerary is clicked
			$('.generateBtn').on('click', function() {
				
				// Add hotel to Route_Points
				Route_Points[$('#hotelData').data('name')] = [$('#hotelData').data('xco'), $('#hotelData').data('yco')];

				var $buttons = $('.place');
				$places.each(function(i) {
					var $this = $(this);

					// Check if 'data-added' is true
					if ($this.data('added') == true) {
						// Add to Route_Points
						Route_Points[$this.data('name')] = [$this.data('xco'), $this.data('yco')];
					}
				});
				console.log(Route_Points);

				Route_DistanceMatrix.init(Route_Points,"console_route_matrix", 10);
				Route_DistanceMatrix.startRouting(100);
				setTimeout(function() {
					var obj = JSON.parse(Route_DistanceMatrix.exportResults(true));
					console.log(obj);
					$("#jsonStorage").html(obj);
					generateItinerary(obj);
				}, 2000);
			});

		}


		google.maps.event.addDomListener(window, 'load', initialize);
	</script>

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
<div id="hotelData" class="hidden" <?php echo "data-identifier=\"" . $hotel["identifier"] . "\" data-name=\"" . $hotel["name"] . "\" data-xco=\"" . $hotel["x-co"] . "\" data-yco=\"" . $hotel["y-co"] . "\"" ?>></div>
<div id="map-canvas" class="inline"></div>
<div class="data inline">
	<?php $counter = 1; ?>
	<?php foreach ($attractions as $attraction): ?>
	<div class="place" data-added="false" data-identifier="<?php echo $attraction["identifier"]; ?>" data-time="<?php echo $attraction["time"]; ?>" data-name="<?php echo $attraction["name"]; ?>" data-xco="<?php echo $attraction["x-co"]; ?>" data-yco="<?php echo $attraction["y-co"]; ?>">
		<?php echo $counter; $counter++; ?>. <?php echo $attraction["name"] ?>
	</div>
	<?php endforeach; ?>
	<div class="generateBtn">Generate Itinerary</div>
	<div id="jsonStorage" class="hidden"></div>

<a href="#" data-reveal-id="myModal" id="itinerary-modal" class="hidden">Itinerary Modal</a>
	<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  	<h2 id="modalTitle">Here's your itinerary: </h2>
  	<div id="itinerary"></div>
  	<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

</div>


</body>
</html>
