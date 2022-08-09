<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        $userId=$_SESSION['user'];
        date_default_timezone_set("Asia/Kolkata");
        include '../connection.php';
        $errStr="Not Available";
        $fetchUser="SELECT * FROM tbl_user WHERE u_id='$userId'";
        $fetchUserResult=mysqli_query($conn,$fetchUser);
        $fetchUserInfo=mysqli_fetch_assoc($fetchUserResult);
        if(isset($fetchUserInfo['name']))
        {
        $name=$fetchUserInfo['name'];
        }
        else
        {
            $name=$errStr;
        }
        if(isset($fetchUserInfo['email']))
        {
        $email=$fetchUserInfo['email'];
        }
        else
        {
            $email=$errStr;
        }
        if(isset($fetchUserInfo['phone_no']))
        {
        $phone_no=$fetchUserInfo['phone_no'];
        }
        else
        {
            $phone_no=$errStr;
        }
        if(isset($fetchUserInfo['dob']))
        {
        $dob=$fetchUserInfo['dob'];
        }
        else
        {
            $dob=$errStr;
        }
        if(isset($fetchUserInfo['age']))
        {
            $age=$fetchUserInfo['age'];
        }
        else
        {
            $age=$errStr;
        }
        if(isset($fetchUserInfo['job']))
        {
        $job=$fetchUserInfo['job'];
        }
        else
        {
            $job=$errStr;
        }
        if(isset($fetchUserInfo['address']))
        {
        $address=$fetchUserInfo['address'];
        }
        else
        {
            $address=$errStr;
        }
        if(isset($fetchUserInfo['city']))
        {
        $city=$fetchUserInfo['city'];
        }
        else
        {
            $city=$errStr;
        }
        if(isset($fetchUserInfo['state']))
        {
        $state=$fetchUserInfo['state'];
        }
        else
        {
            $state=$errStr;
        }
        if(isset($fetchUserInfo['country']))
        {
        $country=$fetchUserInfo['country'];
        }
        else
        {
            $country=$errStr;
        }
        if(isset($fetchUserInfo['salary']))
        {
        $salary=$fetchUserInfo['salary'];
        }
        else
        {
            $salary=$errStr;
        }
        if(isset($fetchUserInfo['expense_limit']))
        {
        $expense_limit=$fetchUserInfo['expense_limit'];
        }
        else
        {
            $expense_limit=$errStr;
        }
    ?>
<!DOCTYPE html>

<html>

<head>

    <link rel="stylesheet" href="../dj-style.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit Profile | Monthly Expenses</title>
</head>

