<?php

$serverName = "localhost";
$dBUserName = "rohit";
$dBPassword = "wA</0083uzlk1669";
$dBName = "qrmenu";
$portNumber = 3306;

// $serverName = "localhost";
// $dBUserName = "root";
// $dBPassword = "";
// $dBName = "qrmenu";
// $portNumber = 3306;

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=qrmenu', $dBUserName, $dBPassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!$conn){
    die("Connection Failed:" . mysqli_connect_error());
}
