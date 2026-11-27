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

    /*$sql = $mysqli->prepare("");
    $sql->bind_param("i", $_GET['nummer']);
    $sql->execute();
    $resultaat = $sql->get_result();*/

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="pagina">trajecten</title>
    <link rel="shortcut icon" href="media/fotos/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="gids.css">
</head>