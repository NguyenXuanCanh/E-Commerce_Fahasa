<?php
$servername = "localhost";
$username = "root";
$password = '';
$database = "fahasa";
$conn = mysqli_connect($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
