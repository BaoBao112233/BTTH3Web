<?php
    include("emailServer.php");
    include("emailSender.php");

    $emailServer = new MyEmailServer();
    $emailSender = new EmailSender($emailServer);
    $emailSender->send("khoaimon3570@gmail.com", "sangtran", "Adu ang sengg");    
?>