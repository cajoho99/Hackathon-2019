
<?php

include 'connectDB.php';

function getPost($course, $id)
{
    $stmt = DB::getInstance()->prepare("SELECT title, score, content FROM posts WHERE course = :course AND id = :id");
    $stmt->bindParam(":course", $course);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $res = $stmt->fetchAll();
    $out = "";
    foreach ($res as $row) {

        $out = $row[0] . "," . $row[1] . "," . $row[2] . ",";
    }

    return $out;
}
$t = getPost($_POST['course'], $_POST['id']);
echo ($t);
?>