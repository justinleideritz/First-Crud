<?php
$servername = "localhost";


// //voor local
$username = "root";
$password = "";
$database = "challenge";

//voor webserver
//$database = "challenge";
//$username = "justin";
//$password = "Deployment18!@";

$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

$sqlSelectAll = "SELECT * FROM crud";
$sqlTable = $conn->query($sqlSelectAll);
