
<?php
    //function getPost($id, $course)

    //$query = "SELECT * FROM post WHERE id = :id AND course = :course";
    //$stmt = $DB->getInstance()->prepare($query);
    //$stmt->bindParm(':id',$_POST['id']);
    //$stmt->bindParm(':course',$_POST['course']);

    //$stmt->execute();

    //echo $stmt->fetch();

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