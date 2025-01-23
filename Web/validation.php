<?php
// Start output buffering
ob_start();

session_start();
require_once "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        header("Location: login.php?error=emptyfields");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM Account WHERE user_naam = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        header("Location: login.php?error=nouser");
        exit();
    }

    $user = $result->fetch_assoc();

    if ($password === $user['wachtwoord']) {
        // Store session information
        $_SESSION['account_id'] = $user['idAccount'];
        $_SESSION['user_id'] = $user['Users_idUsers'];
        $_SESSION['username'] = $user['user_naam'];
        header("Location: overzicht.php");
        exit();
    } else {
        header("Location: login.php?error=wronginput");
        exit();
    }

    $stmt->close();
    $conn->close();
}

// End output buffering and flush the output
ob_end_flush();
