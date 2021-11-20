<?php
    $mysqli = new mysqli("localhost", "root", null, "css326_delivery");
    session_start();
    print_r($_SESSION);
    if ($_SESSION['current_uid']){
        $uid = $_SESSION['current_uid'];
        echo "</br>";
        echo "USER LOGGED IN uid => " . $uid;
        $query = "SELECT * FROM myuser WHERE Userid = $uid"; 
        $result = $mysqli->query($query);
        if ($result) {
            $data = $result->fetch_array();
            $_SESSION['username'] = $data["Username"];
            $_SESSION['email'] = $data["Email"];
            $_SESSION['firstname'] = $data["FirstName"];
            $_SESSION['lastname'] = $data["LastName"];
            $_SESSION['displayname'] = $data["DisplayName"];
            $_SESSION['phone'] = $data["Phone"];
            
        }
        else{ print("FAILEDD"); }
    }
    else {
        header("Location: http://localhost/css325/CSS326/CSS326/html/login.php");
        exit();
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
                                                                <?php
                                                                    $query = "SELECT `Resid`, `Name` FROM `restaurant`";
                                                                    $result = $mysqli->query($query);
                                                                    while ($row = $result->fetch_array()){
                                                                ?>
                                                                <a href="shop.php?resid=<?php echo $row['Resid']?>" class="mega-menu__link">
                                                                        <?php echo $row['Name']?>
                                                                </a>
                                                                <?php } ?>
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
                                        <a href="product-singl e-default.html" class="mega-menu__banner-link">
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
                                <a href="my-account.php">
                                    <i class="icon-users"></i>
                                </a>
                            </li>
                            <li>
                                <?php
                                    $query = "SELECT COUNT(`Wishlistid`) as total FROM `wishlist` WHERE `Userid` =". $_SESSION['current_uid'];
                                    $result = $mysqli->query($query);
                                    if ($result) {
                                        $row = $result->fetch_array();
                                    }
                                ?>
                                <a href="wishlist.php">
                                    <i class="icon-heart"></i>
                                    <span class="item-count pos-absolute"><?php echo $row['total']?></span>
                                </a>
                            </li>
                            <li>
                                <?php
                                    $query = "SELECT SUM(`Quantity`) as total FROM `cart` WHERE `Userid` =". $_SESSION['current_uid'];
                                    $result = $mysqli->query($query);
                                    if ($result) {
                                        $row = $result->fetch_array();
                                        // echo "total cart >>>>>>>" . $row['total'];
                                    }
                                ?>
                                <a href="#offcanvas-add-cart__box" class="offcanvas-toggle">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="wishlist-item-count pos-absolute"><?php if($row['total']) { echo $row['total']; } else {echo '0';}?></span>
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
                            <a href="shop.html"><span>Shop Now!</span></a></li>
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
                <?php
                    $query = "SELECT i.Name, i.Price, c.* FROM `cart` c, `item` i WHERE c.Itemid = i.Itemid AND c.Userid = " . $_SESSION['current_uid'];
                    $result = $mysqli->query($query);
                    $subtotal = 0;
                    $shipping_price = 20;
                    
                    if ($result) {
                        while ($cart_item=$result->fetch_array()){
                            $subtotal = $subtotal + (float)$cart_item['Price'] * (int)$cart_item['Quantity'];
                            
                ?>

                <li class="offcanvas-add-cart__list pos-relative d-flex align-items-center justify-content-between ">
                    <div class="offcanvas-add-cart__content d-flex align-items-start m-r-10">
                        <div class="offcanvas-add-cart__img-box pos-relative">
                            <a href="product-single-default.php"
                                class="offcanvas-add-cart__img-link img-responsive"><img
                                    src="assets/img/product/size-small/product-home-1-img-1.jpg" alt=""
                                    class="add-cart__img"></a>
                            <span class="offcanvas-add-cart__item-count pos-absolute"> <?php echo $cart_item['Quantity']?>x </span>
                        </div>
                        <div class="offcanvas-add-cart__detail">
                            <a href="product-single-default.php" class="offcanvas-add-cart__link"><?php echo $cart_item['Name']?></a>
                            <span class="offcanvas-add-cart__price"><?php echo $cart_item['Price'] ?></span> 
                        </div>
                    </div>
                    <button class="offcanvas-add-cart__item-dismiss"><i class="fal fa-times"></i></button>
                <?php
                        }
                    }
                ?>

                </li>
            </ul>
            <div class="offcanvas-add-cart__checkout-box-bottom">
                <ul class="offcanvas-add-cart__checkout-info">
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Subtotal</span>
                        <span class="offcanvas-add-cart__checkout-right-info">THB <?php echo $subtotal?></span>
                    </li>

                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Shipping</span>
                        <span class="offcanvas-add-cart__checkout-right-info">THB <?php echo $shipping_price?></span>
                    </li>
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Total</span>
                        <span class="offcanvas-add-cart__checkout-right-info">THB <?php echo $subtotal + $shipping_price?></span>
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


    <main id="main-container" class="main-container">
        <div id="display">
            SERCH RESULT HERE
        </div>
        <div
            class="hero slider-dot-fix slider-dot slider-dot-fix slider-dot--center slider-dot-size--medium slider-dot-circle  slider-dot-style--fill slider-dot-style--fill-white-active-green dot-gap__X--10">
            <?php
                $query = "SELECT * FROM item WHERE SliderOn = 1";
                $result = $mysqli->query($query);
                if ($result) {
                    $item_arr = array();
                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $row=$result->fetch_array();
                        array_push($item_arr, $row);             
                    }
                }
                // print_r($item_arr);
            ?>
            <div class="hero-slider">
                <img src="assets/img/hero/hero-home-1-img-1.jpg" alt="">
                <div class="hero__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="hero__content--inner">
                                    <h6 class="title__hero title__hero--tiny text-uppercase"><?php echo $item_arr[0]['DescriptionShort'] ?></h6>
                                    <h1 class="title__hero title__hero--xlarge font--regular text-uppercase"> <?php echo $item_arr[0]['Name'] ?> <br>
                                    <?php echo $item_arr[0]['Price'] ?> </h1>
                                    <h4 class="title__hero title__hero--small font--regular"><?php echo $item_arr[0]['Description'] ?></h4>
                                    <a href="product-single-default.php?Itemid=<?php echo $item_arr[0]['Itemid'] ?>"
                                        class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slider">
                <img src="assets/img/hero/hero-home-1-img-2.jpg" alt="">
                <div class="hero__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="hero__content--inner">
                                    <h6 class="title__hero title__hero--tiny text-uppercase"><?php echo $item_arr[1]['DescriptionShort'] ?></h6>
                                    <h1 class="title__hero title__hero--xlarge font--regular text-uppercase"><?php echo $item_arr[1]['Name'] ?> <br>
                                    <?php echo $item_arr[1]['Price'] ?></h1>
                                    <h4 class="title__hero title__hero--small font--regular"><?php echo $item_arr[1]['Description'] ?></h4>
                                    <a href="product-single-default.php?Itemid=<?php echo $item_arr[1]['Itemid'] ?>"
                                        class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Shop
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner m-t-30">
            <?php
                $query = "SELECT * FROM item WHERE BannerOn = 1";
                $result = $mysqli->query($query);
                if ($result) {
                    $banner_arr = array();
                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $row=$result->fetch_array();
                        array_push($banner_arr, $row);             
                    }
                }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="banner__box">

                            <div class="banner__box--single banner__box--single-text-style-1 pos-relative">
                                <a href="product-single-default.php" class="banner__link">
                                    <img src="assets/img/banner/size-wide/banner-home-1-img-1-wide.jpg" alt=""
                                        class="banner__img">
                                </a>
                                <div class="banner__content banner__content--center pos-absolute">
                                    <h6 class="banner__title  font--regular letter-spacing--4  text-center m-b-10"><?php echo $banner_arr[0]['DescriptionShort'] ?>
                                    </h6>
                                    <h2
                                        class="banner__title banner__title--large font--medium letter-spacing--4  text-uppercase">
                                        <?php echo $banner_arr[0]['Name'] ?></h2>
                                    <h6 class="banner__title font--regular letter-spacing--4  text-center m-b-20"><?php echo $banner_arr[0]['Price'] ?>
                                    </h6>
                                    <div class="text-center">
                                        <a href="product-single-default.php?Itemid=<?php echo $banner_arr[0]['Itemid']?>"
                                            class="btn btn--medium btn--radius btn--transparent btn--border-black btn--border-black-hover-green font--light text-uppercase">Buy
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="banner__box">

                            <div class="banner__box--single banner__box--single-text-style-1 pos-relative">
                                <a href="product-single-default.php" class="banner__link">
                                    <img src="assets/img/banner/size-wide/banner-home-1-img-2-wide.jpg" alt=""
                                        class="banner__img">
                                </a>
                                <div class="banner__content banner__content--center pos-absolute">
                                    <h6 class="banner__title letter-spacing--4 font--regular text-center m-b-10"><?php echo $banner_arr[1]['DescriptionShort'] ?>
                                    </h6>
                                    <h2
                                        class="banner__title banner__title--large letter-spacing--4 font--medium text-uppercase">
                                        <?php echo $banner_arr[1]['Name'] ?></h2>
                                    <h6 class="banner__title letter-spacing--4 font--regular text-center m-b-20"><?php echo $banner_arr[0]['Price'] ?>
                                    </h6>
                                    <div class="text-center">
                                        <a href="product-single-default.php?Itemid=<?php echo $banner_arr[1]['Itemid']?>"
                                            class="btn btn--medium btn--radius btn--transparent btn--border-black btn--border-black-hover-green font--light text-uppercase">Buy
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product m-t-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="section-content section-content--border m-b-35">
                            <h5 class="section-content__title">Best Sellers</h5>
                            <ul class="tablist tablist--style-blue tablist--style-gap-20 nav">
                                <li><a class="nav-link active" data-bs-toggle="tab" href="#fruits">Main Dish</a></li>
                                <li><a class="nav-link" data-bs-toggle="tab" href="#milk">Appitizer</a></li>
                                <li><a class="nav-link" data-bs-toggle="tab" href="#fish">Dessert</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content tab-animate-zoom">

                            <div class="tab-pane show active" id="fruits">
                                <div class="default-slider default-slider--hover-bg-red product-default-slider">
                                    <div class="product-default-slider-4grid-2rows gap__col--30 gap__row--40">

                                        <?php 
                                            # type = main
                                            $query = "SELECT i.*, r.Username FROM `item` i, `restaurant` r WHERE r.`Resid` = i.`Resid` AND  `type`= 'main' ORDER BY i.`TotalOrdered`, i.`Available` DESC";
                                            // $query = "SELECT * FROM `item` WHERE `type`= 'main' ORDER BY `TotalOrdered`, `Available` DESC";
                                            $result = $mysqli->query($query);
                                            // print_r($result->fetch_array());
                                            while ($row = $result->fetch_array()) {
                                        ?>

                                        <div class="product__box product__default--single text-center">

                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php?Itemid=<?php echo $row['Itemid']?>" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src=<?php echo "../storage/food-image/".$row['ImageName'];?>
                                                        alt="<?php echo $row['Itemid'].'--'.$row['Resid'].'--'.$row['Username']?>">>
                                                </a>
                                                <?php 
                                                    if($row['Available'] == 0) {
                                                        echo "<span class='product__label product__label--sale-out'>Soldout</span>";
                                                    }
                                                ?>

                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>
                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product__content m-t-20">
                                                <a href="product-single-default.php?Itemid=<?php echo $row['Itemid']?>" class="product__link"><?php echo $row['Name']?></a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB <?php echo $row['Price']?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>


                                        

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="milk">
                                <div class="default-slider default-slider--hover-bg-red product-default-slider">
                                    <div class="product-default-slider-4grid-2rows gap__col--30 gap__row--40">
                                        
                                        <?php 
                                            # type = main
                                            $query = "SELECT * FROM `item` WHERE `type`= 'appitizer' ORDER BY `TotalOrdered`, `Available` DESC";
                                            $result = $mysqli->query($query);
                                            while ($row = $result->fetch_array()) {
                                        ?>

                                        <div class="product__box product__default--single text-center">

                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php?Itemid=<?php echo $row['Itemid']?>" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-6.jpg"
                                                        alt="">
                                                </a>
                                                <?php 
                                                    if($row['Available'] == 0) {
                                                        echo "<span class='product__label product__label--sale-out'>Soldout</span>";
                                                    }
                                                ?>
                                                

                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product__content m-t-20">
                                                <a href="product-single-default.php" class="product__link"><?php echo $row['Name']?></a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB <?php echo $row['Price']?> </span>
                                                </div>
                                            </div>
                                        </div>

                                        <?php 
                                            }
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="fish">
                                <div class="default-slider default-slider--hover-bg-red product-default-slider">
                                    <div class="product-default-slider-4grid-2rows gap__col--30 gap__row--40">

                                        <div class="product__box product__default--single text-center">

                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-8.jpg"
                                                        alt="">
                                                </a>




                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product__content m-t-20">

                                                <a href="product-single-default.php" class="product__link">ITEM 23</a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 40.00 </span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="product__box product__default--single text-center">

                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-9.jpg"
                                                        alt="">
                                                </a>

                                                <span class="product__label product__label--sale-out">Soldout</span>


                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product__content m-t-20">

                                                <a href="product-single-default.php" class="product__link">ITEM 24</a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 55.00 </span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="product__box product__default--single text-center">

                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-10.jpg"
                                                        alt="">
                                                </a>

                                                <span class="product__label product__label--sale-out">Soldout</span>


                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product__content m-t-20">

                                                <a href="product-single-default.php" class="product__link">ITEM 25</a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 100.00</span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="product__box product__default--single text-center">

                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-3.jpg"
                                                        alt="">
                                                </a>






                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product__content m-t-20">

                                                <a href="product-single-default.php" class="product__link">ITEM 26</a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 190.00 </span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="product__box product__default--single text-center">

                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-4.jpg"
                                                        alt="">
                                                </a>

                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product__content m-t-20">

                                                <a href="product-single-default.php" class="product__link">ITEM 27</a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 50.00</span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="product__box product__default--single text-center">

                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-1.jpg"
                                                        alt="">
                                                </a>




                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product__content m-t-20">

                                                <a href="product-single-default.php" class="product__link">ITEM 28</a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 190.00 </span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="product__box product__default--single text-center">

                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-2.jpg"
                                                        alt="">
                                                </a>

                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>

                                            <div class="product__content m-t-20">

                                                <a href="product-single-default.php" class="product__link">ITEM 29</a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 250.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product__box product__default--single text-center">
                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-5.jpg"
                                                        alt="">
                                                </a>
                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>
                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__content m-t-20">

                                                <a href="product-single-default.php" class="product__link">ITEM 30</a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 55.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product__box product__default--single text-center">
                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-6.jpg"
                                                        alt="">
                                                </a>
                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__content m-t-20">

                                                <a href="product-single-default.php" class="product__link">ITEM 31</a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 190.00 </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product__box product__default--single text-center">
                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-7.jpg"
                                                        alt="">
                                                </a>
                                                <ul class="product__action--link pos-absolute">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"><i
                                                                class="icon-shopping-cart"></i></a></li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__content m-t-20">

                                                <a href="product-single-default.php" class="product__link">ITEM 32</a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 190.00 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                    <br>OPENING TIME</h4>
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

                <div class="modal fade" id="modalAddCart" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col text-end">
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true"> <i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="modal__product-img">
                                                        <img class="img-fluid"
                                                            src="assets/img/product/size-normal/product-home-1-img-1.jpg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="link--green link--icon-left"><i
                                                            class="fal fa-check-square"></i>Added to cart successfully!
                                                    </div>
                                                    <div class="modal__product-cart-buttons m-tb-15">
                                                        <a href="cart.php"
                                                            class="btn btn--box  btn--tiny btn--green btn--green-hover-black btn--uppercase">View
                                                            Cart</a>
                                                        <a href="checkout.php"
                                                            class="btn btn--box  btn--tiny btn--green btn--green-hover-black btn--uppercaset">Checkout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 modal__border">
                                            <ul class="modal__product-shipping-info">
                                                <li class="link--icon-left"><i class="icon-shopping-cart"></i> There Are
                                                    2 Items In Your Cart.</li>
                                                <li>TOTAL PRICE: <span>THB 65.00</span></li>
                                                <li><a href="#" class="btn text-underline color-green"
                                                        data-bs-dismiss="modal">CONTINUE SHOPPING</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col text-end">
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true"> <i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="product-gallery-box m-b-60">
                                                <div class="modal-product-image--large">
                                                    <img class="img-fluid"
                                                        src="assets/img/product/gallery/gallery-large/product-gallery-large-1.jpg"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="product-details-box">
                                                <h5 class="title title--normal m-b-20">TEST NAME</h5>
                                                <div class="product__price">
                                                    <span class="product__price-del">THB 350</span>

                                                </div>

                                                <div class="product__desc m-t-25 m-b-30">
                                                    <p>Product Detaiils</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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