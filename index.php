<?php
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>taal/langue/language</title>
    <link rel="stylesheet" href="gids.css">
</head>
<body>
    <p class="titelVoor" id="titelVoor">
        Selecteer uw taal:<br>
        Sélectionnez votre langue:<br>
        choose your language:
    </p>
    <div class="taalKeuze">
        <a href="gids.php?taal=Nl" class="taalKeuzeKnop">Nederlands</a>
        <a href="gids.php?taal=Fr" class="taalKeuzeKnop">Français</a>
        <a href="gids.php?taal=En" class="taalKeuzeKnop">English</a>
    </div>
</body>
</html>