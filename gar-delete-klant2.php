<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Jim Beekenkamp">
    <meta charset="UTF-8">
    <title>gar-delete-klant2.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>garage delet klant 2</h1>
<!--<p>Op klantid gegevens zoeken uit de tabel klanten van de database garage zodat ze verwijderd kunnen worden.</p>-->
<?php
// klantid uit het formulier halen
$klantid = $_POST["klantidvak"];

//klantgegeven uit de tabel halen
require_once "gar-connect.php";

$klanten = $conn->prepare("SELECT klantid, klantnaam, klantadres, klantpostcode, klantplaats FROM klant WHERE klantid = :klantid");
$klanten->execute(["klantid" => $klantid]);

//klantgegevens laten zien
echo "<table>";
echo "<tr>";
echo "<th>" . "KlantID" . "</th>";
echo "<th>" . "Naam" . "</th>";
echo "<th>" . "Adres" . "</th>";
echo "<th>" . "Postcode" . "</th>";
echo "<th>" . "Plaats" . "</th>";
echo "</tr>";
foreach ($klanten as $klant){
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "<td>" . $klant["klantadres"] . "</td>";
    echo "<td>" . $klant["klantpostcode"] . "</td>";
    echo "<td>" . $klant["klantplaats"] . "</td>";
    echo "</tr>";
}
echo "</table><br>";

echo "<form action='gar-delete-klant3.php' method='post'>";
//klantid mag niet meer gewijzigd worden
echo "<input type='hidden' name='klantidvak' value='$klantid'>";
//waarde 0 doorgegeven als er niet gecheckt wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze klant.<br>";
echo "<input type='submit'>";
echo "</form>"
?>

</body>
</html>