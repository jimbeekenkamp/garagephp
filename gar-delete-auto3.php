<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Jim Beekenkamp">
    <meta charset="UTF-8">
    <title>gar-delete-auto3.php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Auto verwijderen</h1>
<!--<p>Op kenteken gegevens zoeken uit de tabel auto van de database garage zodat ze verwijderd kunnen worden.</p>-->
<?php
// gegevens uit het formulier halen
$autokenteken = $_POST["autokentekenvak"];
$verwijderen = $_POST["verwijdervak"];

//autogegevens verwijderen
if($verwijderen){
    require_once "gar-connect.php";

    $sql = $conn->prepare("DELETE FROM auto WHERE autokenteken = :autokenteken");
    $sql->execute(["autokenteken" => $autokenteken]);

    echo "De gegevens zijn verwijderd. <br>";
}else{
    echo "De gegevens zijn niet verwijderd.<br>";
}
echo "<a href='gar-menu.php'>Terug naar het menu</a>";
?>
</body>
</html>