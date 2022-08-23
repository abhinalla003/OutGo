<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        include '../connection.php';
        $userId=$_SESSION['user'];
        $ttl_amt=0;
        date_default_timezone_set("Asia/Kolkata");
        $userDetails="SELECT * FROM tbl_user WHERE u_id='$userId'";
        $userDetailsResult=mysqli_query($conn,$userDetails);
        $userInfo=mysqli_fetch_assoc($userDetailsResult);
        $userName=$userInfo['name'];
        $userJob=$userInfo['job'];
        $userState=$userInfo['state'];
        $userCountry=$userInfo['country'];
        $dob=$userInfo['dob'];
        $image=$userInfo['image'];
        $date1=date_create($dob);
        $dob=date_format($date1,"F d, Y");

        $fetchCategory="SELECT * FROM tbl_category";
        $fetchCategoryResult=mysqli_query($conn,$fetchCategory);
        $allCategory=mysqli_fetch_all($fetchCategoryResult,MYSQLI_ASSOC);

        $myExpenses="SELECT * FROM tbl_expenses WHERE u_id='$userId' ORDER BY date ASC";
        $myExpensesResult=mysqli_query($conn,$myExpenses);
        $allExpenses=mysqli_fetch_all($myExpensesResult,MYSQLI_ASSOC);
        $index=0;
        ?>
<!DOCTYPE html>

<html>

<head>

    <link rel="stylesheet" href="../dj-style.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard | Monthly Expenses</title>
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
                <img src="<?php echo "../uploadProfiles/".$image; ?>" class="dj-circle" style="height:27px;width:27px" alt="Avatar">
            </a>
            <a href="../logout.php" class="dj-bar-item dj-hide-small dj-padding-large dj-remove-underline dj-right"
                style="margin-top: 0.5rem;" title="Logout">Logout</a>
            <a href="#" class="dj-bar-item dj-hide-small dj-padding-large dj-remove-underline dj-right"
                style="margin-top: 0.5rem;" title="Expenses">Expenses</a>
            <a href="#" class="dj-bar-item dj-hide-small dj-padding-large dj-remove-underline dj-right"
                style="margin-top: 0.5rem;" title="Account Settings">Acoount Setting</a>
            <a href="statement.php" class="dj-bar-item dj-hide-small dj-padding-large dj-remove-underline dj-right"
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
                        <p class="dj-center"><img src="<?php echo "../uploadProfiles/".$image; ?>" class="dj-circle"
                                style="height:106px;width:106px" alt="Avatar"></p>
                        <hr>
                        <p><i class="fa fa-user fa-fw dj-margin-right dj-text-theme"></i> <?php echo $userName; ?></p>
                        <p><i class="fa fa-briefcase fa-fw dj-margin-right dj-text-theme"></i> <?php echo $userJob; ?>
                        </p>
                        <p><i class="fa fa-home fa-fw dj-margin-right dj-text-theme"></i>
                            <?php echo "$userState, ".$userCountry; ?></p>
                        <p><i class="fa fa-birthday-cake fa-fw dj-margin-right dj-text-theme"></i> <?php echo $dob; ?>
                        </p>
                    </div>
                </div>
                <br>

                <!-- Accordion -->
                <div class="dj-card-4 dj-round-large dj-hover-shadow-white">
                    <div class="dj-silver">
                        <button onclick="myFunction('Demo1')" class="dj-button dj-block dj-left-align"><i
                                class="fa fa-coins fa-fw dj-margin-right"></i> My Expenses</button>
                        <div id="Demo1" class="dj-hide dj-container">
                            <p>Some text..</p>
                        </div>
                        <button onclick="myFunction('Demo2')" class="dj-button dj-block dj-left-align"><i
                                class="fa fa-newspaper fa-fw dj-margin-right"></i> Last Statements</button>
                        <div id="Demo2" class="dj-hide dj-container">
                            <p>Some other text..</p>
                        </div>
                        <button onclick="myFunction('Demo3')" class="dj-button dj-block dj-left-align"><i
                                class="fa fa-calendar fa-fw dj-margin-right"></i> My Events</button>
                        <div id="Demo3" class="dj-hide dj-container">
                            <div class="dj-row-padding">
                                <br>
                                <div class="dj-half">
                                    <img src="../images/about.png" style="width:100%" class="dj-margin-bottom">
                                </div>
                                <div class="dj-half">
                                    <img src="../images/about.png" style="width:100%" class="dj-margin-bottom">
                                </div>
                                <div class="dj-half">
                                    <img src="../images/about.png" style="width:100%" class="dj-margin-bottom">
                                </div>
                                <div class="dj-half">
                                    <img src="../images/about.png" style="width:100%" class="dj-margin-bottom">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <!-- Interests -->
                <div class="dj-card dj-round-large dj-premium dj-hide-small dj-hover-shadow-white">
                    <div class="dj-container">
                        <p class="dj-text-orange">Category</p>
                        <p>
                            <?php
                            foreach($allCategory as $cat)
                            {
                                $ca_name=$cat['cname'];
                            ?>
                            <span
                                class="dj-tag dj-small dj-silver dj-round-large dj-padding dj-margin-bottom dj-margin-right"><?php echo $ca_name; ?></span>
                            <?php
                            }
                            ?>
                            <span
                                class="dj-tag dj-small dj-silver dj-round-large dj-padding dj-margin-bottom dj-margin-right"><a href="#" style="text-decoration: none;">Add</a></span>
                        </p>
                    </div>
                </div>
                <br>

