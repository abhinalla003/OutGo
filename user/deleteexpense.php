<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        include '../connection.php';
        $userId=$_SESSION['user'];
        $ttl_amt=0;
        date_default_timezone_set("Asia/Kolkata");

        $ename = $_GET['name'];

        $amount = $_GET['amount'];

        $myExpenses="DELETE from tbl_expenses WHERE u_id='$userId' AND ename='$ename' AND amount='$amount'";
        $myExpensesResult=mysqli_query($conn,$myExpenses);

        if($myExpensesResult){
            echo "<script>alert('Expense Deleted Successfully ...');
                window.location.href='myexpenses.php';
                </script>";
        }
        else{
            echo "<script>alert('Something Went Wrong ! ...');
                window.location.href='myexpenses.php';
                </script>";
        }
    }
    else
    {
        header("location: ../login.php");
    }
?>