<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        $userId=$_SESSION['user'];
        date_default_timezone_set("Asia/Kolkata");
        include '../connection.php';
        $fetchUser="SELECT * FROM tbl_user WHERE u_id='$userId'";
        $fetchUserResult=mysqli_query($conn,$fetchUser);
        $fetchUserInfo=mysqli_fetch_assoc($fetchUserResult);
        $name=$fetchUserInfo['name'];
        $job=$fetchUserInfo['job'];
        $bio=$fetchUserInfo['bio'];
        $dob=$fetchUserInfo['dob'];
        $date1=date_create($dob);
        $dob=date_format($date1,"d F, Y");
        $email=$fetchUserInfo['email'];
        $age=$fetchUserInfo['age'];
        $address=$fetchUserInfo['address'];
        $phone_no=$fetchUserInfo['phone_no'];
        $country=$fetchUserInfo['country'];
        $salary=$fetchUserInfo['salary'];
        $expense_limit=$fetchUserInfo['expense_limit'];
        $joined_since=$fetchUserInfo['joined_since'];
        $date2=date_create($joined_since);
        $joined_since=date_format($date2,"F, Y");
?>
<!DOCTYPE html>

<html>

<head>

    <link rel="stylesheet" href="../dj-style.css">
    <title>Dashboard | Monthly Expenses</title>
</head>

<body class="dj-premium">
    <div class="dj-row dj-card-4 dj-round-large dj-text-orange dj-display-topmiddle dj-center dj-margin-top-32"
        style="padding-left: 50px;padding-right:50px;padding-top:7px;padding-bottom:7px;box-shadow: 1px 1px 2px rgb(88, 86, 86), 0 0 25px rgb(151, 150, 150), 0 0 5px darkblue"
        width="350px" height="350px">
        <h1 style="text-shadow:1px 1px 0 #444;font-weight: 9000;font-size: xx-large;"><strong>My Profile</strong></h1>
    </div><br><br><br><br>
    <div class="dj-row" style="margin-right: 8rem;">
        <div class="dj-col s6 dj-center" style="margin-top: 5rem;">
            <img src="../images/avatar.png" class="dj-circle"
                style="box-shadow: 1px 1px 2px rgb(88, 86, 86), 0 0 25px rgb(80, 79, 79), 0 0 5px darkblue;margin-left: 10rem;"
                width="350px" height="350px">
        </div>
        <div class="dj-col s6" style="margin-top: 4.5rem;">
            <h1 style="text-shadow:1px 1px 0 #444;font-weight: 9000;font-size: xx-large;">Welcome , <b
                    class="dj-text-orange"><?php echo $name; ?></b></h1>
            <h4><strong class="dj-text-orange">Job : </strong><?php echo $job; ?></h4>
            <h4 class="dj-text-gray"><?php echo $bio; ?></h4>
            <table cellspacing="2" cellpadding="6">
                <tr>
                    <td class="dj-text-orange"><b>Birthday</b></td>
                    <td class="dj-center">:</td>
                    <td><?php echo $dob; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="dj-text-orange"><b>Email ID</b></td>
                    <td class="dj-center">:</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td class="dj-text-orange"><b>Age</b></td>
                    <td class="dj-center">:</td>
                    <td><?php echo $age; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="dj-text-orange"><b>Phone No</b></td>
                    <td class="dj-center">:</td>
                    <td><?php echo $phone_no; ?></td>
                </tr>
                <tr>
                    <td class="dj-text-orange"><b>Address</b></td>
                    <td class="dj-center">:</td>
                    <td><?php echo $address; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="4" rowspan="2">
                        <button type="button" name="btnedit"
                            class="dj-button dj-round-large dj-white dj-padding dj-margin-left"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                            </svg><a href="editprofile.php" style="text-decoration: none;"> Edit Profile</a></button>
                    </td>
                </tr>
                <tr>
                    <td class="dj-text-orange"><b>Resident</b></td>
                    <td class="dj-center">:</td>
                    <td><?php echo $country; ?></td>


                </tr>
            </table>
        </div>
    </div>
    <div class="dj-row dj-card-4 dj-round-large dj-text-orange dj-padding dj-display-bottommiddle dj-center"
        style="margin-bottom:6rem;width: 1000px;">
        <div class="dj-col s3">
            <h5><strong>Monthly Salary</strong></h5>
            <hr>
            <h4 class="dj-text-white"><strong><?php echo $salary; ?></strong></h4>
        </div>
        <div class="dj-col s3 ">
            <h5><strong>Expenses Limit</strong></h5>
            <hr>
            <h4 class="dj-text-white"><strong><?php echo $expense_limit; ?></strong></h4>
        </div>
        <div class="dj-col s3 ">
            <h5><strong>Monthly Salary</strong></h5>
            <hr>
            <h4 class="dj-text-white"><strong><?php echo $expense_limit; ?></strong>
        </div>
        <div class="dj-col s3 ">
            <h5><strong>Joined Since</strong></h5>
            <hr>
            <h4 class="dj-text-white"><strong><?php echo $joined_since; ?></strong>
        </div>
    </div>

</body>

</html>
<?php
}
else
{
	header("location: ../login.php");
}
?>