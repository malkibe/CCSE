<?php
error_reporting(0);
ini_set('display_errors', 0);
    session_start();
    require 'DB/DBconnection.php';

    $email = $_SESSION['fac_email'];
    $stmt = $mysqli->prepare("SELECT * FROM `report` WHERE `facultymembeEmail` = ?");
    $stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0){
         ;
     } else {
     $message = "You don\'t have any report issues \\nThank You";
     echo "<script type='text/javascript'>
                          alert('$message');
                         window.location = 'service.php';
            </script>";
     }

    if(isset($_POST['button'])){

    $id = $_POST['id'];
    $flag = 0;

    $stmt = $mysqli->prepare("SELECT * FROM `report` WHERE `id` = ? AND `flag` = ?");
	$stmt->bind_param("ss", $id , $flag);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0){
    $stmt = $mysqli->prepare("DELETE FROM `report` WHERE `id` = ? AND `flag` = ?");
	$stmt->bind_param("ss",$id,$flag);
    $stmt->execute();

		$message = "Your report has been canceled successfully \\nThank You";
			echo "<script type='text/javascript'>
						  alert('$message');
						 window.location = 'manage_report.php';
					 </script>";
    }else{
    $true = 1 ;
    $stmt = $mysqli->prepare("SELECT `categoryname` FROM `report` WHERE `id` = ? AND `flag` = ?");
	$stmt->bind_param("ss", $id , $true);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
        $catename = $row['categoryname'];
       }
    }
    $message = "You can not cancel this report \\nBecause it\'s open from the $catename department \\nThank You";
	echo "<script type='text/javascript'>
						  alert('$message');
						 window.location = 'manage_report.php';
				</script>";
    }

    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="ccse-icon" sizes="76x76" href="assets/img/CCSE.jpeg" />
    <link rel="icon" type="image/jpeg" href="assets/img/CCSE.jpeg" />
    <title>CCSE - Technical Support</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />

    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.two.css" rel="stylesheet" />

</head>

<body>



    <img src="assets/img/Jed_Uni.jpeg" width="250" style="float:right">
    <img src="assets/img/CCSE.jpeg" width="200">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="service.php">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="report_issues.php">Report Issue</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="schedule_meeting.php">Schedule Meeting</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="lab_reservation.php">Lab Reservation</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="manage_report.php">Manage Report</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="Signout.php">Sign Out</a>
              </li>
            </ul>
        </div>
    </nav>
    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="blue" id="wizardProfile">
                        <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->
                        <div class="wizard-header text-center">
                            <h2 class="wizard-title">Manage Report</h2>
                        </div>

                        <div class="wizard-navigation">
                            <div class="progress-with-circle">
                                <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                            </div>
                            <ul>
                                <li>
                                    <a href="#about" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-settings"></i>
                                        </div>

                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                                <div class="form-horizontal">
                                    <?php
                                            require 'DB/DBconnection.php';

                                            if (isset($_GET['pageno'])) {
                                            $pageno = $_GET['pageno'];
                                            } else {
                                            $pageno = 1;
                                            }

                                            $no_of_records_per_page = 10;
                                            $offset = ($pageno-1) * $no_of_records_per_page;


                                            $total_pages_sql = "SELECT COUNT(*) FROM `report`";
                                            $result = mysqli_query($mysqli,$total_pages_sql);
                                            $total_rows = mysqli_fetch_array($result)[0];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                                            $stmt = $mysqli->prepare("SELECT * FROM`report` WHERE`facultymembeEmail` = ? LIMIT $offset , $no_of_records_per_page");
                                            $stmt->bind_param("s", $email);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()) {
                                                    $id = $row["id"];
                                                    $categoryname = $row["categoryname"];
                                                    $_SESSION['id'] = $id;
                                                    $_SESSION['categoryname'] = $categoryname;

                                                   echo "<div class='form-group'>";
                                                   echo "<div class='col-sm-6 control-label'>";
                                                   echo "<label for='Report'>Technical Issue Form $id</label>";
                                                   echo "</div>";
                                                   echo "<div class='col-sm-1'>";
                                                   echo '<form action="view_report_issue.php" method="post">';
                                                   echo "<input type='hidden' name='id' value='".$id."'>";
                                                   echo "<button type='submit' name='submit' class='btn btn-info'>View</button>";
                                                   echo "</form>";
                                                   echo "</div>";
                                                   echo "<div class='col-sm-2'>";
                                                   echo '<form action="" method="post">';
                                                   echo "<input type='hidden' name='id' value='".$id."'>";
                                                   echo "<button type='submit' name='button' class='btn btn-info'>Cancel</button>";
                                                   echo "</form>";
                                                   echo "</div>";
                                                   echo "</div>";
                                                }
                                            }
                                            ?>
                                </div>
                            </div>
                        </div>
                        <ul class="pagination text-center">
                            <li><a href="?pageno=1">First</a></li>
                            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                            </li>
                            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                            </li>
                            <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                        </ul>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item">
                            <a href="#">About</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Contact</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Terms of Use</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="FAQ.html">FAQ</a>
                        </li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2020. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fa fa-facebook fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fa fa-twitter-square fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-instagram fa-2x fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>

</html>
