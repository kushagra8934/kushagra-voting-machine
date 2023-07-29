<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="email_verification.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container"> 
        <div class="title">Email Verification Process</div>
        <div class="content">
            <form class="user-details" method="post">
                <div class="input-box first_box">
                    <span class="details">Email</span>
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                    <span id="email_error"></span>
                    <p style="font-size: 13px; color: green; font-weight: 400;">Please enter the same email which you have already entered in the registration process</p>
                </div>
                <div class="button first_box">
                    <!-- <input type="submit" onclick="send_otp()" value="Send O.T.P" name="submit"> -->
                    <button type="button" name="btn" onclick="send_otp()">Send O.T.P</button>
                </div>

                <div class="input-box second_box">
                    <span class="details">Email</span>
                    <input type="text" id="otp" name="otp" placeholder="O.T.P">
                    <span id="otp_error"></span>
                </div>
                <div class="button second_box"> 
                    <!-- <input type="submit" onclick="send_otp()" value="Send O.T.P" name="submit"> -->
                    <button type="button" onclick="submit_otp()">Verify O.T.P</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function send_otp(){
            var email = jQuery('#email').val();
            jQuery.ajax({
                url:'send_otp.php',
                type:'post',
                data:'email='+email,
                success:function(result){
                    if(result=='yes'){
                        jQuery('.second_box').show();
                        jQuery('.first_box').hide();
                    }
                    if(result=='not_exixt'){
                        jQuery('#email_error').html('Please enter valid email');
                    }
                }
            });
        }

        function submit_otp(){
            var otp = jQuery('#otp').val();
            jQuery.ajax({
                url:'check_otp.php',
                type:'post',
                data:'otp='+otp,
                success:function(result){
                    if(result=='yes'){
                        window.location='login.php';
                    }
                    if(result=='not_exixt'){
                        jQuery('#otp_error').html('Please enter valid otp');
                    }
                }
            });
        }
    </script>
    <style>
        .second_box{
            display: none;
        }
        #email_error{
            color: red;
        }
    </style>
</body>
</html>