<!-- Alert Box -->
                <div
                    class="dj-container dj-display-container dj-round-large dj-silver dj-card-4 dj-margin-bottom dj-hide-small dj-hover-shadow-white">
                    <span onclick="this.parentElement.style.display='none'" class="dj-button dj-display-topright">
                        <i class="fa fa-lightbulb dj-text-orange" style="margin-top: 12px;"></i>
                    </span>
                    <?php
                    if(isset($_SESSION['views']))
                    {
                        $_SESSION['views'] = $_SESSION['views']+1;
                        
                        
                    }
                    else
                    {
                        $_SESSION['views']=1;
                    }
                        $views=$_SESSION['views'];
                        $sql="SELECT * FROM tbl_tips WHERE t_id='$views'";
                        $result=mysqli_query($conn,$sql);
                        $num=mysqli_num_rows($result);
                        
                        if($num)
                        {    
                            $sql="SELECT * FROM tbl_tips WHERE t_id='$views'";
                            $result=mysqli_query($conn,$sql);
                            $allTips=mysqli_fetch_assoc($result);
                            ?>
                            <p class="dj-text-orange"><strong>Tips</strong></p>
                            <p><?php echo $allTips['msg']; ?></p>
                            <?php
                        }
                        else
                        {
                            $_SESSION['views']=1;
                            $views=1;
                            $sql="SELECT * FROM tbl_tips WHERE t_id='$views'";
                            $result=mysqli_query($conn,$sql);
                            $allTips=mysqli_fetch_assoc($result);
                            ?>
                            <p class="dj-text-orange"><strong>Tips</strong></p>
                            <p><?php echo $allTips['msg']; ?></p>
                            <?php
                        }

                    ?>
                </div>
                <!-- End Left Column -->
            </div>

            <!-- Middle Column -->
            <!-- Middle Column -->
            <div class="dj-col m9">
                <div class="dj-row-padding">
                    <div class="dj-col m12">
                        <div class="dj-card-4 dj-round dj-silver dj-hover-shadow-white">
                            <div class="dj-container dj-padding dj-margin-bottom">
                                <h2 class="dj-text-orange">My Expenses </h2>
                                <table
                                    class="dj-premium dj-margin-top dj-padding dj-round-large dj-hover-shadow-white dj-margin-bottom"
                                    cellpadding="8" cellspacing="6">
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Category</th>
                                        <th>Comment</th>
                                        <th colspan="2">Operation</th>
                                    </tr>
                                    <?php 
                                        foreach($allExpenses as $expenseresult)
                                        {
                                            $index++;
                                    ?>
                                    <tr>
                                        <td><?php echo $index; ?></td>
                                        <td><?php echo $expenseresult['ename']; ?></td>
                                        <td><?php echo $expenseresult['date']; ?></td>
                                        <td><?php echo $expenseresult['amount']; ?></td>
                                        <td><?php echo $expenseresult['category']; ?></td>
                                        <td><?php echo $expenseresult['comment']; ?></td>
                                        <td><a href="updateexpense.php?name=<?php echo $expenseresult['ename']; ?>&amount=<?php echo $expenseresult['amount']; ?>&date=<?php echo $expenseresult['date']; ?>"
                                                class="dj-button dj-silver dj-round-large">Edit/Update</a></td>
                                        <td><a href="deleteexpense.php?name=<?php echo $expenseresult['ename']; ?>&amount=<?php echo $expenseresult['amount']; ?>"
                                                class="dj-button dj-silver dj-round-large">Delete</a></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>
    <br>

    <script>
    // Accordion
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("dj-show") == -1) {
            x.className += " dj-show";
            x.previousElementSibling.className += " dj-theme-d1";
        } else {
            x.className = x.className.replace("dj-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" dj-theme-d1", "");
        }
    }
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
    <script defer src="https://use.fontawesome.com/releases/v5.15.0/js/all.js"></script>
</body>

</html>
<?php
}
else
{
	header("location: ../login.php");
}
?>