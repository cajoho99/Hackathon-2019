<?php
include 'connectDB.php';

function getCourseCodes()
{
    $stmt = DB::getInstance()->prepare("SELECT code FROM courses");
    $stmt->execute();
    $res = $stmt->fetchAll();
    $out = "";
    foreach ($res as $row) {
        $out .= $row[0] . ",";
    }

    return $out;
}
$t = getCourseCodes();
echo $t;


?>