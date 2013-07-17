<?php

	require_once '../lib/Citibike/Client.php';
	require_once '../lib/Citibike/RequestException.php';
	require_once '../lib/Citibike/RequestHandler.php';
	require_once '../vendor/autoload.php';

	// Instantiate Citibike Client
	$client = new Citibike\Client();

	echo "Getting Stations\n";
	foreach ($client->getStations()->results as $station) {
	    echo "ID: " . $station->id . "\n";
	    echo "Label: " . $station->label . "\n";
	    echo "Latitude: " . $station->latitude . "\n";
	    echo "Longitude: " . $station->longitude . "\n";
	    echo "Available Bikes: " . $station->availableBikes . "\n";
	    echo "Available Docks: " . $station->availableDocks . "\n";
	}

?>