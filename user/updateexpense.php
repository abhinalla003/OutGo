<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        include '../connection.php';
        $userId=$_SESSION['user'];
        $ttl_amt=0;
        date_default_timezone_set("Asia/Kolkata");

        $myExpenses="UPDATE tbl_expenses SET  WHERE u_id='$userId'";
        $myExpensesResult=mysqli_query($conn,$myExpenses);
        $allExpenses=mysqli_fetch_all($myExpensesResult,MYSQLI_ASSOC);
        $index=0;
    }
    else
    {
        header("location: ../login.php");
    }
?>