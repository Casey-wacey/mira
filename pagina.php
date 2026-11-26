<?php
session_start();
    include "connect.php";

    // Table and column names can't be bound parameters, so whitelist them
    $talen = [
        "Nl" => ["tabel" => "tblNl", "kolom" => "OpstellingNr"],
        "Fr" => ["tabel" => "tblFr", "kolom" => "OpstellingNr"],
        "En" => ["tabel" => "tblEn", "kolom" => "OpstellingNr"],
    ];
    $taal = $_SESSION["taal"] ?? "Nl";
    $t = $talen[$taal] ?? $talen["Nl"];
    $nummer = (int) $_GET["nummer"];
    $padAudio = "media/audio/$taal/N$nummer.mp3";
    $padFoto = "media/fotos/opstellingen/N$nummer.webp";
    $padVideo = "media/videos/$taal/N$nummer.mp4";


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

    if (!$teksten["titel"]) {
        header("Location: gids.php");
        $_SESSION["paginaFout"] = true;
    }
    else {
        $_SESSION["paginaFout"] = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="pagina"><?= htmlspecialchars($teksten["titel"]) ?></title>
    <link rel="shortcut icon" href="media/fotos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="gids.css">
</head>
<body class="flexInBody">
    <img src="media/fotos/logo.png" alt="logo" class="logo">
    <h3 id="titel"><?= htmlspecialchars($teksten["titel"]) ?></h3>
    <p id="korte"><?= htmlspecialchars($teksten["korte info"]) ?></p>

    <?php if (file_exists(__DIR__ . "/" . $padFoto)): ?>
        <img src="<?= htmlspecialchars($padFoto) ?>" alt="foto"></img>
    <?php endif; ?>

    <p id="hoofd"><?= htmlspecialchars($teksten["hoofd info"]) ?></p>
    <p id="extra"><?= htmlspecialchars($teksten["extra info"]) ?></p>

    <?php if (file_exists(__DIR__ . "/" . $padVideo)): ?>
        <img src="<?= htmlspecialchars($padVideo) ?>" alt="video"></img>
    <?php endif; ?>
    
    <p id="audioTekst"></p>

    <?php if (file_exists(__DIR__ . "/" . $padAudio)): ?>
        <audio controls>
            <source src="<?= htmlspecialchars($padAudio) ?>" type="audio/mpeg" alt="audio">
        </audio>
    <?php endif; ?>

    <!--<audio controls id="extraAudio"></audio> <br>-->
    <a href="gids.php" class="home">🏠</a>
    <a href="index.php" class="taal"><img src="media/fotos/language.png" alt="taal" class="taalFoto"></a>
</body>
</html>