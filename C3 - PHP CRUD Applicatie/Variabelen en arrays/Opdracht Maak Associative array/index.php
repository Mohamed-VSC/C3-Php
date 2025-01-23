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
        "kleur" => "geel",
        "snelheid" => 200,
        "zitplaatsen" => 4
    );

    echo "Ik heb een auto die is " .$objectauto['kleur'].  ". ";
    echo "Hij rijdt " .$objectauto['snelheid']. " km per uur ";
    echo "en de auto biedt plaats voor " .$objectauto['zitplaatsen']. " personen.";
    ?>

</body>
</html>