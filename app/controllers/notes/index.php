<?php

use Config\Config;
use Database\Database;

$heading = 'Notes';
$config = Config::getConfig();
$currentUserId = 1;

$queryParams = [
    'user' => $currentUserId
];

$statement = 'SELECT * FROM notes where user_id = :user '; // write a sql query

$fetchOptions = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // fetch option
];

$db = new Database($config['database'], $statement, $fetchOptions);
$connection = $db->query($queryParams);

$notes = $connection->get(); // fetching all results in associative array format

return view('notes/index', compact('heading', 'notes'));
