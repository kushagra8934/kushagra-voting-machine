<?php
session_start();
//include ('smtp/PHPMailerAutoload.php');
$con= mysqli_connect('localhost','root','','voting_machine');
$otp = $_POST['otp'];
$email=$_SESSION['EMAIL'];
$res = mysqli_query($con,"SELECT * FROM users WHERE email='$email' and otp='$otp'");
$count = mysqli_num_rows($res);
if($count>0){
    mysqli_query($con,"UPDATE users set otp='' where email='$email'");
    //$_SESSION['IS_LOGIN'] = $email;
    echo "yes";
}
else{
    echo "not_exixt";
}
?>