<?php

require_once(__DIR__.'/functions.php');
session_start();
if(!$_SESSION) return;
$jData = getDataAsJson(__DIR__.'/data.json');
$sUserId = $_SESSION['userId'];
$sClickedPropertyId = $_POST['likeIndex'];
$jSellers = $jData->sellers;

foreach($jSellers as $jSeller){        
    foreach($jSeller->properties as $sPropertyId=> $jProperty){
        if($sPropertyId == $sClickedPropertyId){    
            $jClickedProperty=$jProperty;             
        }
    }
}




// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'src/PHPMailer.php';
require 'src/Exception.php';
require 'src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'u.bajele@gmail.com';                     // SMTP username
    $mail->Password   = 'sauleszakis666';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('u.bajele@gmail.com', 'KEA TEST');
    $mail->addAddress('u.bajele@gmail.com', 'KEA tester');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);  
    
    $sPath = "http://localhost/activate-email/api-activate-email.php?address=$jClickedProperty->street&id=$sUserId";// Set email format to HTML
    $mail->Subject = 'Your saved properties';
    $mail->Body    = 'Welcome! <a href="'.$sPath.'">This is the link to your profile.</a> This is the property you just saved: '.$jClickedProperty->street.','.$jClickedProperty->city;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}