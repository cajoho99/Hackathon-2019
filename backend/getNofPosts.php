<?php
include 'connectDB.php';

function getNofPosts()
{
    $stmt = DB::getInstance()->prepare("SELECT id FROM posts");
    $stmt->execute();
    $res = $stmt->fetchAll();

    return count($res);
}
$t = getNofPosts();
echo $t;
?>