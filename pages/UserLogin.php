<?php
    session_start();
    include "classes.php";
    $user = new user();
    $user->setUserMail($_POST['UserMailLogin']);
    $user->setUserPassword($_POST['UserPasswordLogin']);
    if($user->UserLogin()==true){
           $_SESSION['userid']=$user->getUser();
           $_SESSION['username']=$user->getUserName();
           $_SESSION['usermail']=$user->getUserMail();
    }
?>