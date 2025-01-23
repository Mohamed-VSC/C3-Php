<?
/*Indexed arrays:
Dit zijn arrays waarbij de indexen nummers zijn, beginnend bij 0
*/
$fruit = ["Appel", "Banaan", "Peer"];
echo $fruit[0]; // Output: Appel

/*Associative arrays:
In dit type array gebruik je sleutels in plaats van numerieke indexen.
*/
$persoon = [
    "naam" => "Mohamed",
    "leeftijd" => 20,
    "stad" => "Almere"
];
echo $persoon["naam"]; // Output: Mohamed

/*
Multidimensional arrays:
Dit zijn arrays binnen arrays. 
Ze worden gebruikt voor complexe datastructuren.
*/
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
echo $matrix[1][2]; // Output: 6

/*
Je kunt arrays op verschillende manieren maken:
*/
//Met de array() functie:
$dieren = array("Kat", "Hond", "Vis");

//Met korte array-syntax:
$dieren = ["Kat", "Hond", "Vis"];

//count(): Geeft het aantal elementen in een array.
echo count($fruit);

//push(): Voegt een element toe aan het einde van een array.
array_push($fruit, "Druif");

//pop(): Verwijdert het laatste element uit een array.
array_pop($fruit);

//keys(): Haalt alle sleutels uit een associatieve array.
$sleutels = array_keys($persoon);

//values(): Haalt alle waarden uit een array.
$waarden = array_values($persoon);

//foreach-loop: Itereert door een array.
foreach ($fruit as $item) {
    echo $item . "\n";
}


?>
