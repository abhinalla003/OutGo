<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        if(isset($_REQUEST['pdf'])){

            $to = $_REQUEST['to'];
            $from = $_REQUEST['from'];

            $date1=date_create($to);
            $to=date_format($date1,"Y/m/d");

            $date1=date_create($from);
            $from=date_format($date1,"Y/m/d");

            function fetch_data(){
                global $to,$from;
                
                $output='';
                include '../connection.php';
                $userId=$_SESSION['user'];
                $index=0;
                date_default_timezone_set("Asia/Kolkata");
                $fetchTransaction="SELECT * FROM tbl_expenses WHERE u_id='$userId' AND date>='$from' AND date<='$to'";
                $fetchTransactionResult=mysqli_query($conn,$fetchTransaction);
                while($allTransaction=mysqli_fetch_array($fetchTransactionResult)){
                    $output .= '
                    <tr>
                    <td>'.$index++.'</td>
                    <td>'.$allTransaction['ename'].'</td>
                    <td>'.$allTransaction['date'].'</td>
                    <td>'.$allTransaction['time'].'</td>
                    <td>'.$allTransaction['amount'].'</td>
                    <td>'.$allTransaction['category'].'</td>
                    <td>'.$allTransaction['comment'].'</td>
                </tr>
                    ';
                }
                return $output;
            }

            
        }
    }

else
{
header("location: ../login.php");
}
?>