<?php
    session_start();
    if(isset($_SESSION['user'])) {
        date_default_timezone_set("Asia/Kolkata");
        include '../connection.php';
        $mon=$_REQUEST['date'];
        $month=$mon-1;
        $year=date("Y");
        $curDate=date("Y-m-d");
        $curTime=date("h:i:s");
        $from="$year-$month-01";
        $to="$year-$month-31";
        $userId=$_SESSION['user'];
        $ttl_amt=0;
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
        

            $fetchTransaction="SELECT * FROM tbl_expenses WHERE u_id='$userId' AND date>='$from' AND date<='$to' ORDER BY date ASC";
            $fetchTransactionResult=mysqli_query($conn,$fetchTransaction);

            $date1=date_create($to);
            $too=date_format($date1,"d F, Y");

            $date1=date_create($from);
            $froom=date_format($date1,"d F, Y");

            require('fpdf184/fpdf.php');

            class PDF extends FPDF
            {
                /* Page header */
                function Header()
                {
                    global $too;

                    global $froom;

                    $this->SetFont('Arial','B',15);
      
                    $this->Cell(0,5,'Statement From '.$froom.' To '.$too,0,1,'C');

                }
                /* Page footer */
                function Footer()
                {
                    /* Position at 1.5 cm from bottom */
                    $this->SetY(-15);
                    /* Arial italic 8 */
                    $this->SetFont('Arial','I',8);
                    /* Page number */
                    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
                }
            }
    
            $pdf = new PDF();

            $pdf->SetAutoPageBreak(true, 0);

            $pdf->AliasNbPages();
    
            $pdf->AddPage();
    
            $pdf->SetFont('Arial','B',10);

            $pdf->Ln();

            $pdf->Ln();

            $pdf->Cell(10,10,"No",1);

            $pdf->Cell(30,10,"Name",1);

            $pdf->Cell(20,10,"Date",1);

            $pdf->Cell(15,10,"Amount",1);

            $pdf->Cell(40,10,"Category",1);

            $pdf->Cell(70,10,"Comment",1);

            $pdf->Ln();

            while($allTransaction=mysqli_fetch_array($fetchTransactionResult)){

                static $num = 1;

                $ename = $allTransaction['ename'];

                $date = $allTransaction['date'];
            
                $time = $allTransaction['time'];

                $amount = $allTransaction['amount'];

                $category = $allTransaction['category'];

                $comment = $allTransaction['comment'];

                $pdf->Cell(10,10,$num,1);

                $pdf->Cell(30,10,$ename,1);

                $pdf->Cell(20,10,$date,1);

                $pdf->Cell(15,10,$amount,1);

                $pdf->Cell(40,10,$category,1);

                $pdf->Cell(70,10,$comment,1);

                $pdf->Ln();

                $num++;
            }
    
            $pdfdoc = $pdf->Output("","S");

            require '../mail\vendor/phpmailer\phpmailer/src/Exception.php';

            require '../mail\vendor/phpmailer\phpmailer/src/SMTP.php';

            require '../mail\vendor/phpmailer\phpmailer/src/PHPMailer.php';

            require '../mail\vendor/autoload.php';

            $email = new PHPMailer\PHPMailer\PHPMailer();

            $email->IsSMTP();

            $email->SMTPAuth = true;

            $email->SMTPSecure = 'ssl';

            $email->Host = "smtp.gmail.com";

            $email->Port = 465;

            $email->isHTML(true);

            $email->Username = "outgomonthlyexpenses@gmail.com";

            $email->Password = "wgwmcpmbskfvemer";

            $email->SetFrom("outgomonthlyexpenses@gmail.com");

            $email->AddAddress($useremail);

            $email->Subject = "Statment of your Account";

            $message.="
            <h4>Dear ".$userName.",
            <h3>Statement of your Account</h3>
            <p>*** It is computer generated statement ***</p>
            <p>Please feel free to mail us on : <a href='outgomonthlyexpenses@gmail.com'>outgomonthlyexpenses@gmail.com</a></p>";

            $email->Body = $message;

            $email->addStringAttachment($pdfdoc,'statement.pdf');

            if($email->Send()) 
            {
                $checkUser="SELECT * FROM tbl_statement WHERE u_id='$userId'";
                $checkUserResult=mysqli_query($conn,$checkUser);
                $countSt=mysqli_num_rows($checkUserResult);
                if($countSt)
                {
                    $updateSt="UPDATE tbl_statement SET created_date='$curDate', created_time='$curTime', 
                    st_from='$from', st_to='$to', value='$mon' WHERE u_id='$userId'";
                    mysqli_query($conn,$updateSt);
                    echo '<script>
                    window.location.href="dashboard.php";
                    </script>';
                }
                else
                {
                    $insertSt="INSERT INTO tbl_statement (u_id,created_date,created_time,st_from,st_to,value)
                    VALUES ('$userId','$curDate','$curTime','$from','$to','$mon')";
                    mysqli_query($conn,$insertSt);
                    echo '<script>
                    window.location.href="dashboard.php";
                    </script>';
                }
            }

        
    }

    else
    {
        header("location: ../login.php");
    }

?>