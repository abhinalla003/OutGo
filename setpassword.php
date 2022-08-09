<?php
    session_start();
    include "connection.php";
    $userEmail=$_SESSION['userEmail'];
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
                <b>Set the Password !</b></span><br><br><br>
            <form action="" method="post" name="resetPasswordForm">
                <span class="dj-left dj-padding-16">Password :</span>
                <input type="password" class="dj-input dj-round-large dj-premium" name="pass">
                <span class="dj-left dj-padding-16">Confirm Password :</span>
                <input type="password" class="dj-input dj-round-large dj-premium" name="conpass">
                <button name="btnchangepass" value="Submit"
                    class="dj-margin-top-32 dj-button dj-orange dj-round-large">Submit</button><br><br>
            </form>
            <?php
                    if(isset($_REQUEST['btnchangepass']))
                    {
                        $newPass=md5($_REQUEST['pass']);
                        $conPass=md5($_REQUEST['conpass']);
                        if($newPass==$conPass)
                        {
                            $updatePass="UPDATE tbl_user SET password='$newPass' WHERE email='$userEmail'";
                            if(mysqli_query($conn,$updatePass))
                            {
                                echo '<script>
                                alert("Password Reset Successfully...");
                                window.location.href="login.php";
                                </script>';
                            }
                            else
                            {
                                echo '<script>
                                alert("Something Went Wrong. Try Again...");
                                window.location.href="forgotpassword.php";
                                </script>';
                            }
                        }
                        else
                        {
                            echo '<script>
                                alert("Password must be same. Try Again...");
                                window.location.href="forgotpassword.php";
                                </script>';
                        }
                    }
                ?>
        </div>
    </div>
</body>

</html>