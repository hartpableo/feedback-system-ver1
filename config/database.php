<?php

define('DB_HOST','localhost');
define('DB_USER','hart01');
define('DB_PASS','12345');
define('DB_NAME','feedbacksystem060522');

// Connect To Database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check Connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// echo 'Connected Successfully!';