<?php

$dbConnection = new mysqli(
    hostname: "localhost", 
    username: "root", 
    password: "", 
    database: "ssmr-quirofano");

if ($dbConnection->connect_error) {
    die("Error de Conexión!" . $dbConnection->connect_error);
}