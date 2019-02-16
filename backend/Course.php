<?php
include 'connectDB.php';

function addToDB($dbo, $code, $name, $description)
{
    $stmt = $dbo->prepare("INSERT INTO Courses(code, name, description) VALUES (:code, :name, :description)");
    $stmt->bindParam(":code", $code);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":description", $description);
    $stmt->execute();
}

function getCourseCodes($dbo)
{
    $stmt = $dbo->prepare("SELECT code FROM Courses");
    $stmt->execute();
    $res = $stmt->fetch();
    return $res;
}

function getCourseName($dbo, $code)
{
    $stmt = $dbo->prepare("SELECT name FROM Courses WHERE code = :code");
    $stmt->bindParam(":code", $code);
    $stmt->execute();
    $res = $stmt->fetch();
    return $res;
}

function getCourseDescription($dbo, $code)
{
    $stmt = $dbo->prepare("SELECT name FROM description WHERE code = :code");
    $stmt->bindParam(":code", $code);
    $stmt->execute();
    $res = $stmt->fetch();
    return $res;
}




?>