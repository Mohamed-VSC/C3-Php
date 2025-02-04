<form action="create_process.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Enter your Username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter your Password" required>

    <label for="naam">naam:</label>
    <input type="text" id="naam" name="naam" placeholder="Enter your Name" required>

    <label for="email">email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your Email" required>

    <label for="geboortedatum">geboortedatum:</label>
    <input type="date" id="geboortedatum" name="geboortedatum" required>

    <label for="telefoonnummer">telefoonnummer:</label>
    <input type="tel" id="telefoonnummer" name="telefoonnummer" placeholder="Enter your Phone Number" required>

    <div class="wrap">
        <button type="submit">Submit</button>
    </div>