<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Jim Beekenkamp">
    <meta charset="UTF-8">
    <title>gar-read-klant.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Alle klanten</h1>
<!--<p>Dit zijn alle gegevens uit de tabel klanten van de database garage.</p>-->

<?php
//tabel uitlezen en netjes afdrukken
require_once "gar-connect.php";

$sql = $conn->prepare("SELECT klantid, klantnaam, klantadres, klantpostcode, klantplaats FROM klant");

$sql->execute();

echo "<table>";
echo "<tr>";
echo "<th>" . "KlantID" . "</th>";
echo "<th>" . "Naam" . "</th>";
echo "<th>" . "Adres" . "</th>";
echo "<th>" . "Postcode" . "</th>";
echo "<th>" . "Plaats" . "</th>";
echo "</tr>";
foreach ($sql as $rij){
    echo "<tr>";
    echo "<td>" . $rij["klantid"] . "</td>";
    echo "<td>" . $rij["klantnaam"] . "</td>";
    echo "<td>" . $rij["klantadres"] . "</td>";
    echo "<td>" . $rij["klantpostcode"] . "</td>";
    echo "<td>" . $rij["klantplaats"] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> Terug naar het menu </a>";
?>

</body>
</html>