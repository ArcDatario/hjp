<?php

$servername = "localhost";
$username = "u807401062_hjp";
$password = "0~BcEh|C";
$dbname = "u807401062_hjp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 ?>
