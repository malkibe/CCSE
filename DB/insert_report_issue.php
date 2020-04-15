<?php

error_reporting(0);
ini_set('display_errors', 0);

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require 'DBconnection.php';

session_start();

$email = $_POST["email"];
$office_no = $_POST["Office_No"];
$tech_issue = $_POST["ComType"];
$OS = $_POST["OS"];
$Problem_type = $_POST["ProType"];
$Comment = $_POST["comment"];
$Date = date("Y-m-d");
$tech_note = "null";
$status = "null";
$flag = 0 ;

if($email != null && $office_no != null && $tech_issue != null && $OS != null  && $Problem_type != null){
	$stmt = $mysqli->prepare("INSERT INTO `report`(`facultymembeEmail`, `datetime`, `categoryname`, `officeno`, `computertype`, `operatingsystem`, `problem`, `note`, `tech_note`, `status`,`flag`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssssssss",$email,$Date,$Problem_type,$office_no,$tech_issue,$OS,$Problem_type,$Comment,$tech_note,$status,$flag);
	if($stmt->execute()){
		$stmt = $mysqli->prepare("SELECT * FROM `technician` WHERE `category_name` = ?");
		$stmt->bind_param("s", $Problem_type);
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

		$mail->setFrom($email, "CCSE System");
		//$mail->addReplyTo($email, $_SESSION['name']);
		$mail->addAddress($tech_email,$name);   // Add a recipient
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		$mail->isHTML(true);  // Set email format to HTML

		$bodyContent = '<h1>You have recieved a new report issue </h1>';
		$bodyContent .= '<p>Please check your account for more details <br>CCSE System</br></p>';

		$mail->Subject = 'Report issue from '.$_SESSION['name'];
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
		$message = "Your report has been submitted successfully \\nAnd an email have been successfully sent to $tech_email ... \\nThank You";
			echo "<script type='text/javascript'>
						  alert('$message');
						 window.location = '../service.php';
					 </script>";
		}

	}else{
	$message = "Your request is failed !!! \\nPlease Try Again";
    echo "<script type='text/javascript'>
          alert('$message');
         window.location = '../report_issues.php';
     </script>";
	}
}else{
	$message = "Please fill out the form and send it back \\nThank You";
    echo "<script type='text/javascript'>
          alert('$message');
         window.location = '../report_issues.php';
     </script>";
}
?>
