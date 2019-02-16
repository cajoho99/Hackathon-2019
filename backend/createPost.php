<?php
        include 'connectDB.php';

        //(function createPost( $course, $title, $text)

        $query = "INSERT INTO Posts (course, title, content, score) VALUES(:course, :title,:text, 0)";
        $stmt = DB::getInstance()->prepare($query);
        $stmt->bindParam(':course',$_POST['course']);
        $stmt->bindParam(':title',$_POST['title']);
        $stmt->bindParam(':text',$_POST['text']);
        
        $stmt->execute();
?>