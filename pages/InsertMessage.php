<?php
 session_start();
 include "classes.php";
 if(isset($_POST['chattext'])){
     $chat = new chat();
     $chat->setChatUserId($_SESSION['userid']);
     $chat->setChatText($_POST['chattext']);
     $chat->InsertChat();
 }
?>