<?php
include 'connectDB.php';

function getNofCourses()
{
    $stmt = DB::getInstance()->prepare("SELECT code FROM courses");
    $stmt->execute();
    $res = $stmt->fetchAll();

    return count($res);
}
$t = getNofCourses();
echo $t;


?>