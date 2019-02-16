<?php
include 'connectDB.php';

function addToDB($code, $name, $description)
{
    $stmt = DB::getInstance()->prepare("INSERT INTO Courses(code, name, description) VALUES (:code, :name, :description)");
    $stmt->bindParam(":code", $code);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":description", $description);
    $stmt->execute();
}

function getCourseCodes()
{
    $stmt = DB::getInstance()->prepare("SELECT code FROM Courses");
    $stmt->execute();
    $res = $stmt->fetch();
    return $res;
}

function getCourseName($code)
{
    $stmt = DB::getInstance()->prepare("SELECT name FROM Courses WHERE code = :code");
    $stmt->bindParam(":code", $code);
    $stmt->execute();
    $res = $stmt->fetch();
    return $res;
}

function getCourseDescription($code)
{
    $stmt = DB::getInstance()->prepare("SELECT name FROM description WHERE code = :code");
    $stmt->bindParam(":code", $code);
    $stmt->execute();
    $res = $stmt->fetch();
    return $res;
}

addToDB("DAT017", "MOP", "LDR RO, =FUCKLIFE");


?>