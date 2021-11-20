<?php
session_start();
$mysqli = new mysqli("localhost", "root", null, "css326_delivery");
// if (isset($_POST["saveChangeAccount"])){
//     echo "ISSET";
//     print_r($_SESSION);
//     $update = sprintf("UPDATE `myuser` SET `FirstName`= '%s',`LastName`= '%s',`DisplayName`= '%s',`Email`= '%s' WHERE `Userid` = %d", $_POST['firstname'], $_POST['lastname'], $_POST['displayname'], $_POST['email'], $_SESSION['current_uid']);
//     echo "</br>";
//     echo $update;
//     $result = $mysqli->query($update);
//     if ($result) { 
//         echo "UPDATED SUCCESSFUL";
//         $_SESSION['firstname'] = $_POST['firstname'];
//         $_SESSION['lastname'] = $_POST['lastname'];
//         $_SESSION['displayname'] = $_POST['displayname'];
//         $_SESSION['email'] = $_POST['email'];
//     }
//     else {
//         echo $mysqli->error;
//     }
// } 
if(isset($_POST['place-order'])) {
    $insert = sprintf("INSERT INTO `orders`(`Userid`, `TotalPrice`, `ShippingPrice`, `OrderStatus`, `DeliveredAt`) VALUES (%d, %d, %d, '%s', NOW())", $_SESSION['current_uid'], $_POST['total-price'], $_POST['shipping-price'], 'begin');
    // echo $insert;
    $result = $mysqli->query($insert);
    if($result) {
        $delete = "DELETE FROM `cart` WHERE `Userid` = " . $_SESSION['current_uid'];
        $result = $mysqli->query($delete);
        if ($result) { echo "CHECK OUT SUCCESS AND CART IS NOW EMPTY."; }
    } else { echo $mysqli->error; } 
     
}

?>

