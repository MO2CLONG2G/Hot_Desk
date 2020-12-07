<?php
    session_start();

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $mailFrom = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['message'];

        $mailTo = "mokoto.mothusi@gmail.com";
        $header = "From: ".$mailFrom;
        $textMsg = "You have recieved am email from ".$name." .\n\n". $msg;

        //Function to send mail
        mail($mailTo,$subject,$textMsg,$header);
        header("Location: index.html?mailsend");
    }
?>