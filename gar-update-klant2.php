<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Jim Beekenkamp">
    <meta charset="UTF-8">
    <title>gar-update-klant2.php</title>
</head>
<body>
<h1>garage update klant 2</h1>
<p>Dit formulier wordt gebruikt om klantgegevens te wijzigen in de tabel klant van de database garage.</p>
<?php
//klantid uit het formulier halen
$klantid = $_POST["klantidvak"];

//klantgegevens uit de tabel halen
require_once "gar-connect.php";

$klanten = $conn->prepare("SELECT klantid, klantnaam, klantadres, klantpostcode, klantplaats FROM klant WHERE klantid = :klantid");
$klanten->execute(["klantid" => $klantid]);

//klantgegevens in een nieuw formulier laten zien
echo "<form action='gar-update-klant3.php' method='post'>";
foreach ($klanten as $klant){
    //klantid mag niet gewijzigd worden
    echo "klantid:" . $klant["klantid"];
    echo "<input type='hidden' name='klantidvak' ";
    echo "value=' " . $klant["klantid"] . " '><br>";

    echo "klantnaam: <input type='text' ";
    echo "name = 'klantnaamvak' ";
    echo "value = '" .$klant["klantnaam"]."' ";
    echo " > <br>";

    echo "klantadres: <input type='text' ";
    echo "name = 'klantadresvak' ";
    echo "value = '" .$klant["klantadres"]."' ";
    echo " > <br>";

    echo "klantpostcode: <input type='text' ";
    echo "name = 'klantpostcodevak' ";
    echo "value = '" .$klant["klantpostcode"]."' ";
    echo " > <br>";

    echo "klantplaats: <input type='text' ";
    echo "name = 'klantplaatsvak' ";
    echo "value = '" .$klant["klantplaats"]."' ";
    echo " > <br>";

}
echo "<input type='submit'>";
echo "</form>";
?>

</body>
</html>