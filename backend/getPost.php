
<?php
    //function getPost($id, $course)

    $query = "SELECT * FROM post WHERE id = :id AND course = :course";
    $stmt = $DB->getInstance()->prepare($query);
    $stmt->bindParm(':id',$_POST['id']);
    $stmt->bindParm(':course',$_POST['course']);

    $stmt->execute();

    echo $stmt->fetch();
?>