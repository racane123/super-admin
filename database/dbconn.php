<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'superadmin';
$port = 3306;

$conn = mysqli_connect($host, $username, $password, $database, $port);

if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());
}

