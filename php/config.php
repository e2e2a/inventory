<?php
$servername = "localhost";
$port = 3306;
$dbname = "db"; // Replace with your database name
$username = "root";     // Replace with your username
$password = "";     // Replace with your password

try {
    $con = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>