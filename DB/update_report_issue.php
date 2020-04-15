<?php
error_reporting(0);
ini_set('display_errors', 0);

    require 'DBconnection.php';
    if(isset($_POST["status"])){

        session_start();
        $status = $_POST['status'];
        $tech_note = $_POST['note'];
        $stmt = $mysqli->prepare("UPDATE `report` SET `status`= ?, `flag`= 1, `tech_note`= ? Where `id` =  ?");
        $stmt->bind_param("sss",$status , $tech_note,$_SESSION['rId']);
        if($stmt->execute()){
            if($status == "Fixed"){
          $message = "The report has been updated successfully  \\nThank You";
                    echo "<script type='text/javascript'>
                          alert('$message');
                         window.location = '../manage_report_tech.php';
                     </script>";
            }else{
            $message = "The report has been updated successfully \\nThank You";
                    echo "<script type='text/javascript'>
                          alert('$message');
                         window.location = '../manage_report_tech.php';
                     </script>";
            }
         }

    } else {
            $message = "There is somthing wrong , Please Try again";
                    echo "<script type='text/javascript'>
                          alert('$message');
                         window.location = '../service_tech.php';
                     </script>";
     }
?>
