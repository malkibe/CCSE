<?php
error_reporting(0);
ini_set('display_errors', 0);

require ('DBconnection.php');

session_start();

$id= $_POST["ID"];
$pass= $_POST["pass"];

if($id != null && $pass != null){
	$stmt = $mysqli->prepare("SELECT * FROM `faculty_members` WHERE `JobId` = ? AND `password` = ?");
	$stmt->bind_param("ss", $id , $pass);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
		  $name = $row['name'];
          $JobId = $row['JobId'];
          $email = $row['email'];
		}
    $_SESSION['fac_email'] = $email;
	$_SESSION['name'] = $name;
    $_SESSION['JobId'] = $JobId;
    $_SESSION['logged'] = true;
    $message = "The Login is Succesfully \\nWelcome ".$name;
    echo "<script type='text/javascript'>
          alert('$message');
         window.location = '../service.php';
     </script>";
	}else{
	$stmt = $mysqli->prepare("SELECT * FROM `technician` WHERE `JobId` = ? AND `password` = ?");
	$stmt->bind_param("ss", $id , $pass);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
		  $name = $row['name'];
          $JobId = $row['JobId'];
          $tech_categ = $row['category_name'];
		}
    $_SESSION['tech_categ'] = $tech_categ;
	$_SESSION['tecg_name'] = $name;    
    $_SESSION['tech_JobId'] = $JobId;
    $_SESSION['logged'] = true;
    $message = "The Login is Succesfully \\nWelcome ".$name;
    echo "<script type='text/javascript'>
          alert('$message');
         window.location = '../service_tech.php';
     </script>";
	}else{
    $message = "Incorrect UserID or Password ! \\nPlease Try Again";
    echo "<script type='text/javascript'>
          alert('$message');
         window.location = '../index.php';
     </script>";
	}
}
		$stmt->close();
}else{
	$message = "Your request has been filed !!! \\nPlease Try Again";
    echo "<script type='text/javascript'>
          alert('$message');
         window.location = '../index.php';
     </script>";
}
?>
