<?php

require_once "connection.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$naam = $_POST['naam'] ?? null;
$email = $_POST['email'] ?? null;
$geboortedatum = $_POST['geboortedatum'] ?? null;
$telefoonnummer = $_POST['telefoonnummer'] ?? null;

// New user
$stmt = $conn->prepare("INSERT INTO Users (naam, email, geboortedatum, telefoonnummer) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $naam, $email, $geboortedatum, $telefoonnummer);

if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
    exit();
}


$user_id = $stmt->insert_id;
$stmt->close();

// New account gekoppeld aan user
$stmt = $conn->prepare("INSERT INTO Account (Users_idUsers) VALUES (?)");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    header("Location: overzicht.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
