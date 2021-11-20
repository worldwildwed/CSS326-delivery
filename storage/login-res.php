<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", null, "css326_delivery");
    if ($mysqli->connect_errno) {
    echo $mysqli->connect_error;
    }


    if(isset($_POST['login-res'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM restaurant WHERE (username = '$username' AND password = '$password')";
        $result = $mysqli->query($query);
        if ($result) {
            if ($result->num_rows == 1) {
              $data = $result->fetch_array();
              // echo "userID => " . $data["Userid"];
              $_SESSION['Resid'] = $data["Resid"];
              header("Location: http://localhost/css325/CSS326/CSS326/storage/admin-dash.php");
            }
            else {
              echo "Wrong Username Or Password";
            }
          }
          else {
            echo "FAILED";
          }
    }
    if(isset($_POST['register-res'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username."  ".$password;
        $insert = sprintf("INSERT INTO `restaurant`(`Name`, `Username`, `Password`) VALUES ('%s', '%s', '%s')", $name, $username, $password);
        echo $insert;
        $result = $mysqli->query($insert);
        if (!$result) {echo "error";}
    }


// if (isset($_POST["submit"])){
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $query = "SELECT * FROM myuser WHERE (username = '$username' AND password = '$password') OR (email = '$username' AND password = '$password')";
  
//     $result = $mysqli->query($query);
    
//     if ($result) {
//       if ($result->num_rows == 1) {
//         $data = $result->fetch_array();
//         // echo "userID => " . $data["Userid"];
//         $_SESSION['current_uid'] = $data["Userid"];
//         header("Location: http://localhost/css325/CSS326/CSS326/html/index.php");
//       }
//       else {
//         echo "Wrong Username Or Password";
//       }
//     }
//     else {
//       echo "FAILED";
//     }
// }
    
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <title>CSS326 | DEMO DELIVERY SITE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">

    <link rel="stylesheet" href="../html/assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="../html/assets/css/vendor/fontawesome.css">
    <link rel="stylesheet" href="../html/assets/css/vendor/plaza-icon.css">
    <link rel="stylesheet" href="../html/assets/css/vendor/bootstrap.min.css">


    <link rel="stylesheet" href="../html/assets/css/plugin/slick.css">
    <link rel="stylesheet" href="../html/assets/css/plugin/material-scrolltop.css">
    <link rel="stylesheet" href="../html/assets/css/plugin/price_range_style.css">
    <link rel="stylesheet" href="../html/assets/css/plugin/in-number.css">
    <link rel="stylesheet" href="../html/assets/css/plugin/venobox.min.css">
    <link rel="stylesheet" href="../html/assets/css/plugin/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="../html/assets/css/main.css">
</head>

<body>
    
    <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Restaurant</a></li>
                        <li class="page-breadcrumb__nav active">Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content m-b-40">
                        <h5 class="section-content__title text-center">Restaurant account</h5>
                    </div>
                </div>
                <!-- Start Login Area -->
                <div class="col-lg-6 col-12">
                    <div class="login-form-container">
                        <h5 class="sidebar__title">Login</h5>
                        <div class="login-register-form">
                            <form action="#" method="post">
                                <div class="form-box__single-group">
                                    <label for="form-username">Username or email address *</label>
                                    <input type="text" name="username" id="form-username" placeholder="Username" required>
                                </div>
                                <div class="form-box__single-group">
                                    <label for="form-username-password">Password *</label>
                                    <div class="password__toggle">
                                        <input type="password" name="password" id="form-username-password" placeholder="Enter password" required>
                                        <span data-bs-toggle="#form-username-password" class="password__toggle--btn fa fa-fw fa-eye"></span>
                                    </div>
                                </div>
                                </br>
                                <button name="login-res" class="btn btn--box btn--medium btn--radius btn--black btn--black-hover-green btn--uppercase font--semi-bold" type="submit">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="login-form-container">
                        <h5 class="sidebar__title">Register</h5>
                        <div class="login-register-form">
                            <form action="#" method="post">
                                <div class="form-box__single-group">
                                    <label for="form-register-username">Restaurant Name *</label>
                                    <input type="text" name="name" id="form-register-username" placeholder="Name" required>
                                </div>
                                <div class="form-box__single-group">
                                    <label for="form-register-username">Username *</label>
                                    <input type="text" name="username" id="form-register-username" placeholder="Username" required>
                                </div>
                                <div class="form-box__single-group m-b-20">
                                    <label for="form-register-username-password">Password *</label>
                                    <div class="password__toggle">
                                        <input type="password" name="password" id="form-register-username-password" placeholder="Enter password" required>
                                        <span data-bs-toggle="#form-register-username-password" class="password__toggle--btn fa fa-fw fa-eye"></span>
                                    </div>
                                </div>
                                <button name="register-res" class="btn btn--box btn--medium btn--radius btn--black btn--black-hover-green btn--uppercase font--semi-bold" type="submit">REGISTER</button>
                            </form>
                        </div>
                    </div>
                </div>  <!-- End Login Area -->
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

    <footer class="footer m-t-100">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="index.php" class="footer__logo-link">
                                    <img src="assets/img/logo/logo.png" alt="" class="footer__logo-img">
                                </a>
                            </div>
                            <ul class="footer__address">
                                <li class="footer__address-item"><i class="fa fa-home"></i>No: 58 A, Street,
                                    Somewhere, TH 12345</li>
                                <li class="footer__address-item"><i class="fa fa-phone-alt"></i>+66 123456789</li>
                                <li class="footer__address-item"><i class="fa fa-envelope"></i>support@somemail.com
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title footer__nav-title--dash footer__nav-title--dash-red">
                                <br>OPENING TIME
                            </h4>
                            <ul class="footer__nav">
                                <li class="footer__list">Mon - Fri: 8AM - 10PM</li>
                                <li class="footer__list">Sat: 9AM-8PM</li>
                                <li class="footer__list">We Close on Sundays and Public Holidays</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </footer>>

    <button class="material-scrolltop" type="button"></button>


    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>


    <script src="assets/js/plugin/slick.min.js"></script>
    <script src="assets/js/plugin/jquery.countdown.min.js"></script>
    <script src="assets/js/plugin/material-scrolltop.js"></script>
    <script src="assets/js/plugin/price_range_script.js"></script>
    <script src="assets/js/plugin/in-number.js"></script>
    <script src="assets/js/plugin/jquery.elevateZoom-3.0.8.min.js"></script>
    <script src="assets/js/plugin/venobox.min.js"></script>
    <script src="assets/js/plugin/jquery.waypoints.js"></script>
    <script src="assets/js/plugin/jquery.lineProgressbar.js"></script>


    <script src="assets/js/main.js"></script>
</body>

</html>
