<?php
error_reporting(0);
ini_set('display_errors', 0);


require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require 'DBconnection.php';

session_start();

$dep = $_POST["Department"];
$time = $_POST["Time"];
$sdate = $_POST["Date"];

$date = date("Y-m-d", strtotime($sdate));

$fId = $_SESSION['JobId'];
if($dep != null && $time != null && $date != null){


	$stmt = $mysqli->prepare("INSERT INTO `meeting`(`facultymemberid`, `CategoryType`, `date`, `time`) VALUES (?,?,?,?)");
	$stmt->bind_param("ssss",$fId,$dep,$date,$time);
	if($stmt->execute()){

        $stmt = $mysqli->prepare("SELECT * FROM `technician` WHERE `category_name` = ?");
		$stmt->bind_param("s", $dep);
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
			  $tech_email = $row['email'];
			  $name = $row['name'];
			}
		}

		$mail = new PHPMailer;
		$mail->isSMTP();                            // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
		$mail->SMTPAuth= true;
		$mail->Username='tech.report.issue@gmail.com';
		$mail->Password='zaxs123123';
		$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                          // TCP port to connect to

		$mail->setFrom($_SESSION['fac_email'], "CCSE System");
		//$mail->addReplyTo($email, $_SESSION['name']);
		$mail->addAddress($tech_email,$name);   // Add a recipient
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		$mail->isHTML(true);  // Set email format to HTML

		$bodyContent = '
        <h3>Scheduled Meeting with '.$_SESSION['name'].'</h3>

        <p>You have a meeting in <b>'.$date.'</b> <br>at <b>'.$time.'</b>

        </p>';

		$mail->Subject = 'Schedule Meeting on '.$date;
		$mail->Body    = $bodyContent;


		$mail->SMTPOptions = array(
			'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
			)
		);

		if(!$mail->send()) {
			echo "<script type='text/javascript'>
						  alert('Email sending failed...');
				 </script>";
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		$message = "Your meeting has been scheduled successfully \\nMore information is sent to your email ... \\nThank You";
			echo "<script type='text/javascript'>
						  alert('$message');
						 window.location = '../service.php';
					 </script>";
		}
    }else{
    	$message = "Your request has been failed !!! \\nPlease Try Again";
    echo "<script type='text/javascript'>
          alert('$message');
         window.location = '../schedule_meeting.php';
     </script>";
    }
}else{
	$message = "Please fill out the form and send it back \\nThank You";
    echo "<script type='text/javascript'>
          alert('$message');
         window.location = '../schedule_meeting.php';
     </script>";
}
?>
