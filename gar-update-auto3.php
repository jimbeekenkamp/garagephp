<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Jim Beekenkamp">
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
</head>
<body>
<h1>garage update auto 3</h1>
<p>Autogegevens wijzigen in de tabel auto van de database garage.</p>
<?php
//auttogegevens uit de formulier halen
$autokenteken = $_POST["autokentekenvak"];
$automerk = $_POST["automerkvak"];
$autotype = $_POST["autotypevak"];
$autokmstand = $_POST["autokmstandvak"];
$klantid = $_POST["klantidvak"];

//updaten autogegevens
require_once "gar-connect.php";

$sql = $conn->prepare("
UPDATE auto SET  automerk = :automerk,
                 autotype = :autotype,
                 autokmstand = :autokmstand,
                 klantid = :klantid
                 WHERE autokenteken = :autokenteken");

$sql->execute([
    "autokenteken" => $autokenteken,
    "automerk" => $automerk,
    "autotype" => $autotype,
    "autokmstand" => $autokmstand,
    "klantid" => $klantid,
]);

echo "De auto is gewijzigd.<br>";
echo "<a href='gar-menu.php'>Terug naar het menu</a>";
?>

</body>
</html>