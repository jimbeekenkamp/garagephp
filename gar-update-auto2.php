<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Jim Beekenkamp">
    <meta charset="UTF-8">
    <title>gar-update-auto2.php</title>
</head>
<body>
<h1>garage update auto 2</h1>
<p>Dit formulier wordt gebruikt om autogegevens te wijzigen in de tabel auto van de database garage.</p>
<?php
//klantid uit het formulier halen
$autokenteken = $_POST["autokentekenvak"];

//autogegevens uit de tabel halen
require_once "gar-connect.php";

$klanten = $conn->prepare("SELECT autokenteken, automerk, autotype, autokmstand, klantid FROM auto WHERE autokenteken = :autokenteken");
$klanten->execute(["autokenteken" => $autokenteken]);
$klant = $klanten->fetch(PDO::FETCH_ASSOC);

//autogegevens in een nieuw formulier laten zien
echo "<form action='gar-update-auto3.php' method='post'>";
    //klantid mag niet gewijzigd worden

//    echo "klantid:" . $klant["klantid"];
//    echo "<input type='hidden' name='klantidvak' ";
//    echo "value=' " . $klant["klantid"] . " '><br>";

    echo "klantid: <input type='text' ";
    echo "name = 'klantidvak' ";
    echo "value = '" .$klant["klantid"]."' ";
    echo " > <br>";

    echo "automerk: <input type='text' ";
    echo "name = 'automerkvak' ";
    echo "value = '" .$klant["automerk"]."' ";
    echo " > <br>";

    echo "autotype: <input type='text' ";
    echo "name = 'autotypevak' ";
    echo "value = '" .$klant["autotype"]."' ";
    echo " > <br>";

    echo "autokmstand: <input type='text' ";
    echo "name = 'autokmstandvak' ";
    echo "value = '" .$klant["autokmstand"]."' ";
    echo " > <br>";

    echo "autokenteken: <input type='text' readonly ";
    echo "name = 'autokentekenvak' ";
    echo "value = '" .$klant["autokenteken"]."' ";
    echo " > <br>";


//    echo "autokenteken:" . $klant["autokenteken"];
//    echo "<input type='hidden' name='autokentekenvak' ";
//    echo "value=' " . $klant["autokenteken"] . " '><br>";


echo "<input type='submit'>";
echo "</form>";
?>

</body>
</html>