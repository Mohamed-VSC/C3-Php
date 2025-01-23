<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Login Form</title>
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <section class="main">
        <h1>Login</h1>

        <?php
        if (isset($_GET['error'])) {
            $error = htmlspecialchars($_GET['error']);
            if ($error === "emptyfields") {
                echo '<p class="error">Fill in all fields!</p>';
            } elseif ($error === "wronginput") {
                echo '<p class="error">Wrong input!</p>';
            } elseif ($error === "nouser") {
                echo '<p class="error">User not found!</p>';
            }
        }
        ?>
        <form action="validation.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit">Submit</button>
            </div>
        </form>
    </section>
</body>

</html>