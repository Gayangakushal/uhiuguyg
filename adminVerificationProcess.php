<?php

require "connection.php";
require "email/SMTP.php";
require "email/PHPMailer.php";
require "email/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST["e"])){
    $email = $_POST["e"];

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."'");
    $admin_num = $admin_rs->num_rows;

    if($admin_num > 0){

        $code = uniqid();

        Database::iud("UPDATE `admin` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kowshallagayanga@gmail.com';
        $mail->Password = 'yqbwuujnnpycuucz';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('kowshallagayanga@gmail.com', 'Admin Verification');
        $mail->addReplyTo('kowshallagayanga@gmail.com', 'Admin Verification');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'LushLanka Online Store - Admin Login Verification Code';
        
        // Body Content with white background and image header
        $bodyContent = '<div style="background-color:white; padding:20px;">';
        $bodyContent .= '<img src="" alt="LushLanka Online Store" style="width:100%; height:auto;">';
        $bodyContent .= '<h1 style="color:black;">Your verification code is '.$code.'</h1>';
        $bodyContent .= '<p>Welcome to the LushLanka Online Store! Please use the verification code above to access your admin account.</p>';
        $bodyContent .= '<p>If you did not request this verification code, please ignore this email or contact support.</p>';
        $bodyContent .= '</div>';

        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo 'Success';
        }

    } else {
        echo ("You are not a valid user");
    }

} else {
    echo ("Email field should not be empty.");
}

?>
