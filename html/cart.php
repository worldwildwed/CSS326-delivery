<?php
session_start();
$mysqli = new mysqli("localhost", "root", null, "css326_delivery");

if (isset($_POST['clear-cart'])) {
    $delete = "DELETE FROM `cart` WHERE `Userid` = " . $_SESSION['current_uid'];
    $result = $mysqli->query($delete);
    if (!$result) {
        echo "Delete failed!<br/>";
        echo $mysqli->error;
    }
}

if (isset($_POST['update-cart'])) {
    $index = 0;
    $join_var = "";
    while (True) {
        if (isset($_POST['current_qnt' . $index]) || isset($_POST['itemid' . $index])) {
            if ($_POST['current_qnt' . $index] == 0) {
                $foundEmpty = true;
            }

            if ($join_var == "") {
                $join = sprintf("SELECT %d as itemid, %d as new_qnt", $_POST['itemid' . $index], $_POST['current_qnt' . $index]);
                $join_var .= $join;
            } else {
                $join = sprintf("SELECT %d as itemid, %d as new_qnt", $_POST['itemid' . $index], $_POST['current_qnt' . $index]);
                $join_var .= " UNION ALL ";
                $join_var .= $join;
            }
            $index = $index +  1;
        } else {
            break;
        }
    }
    $update = "UPDATE `cart` c " . "JOIN (" . $join_var . ") vals ON c.Itemid = vals.itemid SET Quantity = new_qnt WHERE Userid = " . $_SESSION['current_uid'];
    $result = $mysqli->query($update);
    if ($result) {
        $message = "Your Cart Has Been Updated :)";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $mysqli->query("DELETE FROM `cart` WHERE Quantity = 0 AND Userid = " . $_SESSION['current_uid']);
    } else {
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

        <div id="offcanvas-add-cart__box" class="offcanvas offcanvas-cart offcanvas-add-cart">
            <div class="offcanvas__top">
                <span class="offcanvas__top-text"><i class="icon-shopping-cart"></i>Cart</span>
                <button class="offcanvas-close"><i class="fal fa-times"></i></button>
            </div>
            <ul class="offcanvas-add-cart__menu">

                <li class="offcanvas-add-cart__list pos-relative d-flex align-items-center justify-content-between ">
                    <div class="offcanvas-add-cart__content d-flex align-items-start m-r-10">
                        <div class="offcanvas-add-cart__img-box pos-relative">
                            <a href="product-single-default.html" class="offcanvas-add-cart__img-link img-responsive"><img src="assets/img/product/size-small/product-home-1-img-1.jpg" alt="" class="add-cart__img"></a>
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
                            <a href="product-single-default.html" class="offcanvas-add-cart__img-link img-responsive"><img src="assets/img/product/size-small/product-home-1-img-2.jpg" alt="" class="add-cart__img"></a>
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
                    <a href="checkout.php" class="btn btn--block btn--radius btn--box btn--black btn--black-hover-green btn--large btn--uppercase font--bold">Checkout</a>
                </div>
            </div>
        </div>
        <div class="offcanvas-overlay"></div>
    </header>


    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <form action="#" method="post">
                    <div class="col-12">
                        <div class="section-content">
                            <h5 class="section-content__title">Your cart items</h5>
                        </div>
                        <div class="table-content table-responsive cart-table-content m-t-30">
                            <table>
                                <thead class="gray-bg">
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT i.Name, i.Price, c.* FROM `cart` c, `item` i WHERE c.Itemid = i.Itemid AND c.Userid = " . $_SESSION['current_uid'];

                                    $result = $mysqli->query($query);
                                    $subtotal = 0;
                                    $shipping_price = 20;

                                    if ($result) {
                                        $index = 0;
                                        while ($cart_item = $result->fetch_array()) {
                                            $subtotal = $subtotal + (float)$cart_item['Price'] * (int)$cart_item['Quantity'];
                                    ?>
                                            <tr>

                                                <input type="hidden" name=<?php echo "itemid" . $index ?> value=<?php echo $cart_item['Itemid'] ?>>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img class="img-fluid" src="assets/img/product/size-small/product-home-1-img-1.jpg" alt=""></a>
                                                </td>
                                                <td class="product-name"><a href="#"><?php echo $cart_item['Name'] ?></a></td>
                                                <td class="product-price-cart"><span class="amount">THB <?php echo $cart_item['Price'] ?></span></td>

                                                <td class="product-quantities">
                                                    <div class="quantity d-inline-block">

                                                        <input name=<?php echo "current_qnt" . $index ?> type="number" min="0" step="1" value="<?php echo $cart_item['Quantity'] ?>">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">THB <?php echo $cart_item['Price'] * $cart_item['Quantity'] ?></td>
                                                <td class="product-remove">
                                                    <a href="#"><i class="fa fa-pencil-alt"></i></a>
                                                    <a href="#"><i class="fa fa-times"></i></a>
                                                </td>

                                            </tr>
                                    <?php
                                            $index =  $index + 1;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-table-button m-t-10">

                            <div class="cart-table-button--left">
                                <a href="#" class="btn btn--box btn--large btn--radius btn--green btn--green-hover-black btn--uppercase font--bold m-t-20">CONTINUE
                                    SHOPPING</a>
                                <a href="checkout.php" class="btn btn--box btn--large btn--radius btn--green btn--green-hover-black btn--uppercase font--bold m-t-20">PROCEED TO CHECKOUT </a>
                            </div>

                            <div class="cart-table-button--right">
                                <div>
                                    <input name="update-cart" type="submit" value="UPDATE SHOPPING CART" class="btn btn--box btn--large btn--radius btn--green btn--green-hover-black btn--uppercase font--bold m-t-20 m-r-20"></input>
                                </div>
                                <div>
                                    <input name="clear-cart" type="submit" value="CLEAR SHOPPING CART" class="btn btn--box btn--large btn--radius btn--black btn--black-hover-green btn--uppercase font--bold m-t-20"></input>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <!-- <div class="col-lg-4 col-md-6">
                <div class="sidebar__widget m-t-40">

                    <div class="sidebar__box">
                        <h5 class="sidebar__title">Cart Total</h5>
                    </div>
                    <h6 class="total-cost">Total products Price<span>THB 60.00</span></h6>
                    <div class="total-shipping">
                        <span>Total shipping</span>
                        <ul class="shipping-cost m-t-10">
                            <li>
                                <label for="ship-standard">
                                    <input type="radio" class="shipping-select" name="shipping-cost" value="Standard"
                                        id="ship-standard" checked><span>Shipping Fee</span>
                                </label>
                                <span class="ship-price">THB 20.00</span>
                            </li>
                        </ul>
                    </div>
                    <h4 class="grand-total m-tb-25">Grand Total <span>THB 80.00</span></h4>
                    
                </div>
            </div> -->
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