<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $mijnGegevens = array(
        "naam" => "Mohamed Ali",
        "geboortedatum" => "1 juli 2004",
        "woonplaats" => "Almere"
    );

    echo "Mijn naam is " . $mijnGegevens['naam'] . ".<br>";
    echo "Ik ben geboren op " . $mijnGegevens['geboortedatum'] . ".<br>";
    echo "En woon in " . $mijnGegevens['woonplaats'] . ".";
    ?>

</body>
</html>