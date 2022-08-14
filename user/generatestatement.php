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
        $useremail=$userInfo['email'];
        $date1=date_create($dob);
        $dob=date_format($date1,"F d, Y");
        
        if(isset($_REQUEST['btnstmt'])){
            $to = $_REQUEST['to'];
            $from = $_REQUEST['from'];

            $fetchTransaction="SELECT * FROM tbl_expenses WHERE u_id='$userId' AND date>='$from' AND date<='$to' ORDER BY date ASC";
            $fetchTransactionResult=mysqli_query($conn,$fetchTransaction);
            $allTransaction=mysqli_fetch_all($fetchTransactionResult,MYSQLI_ASSOC);

            $date1=date_create($to);
            $too=date_format($date1,"d F, Y");

            $date1=date_create($from);
            $froom=date_format($date1,"d F, Y");

            function fetch_data(){
                global $to,$from;
                
                $output='';

                global $fetchTransactionResult;

                while($allTransaction=mysqli_fetch_array($fetchTransactionResult)){
                    $output .= '
                    <tr style="padding:5px;">
                    <td>1</td>
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
        ?>
<!DOCTYPE html>

<html>

<head>
    <title>Dashboard | Monthly Expenses</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../dj-style.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>

<body class="dj-premium">
    <div class="dj-silver dj-round-large dj-card-4 dj-padding-32 dj-margin">
        <div class="dj-margin-left dj-bar-item dj-center">
            <img src="../images/1111.png" width="400rem" height="40rem">
        </div>
    </div>
    <div class="dj-container dj-margin">
        <div class="dj-row-padding">
            <h4><b class="dj-text-orange">Name : </b><?php echo $userName; ?></h4>
        </div>
        <div class="dj-row-padding">
            <h4><b class="dj-text-orange">Email ID : </b><?php echo $useremail; ?></h4>
        </div>
        <div class="dj-row-padding">
            <div>
                <h4><b class="dj-text-orange">Transaction Date : </b>From <b><?php echo $froom; ?></b> To
                    <b><?php echo $too; ?></b>
                </h4>
            </div>

        </div>
        <hr>
        <table class="dj-silver dj-margin-top dj-padding dj-round-large dj-hover-shadow-white dj-margin-bottom dj-left"
            cellpadding="8" cellspacing="12" style="width:100% ;">
            <tr style="text-align: left;" class="dj-text-orange">
                <th>No.</th>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Comment</th>
            </tr>
            </thead>
            <?php 
                                        
                                        foreach($allTransaction as $transactionresult)
                                        {
                                            $index++;
                                    ?>
            <tr>
                <td><?php echo $index; ?></td>
                <td><?php echo $transactionresult['ename']; ?></td>
                <td><?php echo $transactionresult['date']; ?></td>
                <td><?php echo $transactionresult['time']; ?></td>
                <td><?php echo $transactionresult['amount']; ?></td>
                <td><?php echo $transactionresult['category']; ?></td>
                <td><?php echo $transactionresult['comment']; ?></td>

            </tr>
            <?php
                                        }
                                    ?>

        </table>



    </div>


    <div class="dj-margin dj-padding">
        <hr>
        <p class="dj-text-orange">* This is System generated statement. Hence,it does not require any
            signature.</p><br>
        <form action="generatepdf.php" method="post">
            <input type="hidden" name="to" value="<?php echo $to; ?>">
            <input type="hidden" name="from" value="<?php echo $from; ?>">
            <button type="button" class="dj-button dj-round-large dj-orange" id="printpagebutton" onclick="myFunction()"
                name="downloadstmt">Download Statement</button>
            <button type="submit" name="pdf" class="dj-button dj-round-large dj-orange dj-margin-left" id="email">Email
                Statement</button>
        </form>

    </div>

    <script>
    function myFunction() {
        var printButton = document.getElementById("printpagebutton");
        var email = document.getElementById("email");

        printButton.style.visibility = 'hidden';
        email.style.visibility = 'hidden';

        window.print()
        printButton.style.visibility = 'visible';
        email.style.visibility = 'visible';
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