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
        "snelheid" => 20,
        "zitplaatsen" => 4
    );

    if ($objectauto["snelheid"] == 0) {
        echo "Deze auto rijdt niet.";
    } elseif ($objectauto["snelheid"] > 0 && $objectauto["snelheid"] <= 50) {
        echo "Dit is een langzame auto.";
    } elseif ($objectauto["snelheid"] > 50 && $objectauto["snelheid"] <= 150) {
        echo "Dit is een normale auto.";
    } else {
        echo "Dit is een snelle auto.";
    }
?>
</body>
</html>