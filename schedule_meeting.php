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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
            <div class="col-sm-12">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="blue" id="wizardProfile">
                        <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->
                        <div class="wizard-header text-center">
                            <h2 class="wizard-title">Schedule Meeting</h2>
                        </div>

                        <div class="wizard-navigation">
                            <div class="progress-with-circle">
                                <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                            </div>
                            <ul>
                                <li>
                                    <a href="#about" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="ti-calendar"></i>
                                        </div>

                                    </a>
                                </li>
                            </ul>
                        </div>
                        <form action="DB/insert_schedule_meeting.php" method="post" accept-charset="utf-8">
                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-4 control-label">
                                                <label for="email">Select Department</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <select id="time" class="form-control" name="Department" required>
                                                    <option selected>Choose...</option>
                                                    <option value="Network">Network</option>
                                                    <option value="Software">Software</option>
                                                    <option value="Hardware">Hardware</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4 control-label">
                                                <label for="email">Select time</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <select id="time" class="form-control" name="Time" required>
                                                    <option selected>Choose...</option>
                                                    <option value="08:00 AM">08:00 AM</option>
                                                    <option value="09:00 AM">09:00 AM</option>
                                                    <option value="10:00 AM">10:00 AM</option>
                                                    <option value="11:00 AM">11:00 AM</option>
                                                    <option value="12:00 PM">12:00 PM</option>
                                                    <option value="01:00 PM">01:00 PM</option>
                                                    <option value="02:00 PM">02:00 PM</option>
                                                    <option value="03:00 PM">03:00 PM</option>
                                                    <option value="04:00 PM">04:00 PM</option>
                                                    <option value="05:00 PM">05:00 PM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <div class="col-sm-4 control-label">
                                                <label for="Office No">Select Date</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input id="StartDate" name="Date" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class='btn btn-finish btn-fill btn-warning btn-wd' name='Send' onclick="myfun('input')">Schedule Meeting</button>
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

    <script>
        $("#StartDate, #EndDate").datepicker();

        $("#EndDate").change(function() {
            var startDate = document.getElementById("StartDate").value;
            var endDate = document.getElementById("EndDate").value;

            if ((Date.parse(endDate) < Date.parse(startDate)) || (Date.parse(endDate) != Date.parse(startDate))) {
                alert("End date should be greater than Start date \nAnd can not choose more than one day");
                document.getElementById("EndDate").value = "";
            }
        });

    </script>
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
