<?php
$mysqli = new mysqli("localhost", "root", "", "dbmira");
$aanpassenUTF = $mysqli->query("SET NAMES utf8");
if ($mysqli->connect_errno) {
    echo "failed to connect to MySql: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>