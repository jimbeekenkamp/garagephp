<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Jim Beekenkamp">
    <meta charset="UTF-8">
    <title>gar-read-auto.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Alle auto's</h1>
<!--<p>Dit zijn alle gegevens uit de tabel auto van de database garage.</p>-->

<?php
//tabel uitlezen en netjes afdrukken
require_once "gar-connect.php";

$sql = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmstand, klantid FROM auto");

$sql->execute();

echo "<table>";
echo "<tr>";
echo "<th>" . "Kenteken" . "</th>";
echo "<th>" . "Merk" . "</th>";
echo "<th>" . "Type" . "</th>";
echo "<th>" . "Kilometerstand" . "</th>";
echo "<th>" . "KlantID" . "</th>";
echo "</tr>";
foreach ($sql as $rij){
    echo "<tr>";
    echo "<td>" . $rij["autokenteken"] . "</td>";
    echo "<td>" . $rij["automerk"] . "</td>";
    echo "<td>" . $rij["autotype"] . "</td>";
    echo "<td>" . $rij["autokmstand"] . "</td>";
    echo "<td>" . $rij["klantid"] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> Terug naar het menu </a>";
?>

</body>
</html>