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
</head>

<body style="background-image: url(assets/img/BackgroudImage.jpeg); background-size: cover">
    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card_first wizard-card" data-color="blue" id="wizardProfile">
                        <img src="assets/img/Jed_Uni.jpeg" width="250" style="float:right">
                        <img src="assets/img/CCSE.jpeg" width="200">
                        <form action="DB/check_login.php" method="post" accept-charset="utf-8">
                            <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->
                            <div class="wizard-header text-center">
                                <h3 class="wizard-title">SIGN IN</h3>
                            </div>

                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#about" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-user"></i>
                                            </div>
                                            Sign In
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <h5 class="info-text">Enter your ID & Password</h5>

                                        <div class="col-sm-7 col-sm-offset-2">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input name="ID" type="text" class="form-control" placeholder="Enter your Id" onkeypress="return isNumberKey(event)" required>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-offset-2">
                                            <div class="form-group">
                                                <label>PASSWORD</label>
                                                <input name="pass" type="password" class="form-control" placeholder="Enter your password" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <button class='btn btn-finish btn-fill btn-warning btn-wd' name='Send' onclick="myfun('input')">Sign in</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <hr>
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
<script src="assets/js/demo.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

<!--  More information about jquery.validate here: https://jqueryvalidation.org/
-->
<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>

</html>
