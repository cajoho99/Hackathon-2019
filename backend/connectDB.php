<?php

class DB
{
    private $instance = null;

    private $servername = "localhost";
    private $username = "root";
    private $password = "";

    private function __construct()
    {

    }

    public function getInstance()
    {
        if (self::$instance == null) {
            try {
                $dbo = new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
                $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connection successful";
            } catch (PDOException $e) {
                echo "Conncetion failed: " . $e->getMessage();
            }
            self::$instace = $dbo;
        }
        return self::$instance;
    }
}
?>

