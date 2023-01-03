<?php

$heading = 'Notes';
$config = Config::env();


$queryParams = [
    'id' => $_GET['id'] ?? null
];

$statement = 'SELECT * FROM notes'; // write a sql query

$fetchOptions = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // fetch option
];

$db = new Database($config['database'], $statement, $fetchOptions);
$connection = $db->query($queryParams);

$notes = $connection->fetchAll(); // fetching all results in associative array format

require 'views/notes.view.php';