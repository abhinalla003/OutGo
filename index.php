<?php
    include 'connection.php';
    if(isset($_REQUEST['button'])){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $query = $_REQUEST['query'];

        $insertQuery="INSERT INTO tbl_contact (name,email,mobile,query) VALUES('$name','$email','$mobile','$query')";
            if(mysqli_query($conn,$insertQuery))
            {
                echo '<script>  
                alert("Request submitted successfully ...");
                window.location.href="index.php";
                </script>';
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
    <title>Home | Monthly Expenses</title>
</head>

<body class="dj-premium">
    <!-- Navbar (sit on top) -->
    <div class="dj-top dj-padding dj-margin-top dj-hide-small">
        <div class="dj-bar dj-silver dj-round-large dj-card-4">
            <div>
                <a href="#home" class="dj-bar-item dj-wide dj-remove-underline" style="margin-top:0.4rem"><img
                        src="images/1111.png" width="400rem" height="40rem"></a>
            </div>
            <div class="dj-right" id="myNavbar"
                style="padding-top: 1rem;padding-bottom: 1rem;padding-left: 0.5rem;padding-right: 1rem;">
                <a href="#home" class="dj-bar-item dj-remove-underline"><b><i
                            class="fa fa-home fa-fw dj-text-orange dj-margin-right"></i>Home</a>
                <a href="#home" class="dj-bar-item dj-remove-underline"><b><i
                            class="fa fa-user fa-fw dj-text-orange dj-margin-right"></i>About Us</a>
                <a href="#home" class="dj-bar-item dj-remove-underline"><b><i
                            class="fa fa-headset fa-fw dj-text-orange dj-margin-right"></i>Contact Us</a>
                <a href="login.php" class="dj-bar-item dj-remove-underline dj-button dj-round-large dj-orange"><b>Sign
                        In</a>
            </div>
        </div>
    </div>

    <div class="dj-top dj-padding dj-margin-top dj-hide-large dj-hide-medium">
        <div class="dj-bar dj-silver dj-round-large dj-wide dj-padding dj-card-4">
            <a href="#home" class="dj-bar-item dj-remove-underline"><img src="images/1111.png" width="400rem"
                    height="40rem"></a>
        </div>
    </div>

    <div class="dj-content dj-padding" style="max-width:1564px">
        <div class="dj-container dj-padding-32 dj-right dj-animate-right" style="margin-top: 80px;">
            <img src="images/bg-home.png" width="100%" height="100%">
        </div>
        <div class="dj-padding-32 dj-left dj-animate-left" style="margin-top:170px;margin-left: 3rem;">
            <span class="dj-text-orange" style="text-shadow:1px 1px 0 #444;font-weight: 9000;font-size: xx-large;">
                <b>Beware of little expenses.</b></span><br><br>
            <span style="text-shadow:1px 1px 0 #444;font-weight: 9000;font-size: xx-large;">A small leak will sink a
                great
                ship !</span><br><br>
            <span style="text-shadow:1px 1px 0 #444;font-weight: 9000;font-size: x-large;">
                To Manage your Monthly Expenses ...
            </span><br>
            <a href="register.php"><button type="button"
                    class="dj-button dj-round-large dj-orange dj-margin-top-32">Sign Up</button></a>
        </div>

        <!-- Feachers of OutGo -->
        <div class="dj-container dj-padding dj-row-padding" style="margin-left:3rem">
            <div class="dj-third dj-card dj-hover-shadow-white dj-round-large dj-padding"
                style="width:30%;margin-right: 3rem;">
                <div class="dj-padding">
                    <span class="dj-text-orange" style="font-weight: 9000;font-size:20px;">Maintain Budget Easily</span>
                    <hr style="border: 2px solid rgb(255, 255, 255);
                    border-radius: 5px;">
                </div>
                <div class="dj-center dj-padding">
                    <img src="images/f2.png" width="250px" height="250px">
                </div>
                <div class="dj-padding">
                    <span class="dj-text-white" style="font-weight: 9000;font-size:15px;">OutGo helps to manage your
                        monthly expenses easily and provides user friendly touch with latest feachers to manage expenses
                        in a efficient manner.</span>
                </div>
            </div>
            <div class="dj-third dj-card dj-hover-shadow-white dj-padding dj-round-large"
                style="width:30%;margin-right: 3rem;">
                <div class="dj-padding">
                    <span class="dj-text-orange" style="font-weight: 9000;font-size:20px;">Automatic Monthly
                        Statement</span>
                    <hr style="border: 2px solid rgb(255, 255, 255);
                    border-radius: 5px;">
                </div>
                <div class="dj-center dj-padding">
                    <img src="images/f1.png" width="250px" height="250px">
                </div>
                <div class="dj-padding">
                    <span class="dj-text-white" style="font-weight: 9000;font-size:15px;">OutGo Provides a feacher of
                        automatic monthly Statement of your expense. At the end of month you will get a statement of
                        your all expenses.</span>
                </div>
            </div>
            <div class="dj-third dj-round-large dj-card dj-hover-shadow-white dj-padding"
                style="width:30%;margin-right: 3rem;">
                <div class="dj-padding">
                    <span class="dj-text-orange" style="font-weight: 9000;font-size:20px;">Set Limit on Budget</span>
                    <hr style="border: 2px solid rgb(255, 255, 255);
                    border-radius: 5px;">
                </div>
                <div class="dj-center dj-padding">
                    <img src="images/f3.png" width="250px" height="250px">
                </div>
                <div class="dj-padding">
                    <span class="dj-text-white" style="font-weight: 9000;font-size:15px;">Using OutGo , you can set a
                        limit for specific category in a month that helps to reduce your unwanted expenses in
                        month.</span>
                </div>
            </div>
        </div>

        <!-- About OutGo -->
        <div class="dj-container dj-padding dj-margin">
            <div class="dj-left dj-animate-left" width="30%">
                <img src="images/about.png">
            </div>
            <div class="dj-padding dj-margin-top-32 dj-animate-right" width="40%">
                <span class="dj-text-orange" style="font-weight: 9000;font-size:20px;">About Us</span>
                <hr style="border: 2px solid rgb(255, 255, 255);
                    border-radius: 5px;">
                <div class="dj-padding">
                    <span style="font-size:16px;">OutGo Provides a feacher of automatic monthly Statement of your
                        expense. At the end of month you will get a statement of your all expenses.OutGo Provides a
                        feacher of automatic monthly Statement of your expense. At the end of month you will get a
                        statement of your all expenses.Using OutGo , you can set a limit for specific category in a
                        month that helps to reduce your unwanted expenses in month.<br><br>OutGo Provides a feacher of
                        automatic monthly Statement of your expense. At the end of month you will get a statement of
                        your all expenses.OutGo Provides a feacher of automatic monthly Statement of your expense. At
                        the end of month you will get a statement of your all expenses.Using OutGo , you can set a limit
                        for specific category in a month that helps to reduce your unwanted expenses in month.OutGo
                        Provides a feacher of automatic monthly Statement of your expense. At the end of month you will
                        get a statement of your all expenses.</span>
                </div>
            </div>
        </div>

        <!-- Contact Us -->
        <div class="dj-container dj-padding dj-margin dj-row-padding" style="margin-left: 4rem">
            <span class="dj-text-orange" style="font-weight: 9000;font-size:20px;">Contact Us</span>
            <hr style="border: 2px solid rgb(255, 255, 255);
                    border-radius: 5px;">

            <div class="dj-left dj-half dj-padding dj-animate-left" width="40%">
                <span class="dj-text-white" style="font-size:17px;">Reach to Us</span>
                <div class="dj-margin-top dj-margin-right">
                    <span style="font-size:16px;" class="dj-text-orange">
                        <hr style="border: 1px dashed rgb(255, 255, 255);
                    border-radius: 5px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>

                        Address :
                    </span>
                    <p>123 , Birla Street , Near Hawda Bridge , Kolkata , India , 394563</p>

                    <span style="font-size:16px;" class="dj-text-orange">
                        <hr style="border: 1px dashed rgb(255, 255, 255);
border-radius: 5px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope-open-fill" viewBox="0 0 16 16">
                            <path
                                d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.314l6.709 3.932L8 8.928l1.291.718L16 5.714V5.4a2 2 0 0 0-1.059-1.765l-6-3.2ZM16 6.873l-5.693 3.337L16 13.372v-6.5Zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516ZM0 13.373l5.693-3.163L0 6.873v6.5Z" />
                        </svg>

                        Email ID :
                    </span>
                    <p>customerservice@outgo.in</p>

                    <span style="font-size:16px;" class="dj-text-orange">
                        <hr style="border: 1px dashed rgb(255, 255, 255);
border-radius: 5px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>

                        Contact Number :
                    </span>
                    <p>+91 7778567770</p>
                    <hr style="border: 1px dashed rgb(255, 255, 255);
border-radius: 5px;">
                    <span style="font-size:16px;" class="dj-text-orange">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>

                        Website :
                    </span>
                    <p>www.outgo.in</p>
                    <hr style="border: 1px dashed rgb(255, 255, 255);
border-radius: 5px;">
                </div>

            </div>
            <div class="dj-padding dj-half dj-animate-right" width="60%">
                <span class="dj-text-orange" style="font-size:17px;">Write to Us</span>
                <form action="" method="post" class="dj-margin-top">
                    <span class="dj-left dj-padding-16">Name :</span>
                    <input type="text" class="dj-input dj-round-large dj-premium" name="name">
                    <span class="dj-left dj-padding-16">Email ID :</span>
                    <input type="email" class="dj-input dj-round-large dj-premium" name="email">
                    <span class="dj-left dj-padding-16">Mobile No. :</span>
                    <input type="number" class="dj-input dj-round-large dj-premium" name="mobile">
                    <span class="dj-left dj-padding-16">Query :</span>
                    <textarea rows="3" class="dj-input dj-round-large dj-premium" name="query"></textarea>
                    <button name="button" class="dj-margin-top-32 dj-button dj-orange dj-round-large">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="dj-padding dj-margin-32 dj-hide-small">
        <div class="dj-bar dj-silver dj-round-large dj-card-4 dj-animate-bottom">
            <div class="dj-padding dj-row-padding">
                <div class="dj-third">
                    <div class="dj-padding">
                        <a href="#home" class="dj-bar-item dj-wide dj-remove-underline" style="margin-top:0.4rem"><img
                                src="images/1111.png" width="400rem" height="40rem"></a>

                    </div> <br><br>
                    <div class="dj-padding dj-margin-top dj-margin-left dj-margin-right">
                        <span style="font-size:16px;" class="dj-text-orange">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg>

                            Address :
                        </span>
                        <p class="dj-margin-left">123 , Birla Street , Near Hawda Bridge , Kolkata , India , 394563</p>

                        <span style="font-size:16px;" class="dj-text-orange">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg>

                            Email ID :
                        </span>
                        <p class="dj-margin-left">customerservice@outgo.in</p>
                        <p style="margin-top: 3rem;font-size: 12.5px;font-family: sans-serif;" class="dj-text-orange">@
                            Copyright 2022 reserved by <a href="index.php">OutGo</a>. All rights reserved.</p>
                    </div>
                </div>
                <div class="dj-third">
                    <div class="dj-padding dj-margin-left dj-margin-right dj-margin-top">
                        <span class="dj-text-orange" style="font-weight: 9000;font-size:20px;">About Us</span>
                        <hr style="border: 1px dashed rgb(255, 255, 255);
border-radius: 5px;">
                        <p>OutGo Provides a feacher of automatic monthly Statement of your
                            expense.</p>
                    </div>

                    <a href="#"><button type="button"
                            class="dj-button dj-margin-left-32 dj-round-large dj-border dj-text-orange">Know
                            More</button></a>


                    <a href="#"><button type="button" class="dj-button dj-round-large dj-border dj-text-orange">Contact
                            Us</button></a>


                </div>
                <div class="dj-third">
                    <div class="dj-padding dj-margin-left dj-margin-right dj-margin-top">
                        <span class="dj-text-orange" style="font-weight: 9000;font-size:20px;">Quick Links</span>
                        <hr style="border: 1px dashed rgb(255, 255, 255);
border-radius: 5px;">
                        <a href="#home" class="dj-bar-item dj-remove-underline"><b>Home</a>
                        <a href="#home" class="dj-bar-item dj-remove-underline"><b>About Us</a>
                        <a href="#home" class="dj-bar-item dj-remove-underline"><b>Contact Us</a>

                        <a href="#home" class="dj-bar-item dj-remove-underline"><b>Login</a>
                        <a href="#home" class="dj-bar-item dj-remove-underline"><b>Register</a>
                    </div><br><br><br>
                    <div class="dj-padding dj-margin-left dj-margin-right dj-margin-top">
                        <span class="dj-text-orange" style="font-weight: 9000;font-size:20px;">Social Links</span>
                        <hr style="border: 1px dashed rgb(255, 255, 255);
border-radius: 5px;">
                        <div class="dj-container dj-margin">

                            <a href="" class="dj-hover-shadow-white dj-padding dj-round-large"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="pink"
                                    class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg></a>



                            <a href="" class="dj-hover-shadow-white dj-padding dj-remove-underline dj-round-large">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="skyblue"
                                    class="bi bi-meta" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8.217 5.243C9.145 3.988 10.171 3 11.483 3 13.96 3 16 6.153 16.001 9.907c0 2.29-.986 3.725-2.757 3.725-1.543 0-2.395-.866-3.924-3.424l-.667-1.123-.118-.197a54.944 54.944 0 0 0-.53-.877l-1.178 2.08c-1.673 2.925-2.615 3.541-3.923 3.541C1.086 13.632 0 12.217 0 9.973 0 6.388 1.995 3 4.598 3c.319 0 .625.039.924.122.31.086.611.22.913.407.577.359 1.154.915 1.782 1.714Zm1.516 2.224c-.252-.41-.494-.787-.727-1.133L9 6.326c.845-1.305 1.543-1.954 2.372-1.954 1.723 0 3.102 2.537 3.102 5.653 0 1.188-.39 1.877-1.195 1.877-.773 0-1.142-.51-2.61-2.87l-.937-1.565ZM4.846 4.756c.725.1 1.385.634 2.34 2.001A212.13 212.13 0 0 0 5.551 9.3c-1.357 2.126-1.826 2.603-2.581 2.603-.777 0-1.24-.682-1.24-1.9 0-2.602 1.298-5.264 2.846-5.264.091 0 .181.006.27.018Z" />
                                </svg>
                            </a>
                            <a href="" class="dj-hover-shadow-white dj-padding dj-remove-underline dj-round-large">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="skyblue"
                                    class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg>
                            </a>

                            <a href="" class="dj-hover-shadow-white dj-padding dj-remove-underline dj-round-large">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FF1A1A"
                                    class="bi bi-youtube" viewBox="0 0 16 16">
                                    <path
                                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                </svg>
                            </a>

                            <a href="" class="dj-hover-shadow-white dj-padding dj-remove-underline dj-round-large">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="lightblue"
                                    class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                </svg>
                            </a>

                        </div>

                    </div>
                </div>
            </div>
            <script defer src="https://use.fontawesome.com/releases/v5.15.0/js/all.js"></script>
</body>

</html>