<?php
    session_start();
    include "connection.php";
    $otp=0;
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
                <b>OTP Confirmation !</b></span><br><br><br>
            <form action="" method="post" name="verifyOTPForm">
                <span class="dj-left dj-padding-16">Enter OTP :</span>
                <input type="number" class="dj-input dj-round-large dj-premium" name="otp">
                <button name="btncheckotp" value="Verify OTP"
                    class="dj-margin-top-32 dj-button dj-orange dj-round-large">Verify
                    OTP</button><br><br>
            </form>
            <?php
                    if(isset($_REQUEST['btncheckotp']))
                    {
                        $enteredOTP=$_REQUEST['otp'];
                        $sessOTP=$_SESSION['otp'];
                        if($enteredOTP==$sessOTP)
                        {
                            echo '<script>
                        alert("OTP Verified Successfully...");
                        window.location.href="setpassword.php";
                        </script>';
                        }
                        else
                        {
                            echo '<script>
                        alert("OTP not matched. Try Again...");
                        window.location.href="forgotpassword.php";
                        </script>';
                        }
                    }
                ?>
        </div>
    </div>
</body>

</html>