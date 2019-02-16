
<?php
    include 'connectDB.php';
    
    function getPost($id,$course){
        $query = "SELECT * FROM post WHERE id = :id AND course = :course";
        $dbo->prepare($query);
        $dbo->bindParm(':id',$id);
        $dbo->bindParm(':course',$course);

        $dbo->execute();

        echo $dbo->fetch();
    }

    function createPost($course, $title, $text){
        $query = "INSERT INTO posts (course, title, text, score) VALUS(:course, :title,:text, 0)";
        $dbo->prepare($query);
        $dbo->bindParm(':course',$course);
        $dbo->bindParm(':title',$title);
        $dbo->bindParm(':text',$text);
        
        $dbo->execute();

        echo $dbo->fetch();
    }

    createPost($_POST['course'],$_POST['title'],$_POST['text']);
    
?>