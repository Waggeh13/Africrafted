<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "ArtBlock";

//create connection 

$con = mysqli_connect($serverName, $userName, $password, $dbName);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
        "Connection successful";
}
