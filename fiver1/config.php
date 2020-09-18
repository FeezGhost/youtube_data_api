<?php
require 'googleapi/vendor/autoload.php';
$dev_key = 'AIzaSyCFnSmRaNp-0fxq0uem0Hr8nIEUxZSuLJ0';
$client = new Google_Client();
$client->setDeveloperKey($dev_key);
$youtube = new Google_Service_YouTube($client);

?>