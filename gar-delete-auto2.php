<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Jim Beekenkamp">
    <meta charset="UTF-8">
    <title>gar-delete-auto2.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Auto verwijderen</h1>
<!--<p>Op kenteken gegevens zoeken uit de tabel auto van de database garage zodat ze verwijderd kunnen worden.</p>-->
<?php
// klantid uit het formulier halen
$autokenteken = $_POST["autokentekenvak"];

//autogegevens uit de tabel halen
require_once "gar-connect.php";

$klanten = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmstand, klantid FROM auto WHERE autokenteken = :autokenteken");
$klanten->execute(["autokenteken" => $autokenteken]);

//autogegevens laten zien
echo "<table>";
echo "<tr>";
echo "<th>" . "Kenteken" . "</th>";
echo "<th>" . "Merk" . "</th>";
echo "<th>" . "Type" . "</th>";
echo "<th>" . "Kilometerstand" . "</th>";
echo "<th>" . "KlantID" . "</th>";
echo "</tr>";
foreach ($klanten as $klant){
    echo "<tr>";
    echo "<td>" . $klant["autokenteken"] . "</td>";
    echo "<td>" . $klant["automerk"] . "</td>";
    echo "<td>" . $klant["autotype"] . "</td>";
    echo "<td>" . $klant["autokmstand"] . "</td>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "</tr>";
}
echo "</table><br>";

echo "<form action='gar-delete-auto3.php' method='post'>";
//klantid mag niet meer gewijzigd worden
echo "<input type='hidden' name='autokentekenvak' value='$autokenteken'>";
//waarde 0 doorgegeven als er niet gecheckt wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze auto.<br>";
echo "<input type='submit'>";
echo "</form>";
?>

</body>
</html>