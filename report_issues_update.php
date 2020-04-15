<?php
error_reporting(0);
ini_set('display_errors', 0);

    if(isset($_POST["submit"]) && isset($_POST['id'])){
    require 'DB/DBconnection.php';

    session_start();
    $id= $_POST['id'];
        
    $sql = "UPDATE `report` SET `flag`= 1 WHERE `id` =  $id";
     if(mysqli_query($mysqli,$sql)){
        ;      
      } 
    $sql = "SELECT * FROM `report` WHERE `id` = $id";
    $res_data = mysqli_query($mysqli,$sql);
     if (mysqli_num_rows($res_data) > 0) {
        while($row = mysqli_fetch_assoc($res_data)) {
            $_SESSION['rId'] = $row['id'];
        	$_SESSION['femail'] = $row['facultymembeEmail'];
            $_SESSION['datetime'] = $row['datetime'];
            $_SESSION['cname'] = $row['categoryname'];
            $_SESSION['officeno'] = $row['officeno'];
            $_SESSION['comtype'] = $row['computertype'];
            $_SESSION['os'] = $row['operatingsystem'];
            $_SESSION['problem'] = $row['problem'];
            $_SESSION['note'] = $row['note'];
        }
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
            <div style="width:40%; margin:auto;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="service_tech.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_report_tech.php">Manage Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Signout.php">Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="blue" id="wizardProfile">
                        <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->
                        <div class="wizard-header text-center">
                            <h2 class="wizard-title">Report technical issue</h2>
                        </div>

                        <div class="wizard-navigation">
                            <div class="progress-with-circle">
                                <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                            </div>
                            <ul>
                                <li>
                                    <a href="#about" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-support"></i>
                                        </div>

                                    </a>
                                </li>
                            </ul>
                        </div>
                        <form action="DB/update_report_issue.php" method="post" accept-charset="utf-8">
                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-1 control-label">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input name="email" type="email" class="form-control" value="<?php if(isset($_POST["submit"]) && isset($_POST['id'])){echo $_SESSION['femail'];}?>" readonly>
                                            </div>
                                            <div class="col-sm-2 control-label">
                                                <label for="Office No">Office No</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input name="Office_No" type="text" class="form-control" value="<?php if(isset($_POST["submit"]) && isset($_POST['id'])){echo $_SESSION['officeno'];}?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5 style="text-align: center;text-decoration: underline">Report technical issue</h5>
                                            <div class="col-sm-5 col-sm-offset-2">
                                                <input name="ComType" type="radio" <?php if(isset($_POST["submit"]) && isset($_POST['id'])){if($_SESSION['comtype']=="Personal Computer") {echo "checked";}}?> value="Personal Computer" readonly>
                                                <label for="Personal Computer">Personal Computer</label>
                                            </div>
                                            <div class="col-sm-4 col-sm-offset-1">
                                                <input name="ComType" type="radio" <?php if(isset($_POST["submit"]) && isset($_POST['id'])){if($_SESSION['comtype']=="Work Computer") {echo "checked";}}?> value="Work Computer" readonly>
                                                <label for="email"> Work Computer</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5 style="text-align: center;text-decoration: underline">Operating System</h5>
                                            <div class="col-sm-3 col-sm-offset-1">
                                                <input name="OS" type="radio" <?php if(isset($_POST["submit"]) && isset($_POST['id'])){if($_SESSION['os']=="Windows") {echo "checked";}}?> value="Windows" readonly>
                                                <label for="Windows">Windows</label>
                                            </div>

                                            <div class="col-sm-3 col-sm-offset-1">
                                                <input name="OS" type="radio" <?php if(isset($_POST["submit"]) && isset($_POST['id'])){if($_SESSION['os']=="MAC") {echo "checked";}}?> value="MAC" readonly>
                                                <label for="MAC">MAC</label>
                                            </div>

                                            <div class="col-sm-3 col-sm-offset-1">

                                                <input name="OS" type="radio" <?php if(isset($_POST["submit"]) && isset($_POST['id'])){if($_SESSION['os']=="Linux") {echo "checked";}}?> value="Linux" readonly>
                                                <label for="Linux">Linux</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5 style="text-align: center;text-decoration: underline">Problem type</h5>
                                            <div class="col-sm-3 col-sm-offset-1">
                                                <input name="ProType" type="radio" <?php if(isset($_POST["submit"]) && isset($_POST['id'])){if($_SESSION['problem']=="Network") {echo "checked";}}?> value="Network" readonly>
                                                <label for="Network">Network</label>
                                            </div>

                                            <div class="col-sm-3 col-sm-offset-1">
                                                <input name="ProType" type="radio" <?php if(isset($_POST["submit"]) && isset($_POST['id'])){if($_SESSION['problem']=="Software") {echo "checked";}}?> value="Software" readonly>
                                                <label for="Software">Software</label>
                                            </div>

                                            <div class="col-sm-3 col-sm-offset-1">
                                                <input name="ProType" type="radio" <?php if(isset($_POST["submit"]) && isset($_POST['id'])){if($_SESSION['problem']=="Hardware") {echo "checked";}}?> value="Hardware" readonly>
                                                <label for="Hardware">Hardware</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                <label for="Comment">Comment</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <textarea name="comment" class="form-control" readonly><?php if(isset($_POST["submit"]) && isset($_POST['id'])){echo $_SESSION['note'];}?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                <label for="Comment">Note:</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <textarea name="note" class="form-control" placeholder="Write your Note"></textarea>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <div class="col-sm-5 col-sm-offset-2">
                                                <input name="status" type="submit" class="btn btn-info" style="font-size: 20px;font-weight: bold" value="Fixed">
                                            </div>
                                            <div class="col-sm-4">
                                                <input name="status" type="submit" class="btn btn-info" style="font-size: 20px;font-weight: bold" value='In Progress'>
                                            </div>
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </form>
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
