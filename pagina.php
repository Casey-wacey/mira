<?php
session_start();
    include "connect.php";

    // Table and column names can't be bound parameters, so whitelist them
    $talen = [
        "Nl" => ["tabel" => "tblNl", "kolom" => "OpstellingNr"],
        "Fr" => ["tabel" => "tblFr", "kolom" => "OpstellingFr"],
        "En" => ["tabel" => "tblEn", "kolom" => "OpstellingEn"],
    ];
    $taal = $_SESSION["taal"] ?? "Nl";
    $t = $talen[$taal] ?? $talen["Nl"];

    $sql = $mysqli->prepare("SELECT tekstsoort, tekst FROM {$t['tabel']} WHERE {$t['kolom']} = ? ORDER BY volgnummer");
    $sql->bind_param("i", $_GET['nummer']);
    $sql->execute();
    $resultaat = $sql->get_result();

    // Empty by default, so missing data prints nothing
    $teksten = [
        "titel"      => "",
        "korte info" => "",
        "hoofd info" => "",
        "extra info" => "",
    ];
    while ($rij = $resultaat->fetch_assoc()) {
        $teksten[$rij["tekstsoort"]] = $rij["tekst"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="pagetitel"></title>
    <link rel="shortcut icon" href="media/fotos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="gids.css">
</head>
<body class="flexInBody">
    <img src="media/fotos/logo.png" alt="logo" class="logo">
    <h3 id="titel"><?= htmlspecialchars($teksten["titel"]) ?></h3>
    <p id="korte"><?= htmlspecialchars($teksten["korte info"]) ?></p>
    <p id="afbeelding"></p>
    <p id="hoofd"><?= htmlspecialchars($teksten["hoofd info"]) ?></p>
    <p id="extra"><?= htmlspecialchars($teksten["extra info"]) ?></p>
    <span id="video"></span>
    <p id="audioTekst"></p>
    <span id="audio"></span>
    <!--<audio controls id="extraAudio"></audio> <br>-->
    <a href="gids.php" class="terug">terug naar hoofdpagina</a>
</body>
</html>