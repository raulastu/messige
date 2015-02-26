<?php
        $message = "";

    include_once 'php/data_objects/DAOLink.php';
    $messages = getAllMessages();
    foreach ($messages as $message){
        $line = $message->message_id." ".$message->message. " ".$message->short;
        echo($line." <br/>");

    }
?>


