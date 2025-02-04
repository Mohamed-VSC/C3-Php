<?php

require_once "connection.php";

$id = $_GET['id'];

if (!$id) {
    die("Error: No user ID provided.");
}


if ($id) {
    $stmt = $conn->prepare("DELETE FROM Account WHERE Users_idUsers = ?");

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: overzicht.php");
        echo "User deleted successfully";
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Error: No user founded";
}
