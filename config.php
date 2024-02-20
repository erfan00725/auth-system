<?php

declare(strict_types=1);

// Database config
$host = "localhost";
$dbname = "test";
$user = "root";
$pass = "";


try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $th) {
    throw $th;
}


echo "connected successfully <br>";
