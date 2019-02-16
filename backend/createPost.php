<?php
        include 'connectDB.php'

        //(function createPost( $course, $title, $text)

        $query = "INSERT INTO posts (course, title, text, score) VALUS(:course, :title,:text, 0)";
        $stmt = $DB->getInstance()->prepare($query);
        $stmt->bindParm(':course',$_POST['course']);
        $stmt->bindParm(':title',$_POST['title']);
        $stmt->bindParm(':text',$_POST['text']);
        
        $stmt->execute();

        echo $stmt->fetch();
?>