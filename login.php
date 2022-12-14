<?php
    session_start();
    if (isset($_SESSION['user'])) {
        session_destroy();
    }
    include "connection.php";

    if(isset($_REQUEST['btnlogin']))
    {
        $mail=$_REQUEST['email'];
        $pass=md5($_REQUEST['pass']);
        $checkUser="SELECT * FROM tbl_user WHERE email='$mail' AND password='$pass'";
        $userResult=mysqli_query($conn,$checkUser);
        $userCount=mysqli_num_rows($userResult);
        $userIdFetch=mysqli_fetch_assoc($userResult);
        $userId=$userIdFetch['u_id'];
        $userLog=$userIdFetch['log'];
        if($userCount>=1 and $userLog==1)
        {
            $_SESSION['user'] = $userId;
            sleep(2);
            echo "<script>
                window.location.href='user/dashboard.php';
                </script>";
        }
        else if($userCount>=1 and $userLog==0)
        {
            $_SESSION['user'] = $userId;
            sleep(2);
            echo "<script>
                window.location.href='user/editprofile.php';
                </script>";
        }
        else if($userCount<=0)
        {
            echo "<script>
                alert('Please Register Yourself');
                window.location.href='register.php';
                </script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong')</script>";
        }
    }
?>
<!DOCTYPE html>

<html>

<head>
    <!-- Importing CSS file -->

    <link rel="stylesheet" href="dj-style.css">

    <title>Sign Up | Monthly Expenses</title>
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
                <b>Please Login Yourself !</b></span><br><br><br>
            <form action="" method="post">
                <span class="dj-left dj-padding-16">Email ID :</span>
                <input type="email" class="dj-input dj-round-large dj-premium" name="email">
                <span class="dj-left dj-padding-16">Password :</span>
                <input type="password" class="dj-input dj-round-large dj-premium" name="pass">
                <span><a href="forgotpassword.php"
                        class="dj-bold dj-text-orange dj-right dj-margin-top dj-remove-underline"><b>Forgot
                            Password ? </b></a></span>
                <div class="dj-center" style="margin-top: 2.9rem;">
                    <button type="submit" name="btnlogin" value="Login"
                        class="dj-button dj-orange dj-margin dj-round-large">Login</button></span>
                </div>
                <span class="dj-center dj-padding-16">Don't have an Account ? <a href="register.php"
                        class="dj-bold dj-text-orange dj-remove-underline"><b>Sign Up</b></a></span>
            </form>

        </div>
    </div>

</body>

</html>