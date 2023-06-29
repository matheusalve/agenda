<?php
$servername = "localhost";
$username = "admin";
$password = "M@theus007";
$dbname = "Agenda";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
