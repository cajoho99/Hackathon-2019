<?php
    require_once('user.php');
    session_start();
    session_regenerate_id(true);

    $user = new User();
    $user->createUser($_POST['user_name'],$_POST['user_password'],
    $_POST['first_name'],$_POST['last_name']);
    $_SESSION['user_id'] = $user->getID();

?>