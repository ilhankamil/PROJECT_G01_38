<?php

$localhost = "localhost";
$username = "proadmin38";
$password = "proadmin38";
$database = "proonebadmintoncentre"; 

$mysqli = new mysqli(hostname: $localhost,
                     username: $username,
                     password: $password,
                     database: $database);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;