<body class="dj-premium">

    <!-- Navbar -->
    <div class="dj-top">
        <div class="dj-bar dj-silver dj-left-align dj-large">
            <a class="dj-bar-item dj-button dj-hide-medium dj-hide-large dj-right dj-padding-large dj-large dj-theme-d2"
                href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
            <a href="dashboard.php" class="dj-bar-item dj-padding-large"><img src="../images/1111.png" width="400rem"
                    height="40rem"></a>
            <a href="#" class="dj-bar-item dj-hide-small dj-right dj-padding-large dj-remove-underline"
                style="margin-top: 0.5rem;" title="My Account">
                <img src="../images/avatar.png" class="dj-circle" style="height:27px;width:27px" alt="Avatar">
            </a>
            <a href="../logout.php" class="dj-bar-item dj-hide-small dj-padding-large dj-remove-underline dj-right"
                style="margin-top: 0.5rem;" title="Logout">Logout</a>
            <a href="myexpenses.php" class="dj-bar-item dj-hide-small dj-padding-large dj-remove-underline dj-right"
                style="margin-top: 0.5rem;" title="Expenses">Expenses</a>
            <a href="#" class="dj-bar-item dj-hide-small dj-padding-large dj-remove-underline dj-right"
                style="margin-top: 0.5rem;" title="Account Settings">Acoount Setting</a>
            <a href="#" class="dj-bar-item dj-hide-small dj-padding-large dj-remove-underline dj-right"
                style="margin-top: 0.5rem;" title="Statement">Statement</a>
            <a href="dashboard.php" class="dj-bar-item dj-hide-small dj-padding-large dj-remove-underline dj-right"
                style="margin-top: 0.5rem;" title="Statement">Dashboard</a>

        </div>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="dj-bar-block dj-theme-d2 dj-hide dj-hide-large dj-hide-medium dj-large">
        <a href="#" class="dj-bar-item dj-button dj-padding-large">Link 1</a>
        <a href="#" class="dj-bar-item dj-button dj-padding-large">Link 2</a>
        <a href="#" class="dj-bar-item dj-button dj-padding-large">Link 3</a>
        <a href="myprofile.php" class="dj-bar-item dj-button dj-padding-large">My Profile</a>
    </div>

    <!-- Page Container -->
    <div class="dj-container dj-content" style="max-width:1400px;margin-top:80px">
        <!-- The Grid -->
        <div class="dj-row">
            <!-- Left Column -->
            <div class="dj-col m3">
                <!-- Profile -->
                <div class="dj-card-4 dj-round-large dj-premium dj-hover-shadow-white">
                    <div class="dj-container">
                        <h4 class="dj-center dj-text-orange"><a href="myprofile.php" style="text-decoration: none;">My
                                Profile</a></h4>
                        <p class="dj-center"><img src="../images/avatar.png" class="dj-circle"
                                style="height:106px;width:106px" alt="Avatar"></p>
                        <hr>
                        <b>Name : </b><?php echo $name; ?><br><br>
                        <b>Email ID : </b><?php echo $email; ?><br><br>
                        <b>Phone No. : </b><?php echo $phone_no; ?><br><br>
                        <b>DOB : </b><?php echo $dob; ?><br><br>
                        <b>Age : </b><?php echo $age; ?><br><br>
                        <b>Job : </b><?php echo $job; ?><br><br>
                        <b>Address : </b><?php echo $address; ?><br><br>
                        <b>city : </b><?php echo $city; ?><br><br>
                        <b>State : </b><?php echo $state; ?><br><br>
                        <b>Country : </b><?php echo $country; ?><br><br>
                        <b>Monthly Salary : </b><?php echo $salary; ?><br><br>
                        <b>Expense Limit : </b><?php echo $expense_limit; ?><br><br>
                    </div>
                </div>
            </div>
            <!-- Middle Column -->
            <div class="dj-col m9">
                <div class="dj-row-padding">
                    <div class="dj-col m12">
                        <div class="dj-card-4 dj-round dj-silver dj-hover-shadow-white">
                            <div class="dj-container dj-padding dj-margin-bottom">
                                <h2 class="dj-text-orange">Edit Profile </h2>
                                <form action="" method="post">
                                    <div class="dj-row-padding">
                                        <div class="dj-third">
                                            <span class="dj-left dj-padding-16">Name :</span>
                                            <input type="text" class="dj-input dj-round-large dj-premium" name="name">
                                        </div>
                                        <div class="dj-third">
                                            <span class="dj-left dj-padding-16">DOB :</span>
                                            <input type="date" placeholder="yyyy-mm-dd"
                                                class="dj-input dj-round-large dj-premium" name="dob" required>
                                        </div>
                                        <div class="dj-third">
                                            <span class="dj-left dj-padding-16">Age :</span>
                                            <input type="number" class="dj-input dj-round-large dj-premium" name="age">
                                        </div>
                                    </div><br>
                                    <div class="dj-row-padding">
                                        <div class="dj-third">
                                            <span class="dj-left dj-padding-16">Job :</span>
                                            <input type="text" class="dj-input dj-round-large dj-premium" name="job">
                                        </div>
                                        <div class="dj-third">
                                            <span class="dj-left dj-padding-16">Monthly Salary :</span>
                                            <input type="number" class="dj-input dj-round-large dj-premium"
                                                name="salary">
                                        </div>
                                        <div class="dj-third">
                                            <span class="dj-left dj-padding-16">Expense limit :</span>
                                            <input type="number" class="dj-input dj-round-large dj-premium"
                                                name="limit">
                                        </div>
                                    </div><br>
                                    <div class="dj-row-padding">
                                        <div class="dj-half">
                                            <span class="dj-left dj-padding-16">Email ID :</span>
                                            <input type="email" value="<?php echo $email; ?>"
                                                class="dj-input dj-round-large dj-premium" name="email">
                                        </div>
                                        <div class="dj-half">
                                            <span class="dj-left dj-padding-16">Mobile No. :</span>
                                            <input type="number" class="dj-input dj-round-large dj-premium"
                                                name="ph_no">
                                        </div>
                                    </div><br>
                                    <div class="dj-row-padding">
                                        <div class="dj-quarter">
                                            <span class="dj-left dj-padding-16">Address :</span>
                                            <input type="text" class="dj-input dj-round-large dj-premium" name="add">
                                        </div>
                                        <div class="dj-quarter">
                                            <span class="dj-left dj-padding-16">City :</span>
                                            <input type="text" class="dj-input dj-round-large dj-premium" name="city">
                                        </div>
                                        <div class="dj-quarter">
                                            <span class="dj-left dj-padding-16">State :</span>
                                            <input type="text" class="dj-input dj-round-large dj-premium" name="state">
                                        </div>
                                        <div class="dj-quarter">
                                            <span class="dj-left dj-padding-16">Country :</span>
                                            <input type="text" class="dj-input dj-round-large dj-premium"
                                                name="country">
                                        </div>
                                    </div><br>
                                    <div class="dj-row-padding">
                                        <div class="dj-half">
                                            <span class="dj-left dj-padding-16">Bio :</span>
                                            <textarea rows="4" class="dj-input dj-round-large dj-premium"
                                                name="bio"></textarea>
                                        </div>

                                    </div>
                                    <button name="btnSubmit"
                                        class="dj-margin-top-32 dj-margin-bottom dj-margin-left dj-button dj-orange dj-round-large">Submit</button>
                                </form>
                                <?php
                                if(isset($_REQUEST['btnSubmit']))
                                {
                                    $name=$_REQUEST['name'];
                                    $dob=$_REQUEST['dob'];
                                    $age=$_REQUEST['age'];
                                    $job=$_REQUEST['job'];
                                    $salary=$_REQUEST['salary'];
                                    $limit=$_REQUEST['limit'];
                                    $email=$_REQUEST['email'];
                                    $ph_no=$_REQUEST['ph_no'];
                                    $add=$_REQUEST['add'];
                                    $city=$_REQUEST['city'];
                                    $state=$_REQUEST['state'];
                                    $country=$_REQUEST['country'];
                                    $bio=$_REQUEST['bio'];
                                    $editUser="UPDATE tbl_user SET name='$name', email='$email', phone_no='$ph_no',
                                     dob='$dob', age='$age', job='$job', salary='$salary', expense_limit='$limit', 
                                     address='$add', city='$city', state='$state', country='$country', bio='$bio', 
                                     log='1' WHERE u_id='$userId'";
                                    if(mysqli_query($conn,$editUser))
                                    {
                                        echo '<script>alert("Updated Successfully..");
                                        window.location.href="editprofile.php";
                                        </script>';
                                    }
                                    else
                                    {
                                        echo "<script>alert('Something Went Wrong');</script>";
                                    }
                                }
                                ?>

                                <p class="dj-margin-left dj-text-orange">To change Your Password - <a href=""
                                        class="dj-remove-underline dj-text-white">Click Here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
        // Used to toggle the menu on smaller screens when clicking on the menu button
        function openNav() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("dj-show") == -1) {
                x.className += " dj-show";
            } else {
                x.className = x.className.replace(" dj-show", "");
            }
        }
        </script>
</body>

</html>
<?php
}
else
{
	header("location: ../login.php");
}
?>