<?php

require_once "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $geboortedatum = $_POST['geboortedatum'];
    $telefoonnummer = $_POST['telefoonnummer'];

    if (empty($naam) || empty($email) || empty($geboortedatum) || empty($telefoonnummer)) {
        header("Location: update.php?id=$id&error=emptyfields");
        exit();
    }

    $stmt = $conn->prepare("UPDATE Users SET naam = ?, email = ?, geboortedatum = ?, telefoonnummer = ? WHERE idUsers = ?");
    $stmt->bind_param("ssssi", $naam, $email, $geboortedatum, $telefoonnummer, $id);

    if ($stmt->execute()) {
        header("Location: overzicht.php");
        echo "User updated successfully";
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Error: No user founded";
}
$conn->close();
