<?php

$servername = "mysql";
$username = "root";
$password = "password";
$dbname = "CrudDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
