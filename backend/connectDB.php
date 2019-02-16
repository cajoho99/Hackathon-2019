<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $dbo = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
    $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful";
} catch (PDOException $e) {
    echo "Conncetion failed: " . $e->getMessage();
}
?>

