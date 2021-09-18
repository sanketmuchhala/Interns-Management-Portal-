<?php
include('config.php');
require 'class/class.phpmailer.php';
error_reporting(0);
$sql=mysqli_query($con,"SELECT * FROM interns WHERE decision =1");
$message = 'Hey there, You have been selected for interview. Your would be provided with the meeting link and schedule for your interview';
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
    // echo $row['name'];
    $email = $row['email'];
    $name = $row['name'];
    $mail = new PHPMailer;
    $mail->IsSMTP();                                //Sets Mailer to send message using SMTP

    // ADD YOUR DETAILS HERE

    $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '465';                                //Sets the default SMTP server port
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'forsendingemails814@gmail.com';                    //Sets SMTP username
    $mail->Password = 'NehalJayesh@80';                    //Sets SMTP password
    $mail->SMTPSecure = 'ssl';                            //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = 'forsendingemails814@gmail.com';                    //Sets the From email address for the message
    $mail->FromName = 'Sanket Muchhala';                //Sets the From name of the message
    $mail->AddAddress($email,$name);        //Adds a "To" address

    // ADD YOUR DETAILS HERE

    $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);                            //Sets message type to HTML
    $mail->AddAttachment($path);                    //Adds an attachment from a path on the filesystem
    $mail->Subject = 'Application for INTERNSHIP';                //Sets the Subject of the message
    $mail->Body = $message;                            //An HTML or plain text message body
    if ($mail->Send())                                //Send an Email. Return true on success or false on error
    {
        // $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
        unlink($path);
    } else {
        // $message = '<div class="alert alert-danger">There is an Error</div>';
    }
    $cnt=$cnt+1;
}

$sql=mysqli_query($con,"SELECT * FROM interns WHERE decision =0");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
    // echo $row['name'];
    $email = $row['email'];
    $name = $row['name'];
    $mail = new PHPMailer;
    $mail->IsSMTP();                                //Sets Mailer to send message using SMTP

    // ADD YOUR DETAILS HERE

    $mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '465';                                //Sets the default SMTP server port
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'forsendingemails814@gmail.com';                    //Sets SMTP username
    $mail->Password = 'NehalJayesh@80';                    //Sets SMTP password
    $mail->SMTPSecure = 'ssl';                            //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = 'forsendingemails814@gmail.com';                    //Sets the From email address for the message
    $mail->FromName = 'Sanket Muchhala';                //Sets the From name of the message
    $mail->AddAddress($email,$name);        //Adds a "To" address

    // ADD YOUR DETAILS HERE

    $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);                            //Sets message type to HTML
    $mail->AddAttachment($path);                    //Adds an attachment from a path on the filesystem
    $mail->Subject = 'Application for INTERNSHIP';                //Sets the Subject of the message
    $message='Hey there, You have been rejected never mind try another time ATB buddy.';
    $mail->Body = $message;                            //An HTML or plain text message body
    if ($mail->Send())                                //Send an Email. Return true on success or false on error
    {
        // $message = '<div class="alert alert-success">Application Successfully Submitted</div>';
        unlink($path);
    } else {
        // $message = '<div class="alert alert-danger">There is an Error</div>';
    }
    $cnt=$cnt+1;
}
?>