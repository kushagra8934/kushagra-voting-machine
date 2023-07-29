<?php
session_start();
//include ('smtp/PHPMailerAutoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$con= mysqli_connect('localhost','root','','voting_machine');
$email = $_POST['email'];
$res = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
$count = mysqli_num_rows($res);
if($count>0){
    $otp=rand(1111,9999);
    mysqli_query($con,"UPDATE users set otp='$otp' where email='$email'");
    $html = "your otp verification code is=".$otp;
    $_SESSION['EMAIL'] = $email;
    smtp_mailer($email,'OTP verification',$html);
    echo "yes";
}
else{
    echo "not_exixt";  
}

function smtp_mailer($to,$subject, $msg){
	require_once("smtp\class.phpmailer.php");
	$mail = new PHPMailer(true); 
	$mail->IsSMTP(); 
	//$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; //tls
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; //587
	$mail->IsHTML(true);
	//$mail->CharSet = 'UTF-8';
	$mail->Username ='kushvotingservice@gmail.com';
	$mail->Password = 'gjvszgbklfqpjeub';
	$mail->SetFrom('kushvotingservice@gmail.com');
	//$mail->addAttachment("dummy.pdf");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->addAddress($to);
    $mail->send();
	// if(!$mail->Send()){
	// 	return 0;
	// }else{
	// 	return 1;
	// }
}
?>