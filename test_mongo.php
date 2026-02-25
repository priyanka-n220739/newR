<?php
require 'vendor/autoload.php'; // Composer autoload

$client = new MongoDB\Client("mongodb://localhost:27017");

$dbs = $client->listDatabases();

echo "MongoDB is working! Databases:\n";
foreach ($dbs as $db) {
    echo "- " . $db->getName() . "\n";
}