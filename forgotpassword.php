<?php
    session_start();
    include "connection.php";
?>
<!DOCTYPE html>

<html>

<head>
    <!-- Importing CSS file -->

    <link rel="stylesheet" href="dj-style.css">

    <title>Reset Password | Monthly Expenses</title>
</head>

<body class="dj-premium">
    <!-- Navbar (sit on top) -->
    <div class="dj-padding-32 dj-display-middle dj-center">
        <div class="dj-bar dj-silver dj-round-large dj-card-4" style="width: 60%;">
            <div class="dj-padding-16">
                <a href="index.php" class="dj-center dj-wide dj-remove-underline" style="margin-top:0.4rem"><img
                        src="images/1111.png" width="400rem" height="40rem"></a>
            </div>
        </div>
        <div class="dj-padding dj-bar" style="width: 60%;">
            <span class="dj-margin-top dj-text-orange dj-left"
                style="text-shadow:1px 1px 0 #444;font-weight: 9000;font-size: x-large;">
                <b>Reset your password !</b></span><br><br><br>
            <form action="" method="post" name="sendOTPForm">
                <span class="dj-left dj-padding-16">Email ID :</span>
                <input type="email" class="dj-input dj-round-large dj-premium" name="email">
                <button name="btnsendotp" value="Send OTP"
                    class="dj-margin-top-32 dj-button dj-orange dj-round-large">Send
                    OTP</button><br><br>
            </form>
            <?php
    if(isset($_REQUEST['btnsendotp']))
    {
        $email=$_REQUEST['email'];
        $checkEmail="SELECT * FROM tbl_user WHERE email='$email'";
        $checkEmailResult=mysqli_query($conn,$checkEmail);
        $userInfo=mysqli_fetch_assoc($checkEmailResult);
        $userEmail=$userInfo['email'];
        if($email==$userEmail)
        {
            require '/usr/share/php/libphp-phpmailer/src/PHPMailer.php';

            require '/usr/share/php/libphp-phpmailer/src/SMTP.php';

            $email = new PHPMailer\PHPMailer\PHPMailer();

            $email->IsSMTP();

            $email->isHTML(true);

            $email->SMTPAuth = true;

            $email->SMTPSecure = 'ssl';

            $email->Host = "smtp.gmail.com";

            $email->Port = 465;

            //Set the gmail address that will be used for sending email

            $email->Username = "outgomonthlyexpenses@gmail.com";

            //Set the valid password for the gmail address

            $email->Password = "wgwmcpmbskfvemer";

            //Set the sender email address

            $email->SetFrom("admin@example.com");

            //Set the receiver email address

            $email->AddAddress($userEmail);

            $email->Subject = "Forgot Password";

            $otp=rand(1000,9999);

            $message = "<b><h3>OutGo Team.</h3></b>";
            $message .= "<h5>Your OTP is $otp.<br>Don't share with anyone.</h5>";
            
            
            $email->Body = $message;
            
            if(!$email->Send()) {

                echo '<script>
                    alert("OTP not sent. Try Again...");
                    window.location.href="forgotpassword.php";
                    </script>';
              
              } else {
              
                $_SESSION['userEmail']=$userEmail;
                $_SESSION['otp']=$otp;
                echo '<script>
                alert("OTP is sent to Registered Email...");
                window.location.href="verifyotp.php";
                </script>';
              
              }
        }
        else 
        {
            echo '<script>
                alert("Register Yourself");
                window.location.href="register.php";
                </script>';
        }
}
    ?>
            <span class="dj-center dj-padding-16">Want to Sign In ? <a href="login.php"
                    class="dj-bold dj-text-orange dj-remove-underline"><b>Sign In</b></a></span>
        </div>
    </div>
</body>

</html>