<?php
include 'client_config.php';
include 'client.php';

$client = new Client($client_id, $client_secret, $redirect_uri);

//Exchange the authorization code for the access token
$response = $client->getInitialAccessToken($_GET['code']);
if ($response) {
	header("Location: http://{$_SERVER['HTTP_HOST']}/");
} else {
	echo('something went wrong');
}
