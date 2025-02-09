<?php
// Start the session at the very beginning
session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

require_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Overview</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      margin: 20px 0;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    a {
      color: #4CAF50;
      text-decoration: none;
    }
  </style>
  <script>
    let isNavigatingInternally = false;

    // Detecteert wanneer de gebruiker op een interne link klikt
    document.addEventListener("click", function(event) {
      let target = event.target.closest("a");
      if (target && target.href.startsWith(window.location.origin)) {
        isNavigatingInternally = true;
      }
    });

    // Detecteert wanneer een formulier wordt verzonden
    document.addEventListener("submit", function() {
      isNavigatingInternally = true;
    });

    // Alleen uitloggen als de gebruiker de website verlaat
    window.addEventListener("beforeunload", function(event) {
      if (!isNavigatingInternally) {
        navigator.sendBeacon("logout.php");
      }
    });
  </script>


</head>

<body>
  <h1>User Overview</h1>
  <table>
    <tr>
      <th>idUsers</th>
      <th>naam</th>
      <th>email</th>
      <th>geboortedatum</th>
      <th>telefoonnummer</th>
    </tr>

    <?php
    // Prepare and execute the query to fetch users
    $stmt = $conn->prepare("
            SELECT Users.idUsers, Users.naam, Users.email, Users.geboortedatum, Users.telefoonnummer
            FROM Users 
            JOIN Account ON Users.idUsers = Account.Users_idUsers
        ");
    if (!$stmt) {
      echo "Error: " . $conn->error;
      exit();
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if (isset($_GET['message'])) {
      $message = htmlspecialchars($_GET['message']);
      if ($message === "updateSuccess") {
        echo '<p class="success">User updated successfully!</p>';
      } elseif ($message === "deleteSuccess") {
        echo '<p class="success">User deleted successfully!</p>';
      }
    }

    if ($result->num_rows === 0) {
      echo "<tr><td colspan='6'>No users found.</td></tr>";
    } else {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                        <td>" . htmlspecialchars($row['idUsers']) . "</td>
                        <td>" . htmlspecialchars($row['naam']) . "</td>
                        <td>" . htmlspecialchars($row['email']) . "</td>
                        <td>" . htmlspecialchars($row['geboortedatum']) . "</td>
                        <td>" . htmlspecialchars($row['telefoonnummer']) . "</td>
                        <td>
                            <a href='create.php?id=" . htmlspecialchars($row['idUsers']) . "'>Create</a>
                            <a href='update.php?id=" . htmlspecialchars($row['idUsers']) . "'>Update</a>
                            <a href='delete.php?id=" . htmlspecialchars($row['idUsers']) . "'>Delete</a>
                        </td> 
                      </tr>";
      }
    }

    $stmt->close();
    $conn->close();
    ?>
  </table>
</body>

</html>