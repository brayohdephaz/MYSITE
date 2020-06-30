<?php

$dbServer = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$database = 'xtlqvoik_dephaz';

$conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $database);

if(!$conn){
    die("ERROR: " . mysqli_connect_error());
}