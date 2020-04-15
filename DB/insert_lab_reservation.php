<?php

error_reporting(0);
ini_set('display_errors', 0);

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require 'DBconnection.php';

$email = $_POST["email"];
$Lab = $_POST["LabNo"];
$semester = $_POST["semester"];
$date = $_POST["date"];
$time = $_POST["Time"];
$course_no = $_POST["course_no"];
$section = $_POST["Section"];
$student_no = $_POST["Student_No"];
$software = $_POST["Software"];
if($software != null){

}else{
$software = "null";
}

$Date = date("Y-m-d", strtotime($date));

if($email != null && $Lab != null && $date != null && $time != null && $course_no != null  && $section != null && $student_no != null ){

	$stmt = $mysqli->prepare("SELECT * FROM `reservation` WHERE `date` = ? AND `time` = ? AND `semester` = ? AND `labno` = ?  ");
	$stmt->bind_param("ssss",$Date,$time,$semester,$Lab);
    $stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0){
        $message = "Sorry this Lab is not available at this time \\nPlease try again";
		echo "<script type='text/javascript'>
						  alert('$message');
             window.location = '../lab_reservation.php';
         </script>";
    }else{
        $stmt = $mysqli->prepare("INSERT INTO `reservation`(`email`, `labno`, `semester`, `date`, `time`, `courseno`, `section`, `studentno`, `software`) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss",$email,$Lab,$semester,$Date,$time,$course_no,
                          $section,$student_no,$software);
        if($stmt->execute()){
            $mail = new PHPMailer;
            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
            $mail->SMTPAuth= true;
            $mail->Username='tech.report.issue@gmail.com';
            $mail->Password='zaxs123123';
            $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                          // TCP port to connect to

            $mail->setFrom("tech.report.issue@gmail.com", "CCSE System");
            //$mail->addReplyTo($email, $_SESSION['name']);
            $mail->addAddress($email);   // Add a recipient
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            $mail->isHTML(true);  // Set email format to HTML

            $bodyContent = '
            <h3>Reservation Lab </h3>

            <p><b>University of Jeddah</b><br>

            <br>Dear '.$_SESSION['name'].',<br>

            Please be informed that you reserve '.$Lab.' Lab </h3><br><p>At time <b>'.$time.'</b><br> On Date <b>'.$Date.'</b></p>

            Thank you,<br>
            <b>CCSE System</b>
            </p>';

            $mail->Subject = 'Reserving Lab ('.$time.') in ('.$Date.')';
            $mail->Body = $bodyContent;


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
                $message = "Your lab reservation have been completed successfully \\nYou have reserved lab $Lab ...\\nAt $time ...\\nIn ".$Date." ...\\nPlease check you email for more information ...\\nThank You";
                    echo "<script type='text/javascript'>
                                  alert('$message');
                                 window.location = '../service.php';
                             </script>";
                }
            }
        }
 }else{
$message = "Please fill out the form and send it back \\nThank You";
    echo "<script type='text/javascript'>
          alert('$message');
         window.location = '../service.php';
     </script>";
}
?>
