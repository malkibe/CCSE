<?php

$mysqli = new mysqli('localhost', 'root', '', 'CCSE_JED');
//$mysqli = new mysqli('localhost', 'root', 'Ar@355279', 'ejtiaz');
mysqli_query($mysqli,"set names utf8");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    return;
}
?>