<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", null, "css326_delivery");
    if (isset($_POST["saveChangeAccount"])){
        echo "ISSET";
        print_r($_SESSION);
        $update = sprintf("UPDATE `myuser` SET `FirstName`= '%s',`LastName`= '%s',`DisplayName`= '%s',`Email`= '%s' WHERE `Userid` = %d", $_POST['firstname'], $_POST['lastname'], $_POST['displayname'], $_POST['email'], $_SESSION['current_uid']);
        echo "</br>";
        echo $update;
        $result = $mysqli->query($update);
        if ($result) { 
            echo "UPDATED SUCCESSFUL";
            $_SESSION['firstname'] = $_POST['firstname'];
            $_SESSION['lastname'] = $_POST['lastname'];
            $_SESSION['displayname'] = $_POST['displayname'];
            $_SESSION['email'] = $_POST['email'];
        }
        else {
            echo $mysqli->error;
        }
    } 
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <title>CSS326 | DEMO DELIVERY SITE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">

    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/vendor/fontawesome.css">
    <link rel="stylesheet" href="assets/css/vendor/plaza-icon.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">


    <link rel="stylesheet" href="assets/css/plugin/slick.css">
    <link rel="stylesheet" href="assets/css/plugin/material-scrolltop.css">
    <link rel="stylesheet" href="assets/css/plugin/price_range_style.css">
    <link rel="stylesheet" href="assets/css/plugin/in-number.css">
    <link rel="stylesheet" href="assets/css/plugin/venobox.min.css">
    <link rel="stylesheet" href="assets/css/plugin/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <header>
        <div class="header d-none d-lg-block">


            <div class="header__center sticky-header p-tb-10">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">

                            <div class="header__logo">
                                <a href="index.php" class="header__logo-link img-responsive">
                                    <img class="header__logo-img img-fluid" src="assets/img/logo/logo.png" alt="">
                                </a>
                            </div>
                            <div class="header-menu">
                                <nav>
                                    <ul class="header__nav">
                                        <li class="header__nav-item pos-relative">
                                            <a href="index.php" class="header__nav-link">Home</a>
                                        </li>
                                        <li class="header__nav-item pos-relative">
                                            <a href="#" class="header__nav-link">Shop <i
                                                    class="fal fa-chevron-down"></i></a>
                                            <ul class="mega-menu pos-absolute">
                                                <li class="mega-menu__box">
                                                    <div class="mega-menu__item-box">
                                                        <span class="mega-menu__title">Shop</span>
                                                        <ul class="mega-menu__item">
                                                            <li class="mega-menu__list pos-relative">
                                                                <a href="shop.html" class="mega-menu__link">Shop
                                                                    Now!</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="mega-menu__item-box">
                                                        <span class="mega-menu__title">Shop Pages</span>
                                                        <ul class="mega-menu__item">
                                                            <li class="mega-menu__list"><a href="cart.php"
                                                                    class="mega-menu__link">Cart</a></li>
                                                            <li class="mega-menu__list"><a href="checkout.php"
                                                                    class="mega-menu__link">Checkout</a></li>
                                                </li>
                                                <li class="mega-menu__list"><a href="wishlist.php"
                                                        class="mega-menu__link">Wishlist</a></li>
                                            </ul>
                            </div>
                            <div class="mega-menu__item-box">
                                <ul class="mega-menu__item">
                                    <li class="mega-menu__banner ">
                                        <a href="product-single-default.html" class="mega-menu__banner-link">
                                            <img src="assets/img/banner/menu-banner.jpg" alt=""
                                                class="mega-menu__banner-img mega-menu__banner-img--vertical">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            </li>

                            </ul>
                            </li>
                            </ul>
                            </nav>
                        </div>
                        <ul class="header__user-action-icon">

                            <li>
                                <a href="my-account.html">
                                    <i class="icon-users"></i>
                                </a>
                            </li>
                            <li>
                                <a href="wishlist.php">
                                    <i class="icon-heart"></i>
                                    <span class="item-count pos-absolute">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-add-cart__box" class="offcanvas-toggle">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="wishlist-item-count pos-absolute">2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__bottom p-tb-30">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-7 col-lg-6">
                        <form class="header-search" action="#" method="post">
                            <div class="header-search__content pos-relative">
                                <input type="search" name="header-search" placeholder="Search our store" required>
                                <button class="pos-absolute" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-2 col-lg-3">
                        <div class="header-phone text-end"><span>Call Us: 01 2345 6789</span></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="header__mobile mobile-header--1 d-block d-lg-none p-tb-20">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <ul class="header__mobile--leftside d-flex align-items-center justify-content-start">
                            <li>
                                <div class="header__mobile-logo">
                                    <a href="index.php" class="header__mobile-logo-link">
                                        <img src="assets/img/logo/logo.png" alt="" class="header__mobile-logo-img">
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul
                            class="header__mobile--rightside header__user-action-icon  d-flex align-items-center justify-content-end">
                            <li>
                                <a href="#offcanvas-add-cart__box" class="offcanvas-toggle">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="wishlist-item-count pos-absolute">3</span>
                                </a>
                            </li>
                            <li><a href="#offcanvas-mobile-menu" class="offcanvas-toggle"><i
                                        class="far fa-bars"></i></a></li>

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
            </div>
        </div>

        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <div class="offcanvas__top">
                <span class="offcanvas__top-text"></span>
                <button class="offcanvas-close"><i class="fal fa-times"></i></button>
            </div>

            <div class="offcanvas-inner">
                <form class="header-search m-tb-15" action="#" method="post">
                    <div class="header-search__content pos-relative">
                        <input type="search" name="header-search" placeholder="Search our store" required>
                        <button class="pos-absolute" type="submit"><i class="icon-search"></i></button>
                    </div>
                </form>

                <ul class="header__user-action-icon m-tb-15 text-center">

                    <li>
                        <a href="my-account.html">
                            <i class="icon-users"></i>
                        </a>
                    </li>

                    <li>
                        <a href="wishlist.php">
                            <i class="icon-heart"></i>
                            <span class="item-count pos-absolute"></span>
                        </a>
                    </li>

                    <li>
                        <a href="cart.php">
                            <i class="icon-shopping-cart"></i>
                            <span class="wishlist-item-count pos-absolute">3</span>
                        </a>
                    </li>
                </ul>
                <div class="offcanvas-menu">
                    <ul>
                        <li><a href="index.php"><span>Home</span></a></li>
                        <li>
                            <a href="shop.html"><span>Shop Now!</span></a>
                        <li>
                            <a href="#">Shop Pages</a>
                            <ul class="sub-menu">
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="wishlist.php">Wishlist</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                            </ul>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="offcanvas-add-cart__box" class="offcanvas offcanvas-cart offcanvas-add-cart">
            <div class="offcanvas__top">
                <span class="offcanvas__top-text"><i class="icon-shopping-cart"></i>Cart</span>
                <button class="offcanvas-close"><i class="fal fa-times"></i></button>
            </div>
            <ul class="offcanvas-add-cart__menu">

                <li class="offcanvas-add-cart__list pos-relative d-flex align-items-center justify-content-between ">
                    <div class="offcanvas-add-cart__content d-flex align-items-start m-r-10">
                        <div class="offcanvas-add-cart__img-box pos-relative">
                            <a href="product-single-default.html"
                                class="offcanvas-add-cart__img-link img-responsive"><img
                                    src="assets/img/product/size-small/product-home-1-img-1.jpg" alt=""
                                    class="add-cart__img"></a>
                            <span class="offcanvas-add-cart__item-count pos-absolute">1x</span>
                        </div>
                        <div class="offcanvas-add-cart__detail">
                            <a href="product-single-default.html" class="offcanvas-add-cart__link">TEST ITEM 1</a>
                            <span class="offcanvas-add-cart__price">THB 30.00</span>
                        </div>
                    </div>
                    <button class="offcanvas-add-cart__item-dismiss"><i class="fal fa-times"></i></button>
                </li>
                <li class="offcanvas-add-cart__list pos-relative d-flex align-items-center justify-content-between">
                    <div class="offcanvas-add-cart__content d-flex  align-items-start m-r-10">
                        <div class="offcanvas-add-cart__img-box pos-relative">
                            <a href="product-single-default.html"
                                class="offcanvas-add-cart__img-link img-responsive"><img
                                    src="assets/img/product/size-small/product-home-1-img-2.jpg" alt=""
                                    class="add-cart__img"></a>
                            <span class="offcanvas-add-cart__item-count pos-absolute">1x</span>
                        </div>
                        <div class="offcanvas-add-cart__detail">
                            <a href="product-single-default.html" class="offcanvas-add-cart__link">TEST ITEM 2</a>
                            <span class="offcanvas-add-cart__price">THB 35.00</span>
                        </div>
                    </div>
                    <button class="offcanvas-add-cart__item-dismiss"><i class="fal fa-times"></i></button>
                </li>
            </ul>
            <div class="offcanvas-add-cart__checkout-box-bottom">
                <ul class="offcanvas-add-cart__checkout-info">
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Subtotal</span>
                        <span class="offcanvas-add-cart__checkout-right-info">THB 65.00</span>
                    </li>

                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Shipping</span>
                        <span class="offcanvas-add-cart__checkout-right-info">THB 20.00</span>
                    </li>
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Total</span>
                        <span class="offcanvas-add-cart__checkout-right-info">THB 85.00 THB</span>
                    </li>
                </ul>

                <div class="offcanvas-add-cart__btn-checkout">
                    <a href="checkout.php"
                        class="btn btn--block btn--radius btn--box btn--black btn--black-hover-green btn--large btn--uppercase font--bold">Checkout</a>
                </div>
            </div>
        </div>
        <div class="offcanvas-overlay"></div>
    </header>

    <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">My Account</li>
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
                    <!-- :::::::::: Start My Account Section :::::::::: -->
                    <div class="my-account-area">
                        <div class="row">
                            <div class="col-xl-3 col-md-4">
                                <div class="my-account-menu">
                                    <ul class="nav account-menu-list flex-column nav-pills" id="pills-tab" role="tablist">
                                        <li>
                                            <a class="active link--icon-left" id="pills-dashboard-tab" data-bs-toggle="pill" href="#pills-dashboard"
                                                role="tab" aria-controls="pills-dashboard" aria-selected="true"><i
                                                    class="fas fa-tachometer-alt"></i> Dashboard</a>
                                        </li>
                                        <li>
                                            <a id="pills-order-tab" class="link--icon-left" data-bs-toggle="pill" href="#pills-order" role="tab"
                                                aria-controls="pills-order" aria-selected="false"><i
                                                    class="fas fa-shopping-cart"></i> Order</a>
                                        </li>
                                        <li>
                                            <a id="pills-payment-tab" class="link--icon-left" data-bs-toggle="pill" href="#pills-payment" role="tab"
                                                aria-controls="pills-payment" aria-selected="false"><i
                                                    class="fas fa-credit-card"></i> Payment Method</a>
                                        </li>
                                        <li>
                                            <a id="pills-address-tab" class="link--icon-left" data-bs-toggle="pill" href="#pills-address" role="tab"
                                                aria-controls="pills-address" aria-selected="false"><i
                                                    class="fas fa-map-marker-alt"></i> Address</a>
                                        </li>
                                        <li>
                                            <a id="pills-account-tab" class="link--icon-left" data-bs-toggle="pill" href="#pills-account" role="tab"
                                                aria-controls="pills-account" aria-selected="false"><i class="fas fa-user"></i>
                                                Account Details</a>
                                        </li>
                                        <li>
                                            <a class="link--icon-left" href="../code/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-8">
                                <div class="tab-content my-account-tab" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                        aria-labelledby="pills-dashboard-tab">
                                        <div class="my-account-dashboard account-wrapper">
                                            <h4 class="account-title">Dashboard</h4>
                                            <div class="welcome-dashboard m-t-30">
                                                <p>Hello, <strong>Justin O'Foofoo</strong></p>
                                            </div>
                                            <p class="m-t-25">From your account dashboard. you can easily check &amp; view your
                                                recent orders, manage your shipping and billing addresses and edit your password and
                                                account details.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">
                                        <div class="my-account-order account-wrapper">
                                            <h4 class="account-title">Orders</h4>
                                            <div class="account-table text-center m-t-30 table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="no">No</th>
                                                            <th class="name">Name</th>
                                                            <th class="date">Date</th>
                                                            <th class="status">Status</th>
                                                            <th class="total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>ITEM 17 x 1<br>ITEM 6 x1</td>
                                                            <td>Dec 05, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$100</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>ITEM 5 x2</td>
                                                            <td>July 22, 2020</td>
                                                            <td>Cancelled</td>
                                                            <td>$45</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>ITEM 5 x1<br>ITEM 31 x1<br> ITEM 22 x1</td>
                                                            <td>October 22, 2021</td>
                                                            <td>On Hold</td>
                                                            <td>$99</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                                        aria-labelledby="pills-payment-tab">
                                        <div class="my-account-payment account-wrapper">
                                            <h4 class="account-title">Payment Method</h4>
                                            <p class="m-t-30">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-address" role="tabpanel"
                                        aria-labelledby="pills-address-tab">
                                        <div class="my-account-address account-wrapper">
                                            <h4 class="account-title">Address</h4>
                                            <div class="account-address m-t-30">
                                                <!-- <h6 class="name">Justin O'Foofoo</h6>
                                                <p>U-thong Nai Rd. <br> Dusit, Bangkok, 10300; Thailand, 10200</p>
                                                <p>Mobile: (+66) 02-244-1000</p> -->
                                                <input type="text" name="addr" placeholder="Address.." value="" >
                                                <a class="box-btn m-t-25 " href="#"><i class="far fa-edit"></i> Edit Address</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-account" role="tabpanel"
                                        aria-labelledby="pills-account-tab">
                                        <div class="my-account-details account-wrapper">
                                            
                                            <h4 class="account-title">Account Details</h4>
                                            <form action="#" method="POST">
                                                <div class="account-details">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-box__single-group">
                                                                <?php 
                                                                    if($_SESSION['firstname'] != null) {
                                                                        $text = $_SESSION['firstname'];
                                                                    } else { $text = "First Name"; }
                                                                ?>
                                                                <input type="text" name="firstname" placeholder="First Name" value=<?php echo $_SESSION['firstname']?> >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-box__single-group">
                                                                <?php 
                                                                    if($_SESSION['lastname'] != null) {
                                                                        $text = $_SESSION['lastname'];
                                                                    } else { $text = "Last Name"; }
                                                                ?>
                                                                <input type="text" name="lastname" placeholder="Last Name" value=<?php echo $_SESSION['lastname']?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-box__single-group">
                                                                <?php 
                                                                    if($_SESSION['displayname'] != null) {
                                                                        $text = $_SESSION['displayname'];
                                                                    } else { $text = "Display Name"; }
                                                                ?>
                                                                <input type="text" name="displayname" placeholder="Display Name" value=<?php echo $_SESSION['displayname']?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-box__single-group">
                                                                <?php 
                                                                    if($_SESSION['email'] != null) {
                                                                        $text = $_SESSION['email'];
                                                                    } else { $text = "Email"; }
                                                                ?>
                                                                <input type="text" name="email" placeholder="Email Address" value=<?php echo $_SESSION['email']?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-box__single-group">
                                                                <h5 class="title">Password change</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-box__single-group">
                                                                <input type="password" placeholder="Current Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-box__single-group">
                                                                <input type="password" placeholder="New Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-box__single-group">
                                                                <input type="password" placeholder="Confirm Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-box__single-group">
                                                                
                                                                <button type="submit" name="saveChangeAccount" class="btn btn--box btn--radius btn--small btn--black btn--black-hover-green btn--uppercase font--bold">Save Change</button>
                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> 

    
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
