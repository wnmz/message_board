<?php
$servername = "127.0.0.1";
$username = "test";
$password = "pas123";
$port = 3306;
$dbname = "message_board";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>