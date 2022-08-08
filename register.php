<?php
    include "connection.php";

    if(isset($_REQUEST['btnregnow']))
    {
        $mail=$_REQUEST['email'];
        $pass1=$_REQUEST['pass'];
        $pass2=$_REQUEST['conpass'];
        $alreadyQuery="SELECT * FROM tbl_user WHERE email='$mail'";
        $alreadyResult=mysqli_query($conn,$alreadyQuery);
        $userCount=mysqli_num_rows($alreadyResult);
        if($userCount>=1)
        {
            echo '<script>
            alert("You are already a user.");
            window.location.href="login.php";
            </script>';
        }
        else
        {
            $insertQuery="INSERT INTO tbl_user (email, password) VALUES('$mail','$pass1')";
            if(mysqli_query($conn,$insertQuery))
            {
                echo '<script>
                alert("Registered Successfully");
                window.location.href="login.php";
                </script>';
            }
            else
            {
                echo "<script>alert('Something Went Wrong')</script>";
            }
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
    <div class="dj-padding dj-display-middle dj-center">
        <div class="dj-bar dj-silver dj-round-large dj-card-4" style="width: 80%;">
            <div class="dj-padding">
                <a href="index.php" class="dj-center dj-wide dj-remove-underline" style="margin-top:0.4rem"><img
                        src="images/1111.png" width="400rem" height="40rem"></a>
            </div>
        </div>
        <div class="dj-padding dj-bar" style="width: 80%;">
            <span class="dj-margin-top dj-text-orange dj-left"
                style="text-shadow:1px 1px 0 #444;font-weight: 9000;font-size: x-large;">
                <b>Fill the Details and Sign Up Now !!!</b></span><br><br><br>
            <form action="" method="post">
                <span class="dj-left dj-padding-16">Email ID :</span>
                <input type="text" class="dj-input dj-round-large dj-premium" name="email">
                <span class="dj-left dj-padding-16">Password :</span>
                <input type="password" class="dj-input dj-round-large dj-premium" name="pass">
                <span class="dj-left dj-padding-16">Confirm Password :</span>
                <input type="password" class="dj-input dj-round-large dj-premium" name="conpass"><br><br>
                <button name="btnregnow" value="Register Now"
                    class="dj-margin-top dj-button dj-orange dj-round-large">Register Now</button><br><br>
                <span class="dj-center dj-padding-16">Already have an Account ? <a href="login.php"
                        class="dj-bold dj-text-orange dj-remove-underline"><b>Sign In</b></a></span>
            </form>
        </div>
    </div>

</body>

</html>