<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $objectauto = array(
        "kleur" => "rood",
        "snelheid" => 200,
        "zitplaatsen" => 4
    );
    

    if ($objectauto["kleur"] == "rood") {
        echo "Ik ben een rode auto!";
    } else {
        echo "Ik ben een auto met een andere kleur.";
    }
    ?>
</body>
</html>