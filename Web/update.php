<?php

require_once "connection.php";

$id = $_GET['id'];

if (!$id) {
    die("Error: No user ID provided.");
}


$stmt = $conn->prepare("SELECT * FROM Users WHERE idUsers = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows === 0) {
    die("Error: No user founded");
}

$user = $result->fetch_assoc();
$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Update User</title>
    <style>
        input[type=text],
        input[type=email],
        input[type=date],
        input[type=tel] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>


<body>
    <h1>Update User</h1>
    <div>
        <form action="update_process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user['idUsers'] ?>">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" value="<?php echo $user['naam'] ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>" required>

            <label for="geboortedatum">Geboortedatum:</label>
            <input type="date" id="geboortedatum" name="geboortedatum" value="<?php echo $user['geboortedatum'] ?>" required>

            <label for="telefoonnummer">Telefoonnummer:</label>
            <input type="tel" id="telefoonnummer" name="telefoonnummer" value="<?php echo $user['telefoonnummer'] ?>" required>

            <input type="submit" value="Submit">
        </form>
        <a href="overzicht.php"></a>
    </div>
</body>

</html>