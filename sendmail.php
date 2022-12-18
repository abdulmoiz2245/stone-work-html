<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
echo 'working';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //PHPMailer Object
    $name= $_POST['name'];
    $email= $_POST['email'];
    $subject= $_POST['subject'];
    $message= $_POST['message'];


    $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

    //From email address and name
    $mail->From = "no-reply@stoneconstructiontrading.com";
    $mail->FromName = "Stone Work Construction";

    //To address and name
    $mail->addAddress("contact@stoneconstructiontrading.com", "Customer Message");
    // $mail->addAddress(""); //Recipient name is optional

    //Address to which recipient will reply
    $mail->addReplyTo("no-reply@stoneconstructiontrading.com", "No Reply");

    //CC and BCC
    // $mail->addCC("cc@example.com");
    // $mail->addBCC("bcc@example.com");

    //Send HTML or Plain Text email
    $mail->isHTML(true);
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'mail.stoneconstructiontrading.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@stoneconstructiontrading.com';
    $mail->Password = '.$DOTA]180H#';

    $mail->Subject =   $subject;
    $mail->Body = '<p><strong>Customer Email </strong>: ' . $email . '</p><p><strong>Customer Name</strong>: ' . $name . '</p><p><strong>Message:<br></strong>' . $message . '</p';
    // $mail->AltBody = "This is the plain text version of the email content";

    try {
        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
}
