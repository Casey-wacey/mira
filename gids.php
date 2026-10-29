<?php
    session_start();
    if (isset($_GET["taal"]) && in_array($_GET["taal"], ["Nl", "Fr", "En"], true)) {
        $_SESSION["taal"] = $_GET["taal"];
    }

    $taal = $_SESSION["taal"] ?? null;

    // No language chosen yet: back to the language picker
    if ($taal === null) {
        header("Location: index.php");
        exit;
    }
    if($_GET["taal"] == "Nl") {
        $_SESSION["taal"] = "Nl";
        echo"
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Mira gids</title>
            <link rel='shortcut icon' href='media/fotos/favicon.ico' type='image/x-icon'>
            <link rel='stylesheet' href='gids.css'>
        </head>
        <body class='flexInBody'>
            <p class='titelVoor' id='titelVoor'>
                welkom bij <br> volkssterrenwacht Mira
                <img src='media/fotos/logo.png' alt='logo' class='logoVoor'>
                <div style='taalSwitch'><a href='index.php'>taal wijzigen</a></div>
            </p>
            <span class='flexOpties'>
                <p>
                    <table>
                    <tr><td class='button' id='nr7'>7</td> <td class='button' id='nr8'>8</td> <td class='button' id='nr9'>9</td></tr>
                    <tr><td class='button' id='nr4'>4</td><td class='button' id='nr5'>5</td><td class='button' id='nr6'>6</td></tr>
                    <tr><td class='button' id='nr1'>1</td><td class='button' id='nr2'>2</td><td class='button' id='nr3'>3</td></tr>
                    <tr><td id='stop' class='buttonRood'>Stop</td><td class='button' id='nr0'>0</td><td id='goTo' class='buttonGroen'>Naar pag.</td></tr>
                    </table>
                </p>
                <p class='flexTrajecten'>
                    <button class='trajecten' id='aarde'> <img src='media/fotos/aarde.png' class='roterend'>aarde</button>
                    <button class='trajecten' id='maan'><img src='media/fotos/maan.png' class='roterend'>maan</button>
                </p>
            </span>
            
            <p>
                <h3>Kaart:</h3>
                ";

    } else if($_GET["taal"] == "Fr") {
        $_SESSION["taal"] = "Fr";
        echo"
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Mira guide</title>
            <link rel='shortcut icon' href='media/fotos/favicon.ico' type='image/x-icon'>
            <link rel='stylesheet' href='gids.css'>
        </head>
        <body class='flexInBody'>
            <p class='titelVoor' id='titelVoor'>
                Bienvenue à  <br> l'Observatoire public Mira
                <img src='media/fotos/logo.png' alt='logo' class='logoVoor'>
                <div style='taalSwitch'><a href='index.php'>changer de langue</a></div>
            </p>
            <span class='flexOpties'>
                <p>
                    <table>
                    <tr><td class='button' id='nr7'>7</td> <td class='button' id='nr8'>8</td> <td class='button' id='nr9'>9</td></tr>
                    <tr><td class='button' id='nr4'>4</td><td class='button' id='nr5'>5</td><td class='button' id='nr6'>6</td></tr>
                    <tr><td class='button' id='nr1'>1</td><td class='button' id='nr2'>2</td><td class='button' id='nr3'>3</td></tr>
                    <tr><td id='stop' class='buttonRood'>Annul</td><td class='button' id='nr0'>0</td><td id='goTo' class='buttonGroen'>Vers page</td></tr>
                    </table>
                </p>
                <p class='flexTrajecten'>
                    <button class='trajecten' id='aarde'> <img src='media/fotos/aarde.png' class='roterend'>Terre</button>
                    <button class='trajecten' id='maan'><img src='media/fotos/maan.png' class='roterend'>Lune</button>
                </p>
            </span>
            
            <p>
                <h3>carte:</h3>";

    } else if($_GET["taal"] == "En") {
        $_SESSION["taal"] = "En";
         echo"
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Mira guide</title>
            <link rel='shortcut icon' href='media/fotos/favicon.ico' type='image/x-icon'>
            <link rel='stylesheet' href='gids.css'>
        </head>
        <body class='flexInBody'>
            <p class='titelVoor' id='titelVoor'>
                Welcome to <br> public observatory Mira
                <img src='media/fotos/logo.png' alt='logo' class='logoVoor'>
                <div style='taalSwitch'><a href='index.php'>Change language</a></div>
            </p>
            <span class='flexOpties'>
                <p>
                    <table>
                    <tr><td class='button' id='nr7'>7</td> <td class='button' id='nr8'>8</td> <td class='button' id='nr9'>9</td></tr>
                    <tr><td class='button' id='nr4'>4</td><td class='button' id='nr5'>5</td><td class='button' id='nr6'>6</td></tr>
                    <tr><td class='button' id='nr1'>1</td><td class='button' id='nr2'>2</td><td class='button' id='nr3'>3</td></tr>
                    <tr><td id='stop' class='buttonRood'>Del.</td><td class='button' id='nr0'>0</td><td id='goTo' class='buttonGroen'>To page</td></tr>
                    </table>
                </p>
                <p class='flexTrajecten'>
                    <button class='trajecten' id='aarde'> <img src='media/fotos/aarde.png' class='roterend'>Earth</button>
                    <button class='trajecten' id='maan'><img src='media/fotos/maan.png' class='roterend'>Moon</button>
                </p>
            </span>
            
            <p>
                <h3>Map:</h3>";
    } else if (empty($_GET) && !(isset($_SESSION["taal"]))) {
        header("Location: index.php");
    }

?>

<button class="kaart" id="kaart"></button>

            </p>
            
            <script src="gids.js"></script>
        </body>
        </html>