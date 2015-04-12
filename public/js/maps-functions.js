// Creates a map
function createMap (latitude, longitude, canvasID) {

	// Create map options
	var mapOptions = {
		center: { lat: latitude, lng: longitude },
		zoom: 9
	};

	// Create map
	map = new google.maps.Map(document.getElementById(canvasID), mapOptions);
	console.log("Map made!");

}

// Adds a marker on the map
function addMarker (identifier, name, xCo, yCo, time) {

	// Create marker
	var myLatlng = new google.maps.LatLng(xCo, yCo)
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: name
	});

	// Create the content
	var contentString = '<div>' + '<strong>' + name + '</strong>' + '</div>' + '<div>' + 'Suggested time to spend: ' + time + ' mins' + '</div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});

	// Add listener for the content
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map, marker);
	});

	// Add to array and notify
	markers[identifier] = marker;
	console.log(identifier + " added!");

	console.log("List of markers: ");
	console.log(markers.length);

}

// Removes a marker from the map
function removeMarker (identifier) {

	// Remove marker from map
	markers[identifier].setMap(null);

	// Notify
	console.log(identifier + ' removed!');

	console.log("List of markers: ");
	console.log(markers.length);

}

// Creates the hotel
function createHotel (identifier, name, xCo, yCo) {
	
	// Add to the hotel variable
	hotel = {
		latitude: xCo,
		longitude: yCo,
		'identifier': identifier,
		'name': name
	};

	// Marker icon
	var image = 'img/hotel-icon.png';

	// Create marker
	var myLatlng = new google.maps.LatLng(xCo, yCo)
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: name,
		icon: image
	});

	// Create the content
	var contentString = '<div>' + '<strong>' + name + '</strong>' + '</div>' + '<div>' + 'Your hotel.' + '</div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});

	// Add listener for the content
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map, marker);
	});	

}

// Finds the distance and time and returns an object
// The distance can be accessed by obj.distance.value (meters), obj.distance.text (kilometers)
// The time can be accessed by obj.duration.value (seconds), obj.duration.text (hours and minutes)
function getDistance (xCos, yCos) {

	// Create Latlng objects
	var origin = new google.maps.LatLng(xCo1, yCo1);
	var destination = new google.maps.LatLng(xCo2, yCo2);

	var service = new google.maps.DistanceMatrixService();
	service.getDistanceMatrix({
		origins: [origin],
		destinations: [destination],
		travelMode: google.maps.TravelMode.DRIVING,
		unitSystem: google.maps.UnitSystem.METRIC,
		avoidHighways: false,
		avoidTolls: false
    }, callbackDistance);

}

// function calculateDistances() {
// 	var service = new google.maps.DistanceMatrixService();
// 	service.getDistanceMatrix({
// 		origins: [origin],
// 		destinations: [destination],
// 		travelMode: google.maps.TravelMode.DRIVING,
// 		unitSystem: google.maps.UnitSystem.METRIC,
// 		avoidHighways: false,
// 		avoidTolls: false
//     }, callbackDistance);
// }

// function callbackDistance (response, status) {
// 	if (status != google.maps.DistanceMatrixStatus.OK) {
// 		console.log('Error was: ' + status);
// 	} else {
// 		var origins = response.originAddresses;
// 		var destinations = response.destinationAddresses;
// 		var results = response.rows[0].elements;
// 		results = results[0];

// 		distObj = {
// 			distance: results.distance,
// 			duration: results.duration
// 		};

// 		// return obj;
//     	// console.log(results.distance);
// 	    // console.log(results.duration);
// 	    // console.log(results.duration.value / 60);
//   }
// }

function callbackDistance (response, status) {
	if (status != google.maps.DistanceMatrixStatus.OK) {
		console.log('Error was: ' + status);
	} else {
		var origins = response.originAddresses;
		var destinations = response.destinationAddresses;
		var results = response.rows[0].elements;
		results = results[0];

		dist[0] = results.distance.value;
		dist[1] = results.duration.value;
	  }
}

function generateItinerary (obj) {
	for (var place in obj) {
		visited.push(place);
		if (counter == 1)
			break;
	}

	for (var place in obj) {
		total++;
	}

	for (i = 0; i < visited.length; i++) {
		console.log(visited[i]);
	}

	while (visited.length != total) {

		minimumDistance = 1000000;
		minimumName = "";

		// loop for every element in the object matrix
		for (var place in obj[visited[visited.length - 1]]) {
			
			// Skip if the place is same, or if it has already been traveresed
			if (place == false || visited.indexOf(place) >= 0) {
				console.log('Skipping this: ');
				console.log(place);
				continue;
			}
			console.log('Not skipping this: ');
			console.log(place)
			
			// THIS WORKS: DO NOT TOUCH IT
			console.log(obj[visited[visited.length - 1]][place].distanceValue);


			if (obj[visited[visited.length - 1]][place].distanceValue < minimumDistance) {
				minimumDistance = obj[visited[visited.length - 1]][place].distanceValue;
				minimumName = place;
			}
		}
		visited.push(minimumName);
		distances.push(minimumDistance);

		console.log("\nPrinting visited array: ");
		for (i = 0; i < visited.length; i++) {
			console.log(visited[i]);
		}
		console.log("\nPrinting distances array: ");
		for (i = 0; i < distances.length; i++) {
			console.log(distances[i]);
		}
	}


	var tempCtr = 1;
	console.log("\nHere's your itinerary: ");
	for (i = 0; i < (visited.length - 1); i++) {
		console.log(tempCtr + ". " + visited[i] + " to " + visited[i + 1] + ": " + (distances[i] / 1000) + "km");
		$('#itinerary').append("<p>" + tempCtr + ". " + visited[i] + " to " + visited[i + 1] + ": " + (distances[i] / 1000) + "km" + "</p>");
		tempCtr++;
	}
	$('#itinerary').append("<p>" + tempCtr + ". " + visited[visited.length - 1] + " to " + visited[0] + ": " + (obj[visited[visited.length - 1]][visited[0]].distanceValue / 1000) + "km" + "</p>");

	$('#itinerary-modal').trigger('click');	
}