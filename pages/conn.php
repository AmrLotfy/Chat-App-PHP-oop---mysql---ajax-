<?php

    $dsn = 'mysql:host=localhost;dbname=chat';
    $user = 'root';
    $pass='';
    $option=array(
        PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',

    );
    try{
      $bd = new PDO($dsn ,$user,$pass,$option);
    }catch (PDOException $e){
        echo 'failed to connect' . $e->getMessage();

    }
?>