<DOCTYPE html>
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
                                                <a href="#" class="header__nav-link">Shop <i class="fal fa-chevron-down"></i></a>
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
                                                                <li class="mega-menu__list"><a href="cart.php" class="mega-menu__link">Cart</a></li>
                                                                <li class="mega-menu__list"><a href="checkout.php" class="mega-menu__link">Checkout</a></li>
                                                    </li>
                                                    <li class="mega-menu__list"><a href="wishlist.php" class="mega-menu__link">Wishlist</a></li>
                                                </ul>
                                </div>
                                <div class="mega-menu__item-box">
                                    <ul class="mega-menu__item">
                                        <li class="mega-menu__banner ">
                                            <a href="product-single-default.html" class="mega-menu__banner-link">
                                                <img src="assets/img/banner/menu-banner.jpg" alt="" class="mega-menu__banner-img mega-menu__banner-img--vertical">
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
                            <ul class="header__mobile--rightside header__user-action-icon  d-flex align-items-center justify-content-end">
                                <li>
                                    <a href="#offcanvas-add-cart__box" class="offcanvas-toggle">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="wishlist-item-count pos-absolute">3</span>
                                    </a>
                                </li>
                                <li><a href="#offcanvas-mobile-menu" class="offcanvas-toggle"><i class="far fa-bars"></i></a></li>

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


            <div class="page-breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul class="page-breadcrumb__menu">
                                <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                                <li class="page-breadcrumb__nav active">Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <main id="main-container" class="main-container">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-7">
                            <div class="section-content">
                                <h5 class="section-content__title">Billing Details</h5>
                            </div>
                            <form action="#" method="post" class="form-box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php
                                        if ($_SESSION['firstname'] != null) {
                                            $fname = $_SESSION['firstname'];
                                        } else {
                                            $fname = "First Name";
                                        }
                                        ?>
                                        <div class="form-box__single-group">
                                            <label for="form-first-name">First Name</label>
                                            <input type="text" id="form-first-name" value="<?php echo $fname?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        if ($_SESSION['lastname'] != null) {
                                            $lname = $_SESSION['lastname'];
                                        } else {
                                            $lname = "Last Name";
                                        }
                                        ?>
                                        <div class="form-box__single-group">
                                            <label for="form-last-name">Last Name</label>
                                            <input type="text" id="form-last-name" value="<?php echo $lname?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-box__single-group">
                                            <label for="form-address-1">Address</label>
                                            <input type="text" id="form-address-1" placeholder="House number and street name">
                                            <input type="text" class="m-t-10" id="form-address-2" placeholder="Apartment, suite, unit etc.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-box__single-group">
                                            <label for="form-zipcode">Postcode</label>
                                            <input type="text" id="form-zipcode" value="<?php echo "pls update your postcode"?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        if ($_SESSION['phone'] != null) {
                                            $phone = $_SESSION['phone'];
                                        } else {
                                            $phone = "pls update phone num";
                                        }
                                        ?>
                                        <div class="form-box__single-group">
                                            <label for="form-phone">Phone</label>
                                            <input type="text" id="form-phone" value="<?php echo $phone?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-box__single-group">
                                            <label for="form-email">Email</label>
                                            <input type="email" id="form-email" value="<?php echo $_SESSION['email']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="m-tb-20">
                                            <label for="check-account">
                                                <input type="checkbox" name="check-account" class="creat-account" id="check-account">
                                                <span>Create an account?</span>
                                            </label>
                                            <div class="toogle-form open-create-account">
                                                <div class="form-box__single-group">
                                                    <label for="form-email-new-account">Email Address</label>
                                                    <input type="email" id="form-email-new-account">
                                                </div>
                                                <div class="form-box__single-group">
                                                    <label for="form-password-new-account">Password</label>
                                                    <input type="password" id="form-password-new-account">
                                                </div>
                                                <div class="from-box__buttons m-t-25">
                                                    <button class="btn btn--box btn--small btn--radius btn--green btn--green-hover-black btn--uppercase btn--weight" type="submit">REGISTER</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-box__single-group">
                                            <h6>Additional information</h6>
                                            <label for="form-additional-info">Order notes</label>
                                            <textarea id="form-additional-info" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="m-tb-20">
                                            <label for="shipping-account">
                                                <input type="checkbox" name="check-account" class="shipping-account" id="shipping-account">
                                                <span>Ship to a different address?</span>
                                            </label>
                                            <div class="toogle-form open-shipping-account">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label for="shipping-form-first-name">First Name</label>
                                                            <input type="text" id="shipping-form-first-name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label for="shipping-form-last-name">Last Name</label>
                                                            <input type="text" id="shipping-form-last-name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                    </div>
                                                    <div class="col-md-12">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <label for="shipping-form-address-1">Address</label>
                                                            <input type="text" id="shipping-form-address-1" placeholder="House number and street name">
                                                            <input type="text" class="m-t-10" id="shipping-form-address-2" placeholder="Apartment, suite, unit etc.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label for="shipping-form-zipcode">* Zip/Postal Code</label>
                                                            <input type="text" id="shipping-form-zipcode">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label for="shipping-form-phone">Phone</label>
                                                            <input type="text" id="shipping-form-phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <label for="shipping-form-email">Email Address</label>
                                                            <input type="email" id="shipping-form-email">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-5">
                            <div class="your-order-section">
                                <div class="section-content">
                                    <h5 class="section-content__title">Your order</h5>
                                </div>
                                <div class="your-order-box gray-bg m-t-40 m-b-30">
                                    <div class="your-order-product-info">
                                        <div class="your-order-top d-flex justify-content-between">
                                            <h6 class="your-order-top-left font--bold">Product</h6>
                                            <h6 class="your-order-top-right font--bold">Total</h6>
                                        </div>
                                        <?php
                                            $query = "SELECT i.Name, i.Price, c.* FROM `cart` c, `item` i WHERE c.Itemid = i.Itemid AND c.Userid = " . $_SESSION['current_uid'];
                                            $result = $mysqli->query($query);
                                            $total_price = 0;
                                            $shipping_fee = 20;
                                            while($row = $result->fetch_array()) {
                                        ?>
                                        <ul class="your-order-middle">
                                            <li class="d-flex justify-content-between">
                                                <span class="your-order-middle-left font--semi-bold"><?php echo $row['Name']?> X<?php echo $row['Quantity']?></span>
                                                <span class="your-order-middle-right font--semi-bold">THB <?php echo $row['Price']*$row['Quantity'];  $total_price+=$row['Price']*$row['Quantity']; ?></span>
                                            </li>
                                        </ul>
                                        <?php
                                            }
                                        ?>
                                        <div class="your-order-bottom d-flex justify-content-between">
                                            <h6 class="your-order-bottom-left font--bold">Shipping</h6>
                                            <span class="your-order-bottom-right font--semi-bold">THB <?php echo $shipping_fee?></span>
                                        </div>
                                        <div class="your-order-total d-flex justify-content-between">
                                            <h5 class="your-order-total-left font--bold">Total</h5>
                                            <h5 class="your-order-total-right font--bold">THB <?php echo $total_price+$shipping_fee?></h5>
                                        </div>

                                        <div class="payment-method">
                                            <div class="payment-accordion element-mrg">
                                                <div class="panel-group" id="accordion">
                                                    <div class="panel payment-accordion">
                                                        <div class="panel-heading" id="method-one">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-parent="#accordion" href="#method1" aria-expanded="false">
                                                                    Direct bank transfer <i class="far fa-chevron-down"></i>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="method1" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <p>Please tranfer your money to XBank 0-123456-78-9 and send
                                                                    the e-slip to Line ID '@css326payment'.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel payment-accordion">
                                                        <div class="panel-heading" id="method-three">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-parent="#accordion" href="#method3" aria-expanded="false">
                                                                    Cash on delivery
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="#" method="post">
                                <div class="text-center">
                                    <input name="total-price" type="hidden" vaue="<?php echo $total_price?>">
                                    <input name="shipping-price" type="hidden" vaue="<?php echo $shipping_fee?>">
                                    <button name="place-order" class="btn btn--small btn--radius btn--green btn--green-hover-black btn--uppercase font--bold" type="submit">PLACE ORDER</button>
                                </div> </form>
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