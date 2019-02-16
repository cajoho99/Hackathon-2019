
<?php
    include 'connectDB.php';
    //function getPost($id, $course)

    $query = 'SELECT * FROM Posts';
    $stmt = DB::getInstance()->prepare($query);

    $stmt->execute();

    $res = $stmt->fetchAll();
    $out = "";

    //var_dump($res);
    foreach($res as $row){
        foreach($row as $col){
            $out .= $col.",";
        }
    }

    echo $out;
?>