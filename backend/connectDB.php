<?php

class DB
{
    private static $instance = null;

    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbo;

    private function __construct()
    {
        try {
            $dbo = new PDO("mysql:host=" . DB::$servername . ";dbname=mydb", DB::$username, DB::$password);
            $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection successful";
        } catch (PDOException $e) {
            echo "Conncetion failed: " . $e->getMessage();
        }
        self::$dbo = $dbo;
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DB();
        }
        return self::$dbo;
    }
}
?>

