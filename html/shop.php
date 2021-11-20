<?php
    session_start();
    $mysqli = new mysqli("localhost", "root", null, "css326_delivery");
    if(isset($_GET['resid'])) {
        echo 'looking at res id = '. $_GET['resid'];
        $query = "SELECT * FROM `restaurant` WHERE `Resid` =".$_GET['resid'];
        $result = $mysqli->query($query);
        $profile = $result->fetch_array(); 
    }
    if(isset($_POST['select-sort'])){
        echo 'sleect srt = '. $_POST['select-sort'];
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

    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="#">Home</a></li>
                        <li class="page-breadcrumb__nav active"><?php echo $profile['Name']?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row-reverse">

                <div class="col-lg-3">
                    <div class="sidebar">

                        <div class="sidebar__widget">
                            <div class="sidebar__box">
                                <h5 class="sidebar__title">OUR DISHES</h5>
                            </div>
                            <ul class="sidebar__menu">
                                <li>
                                    <ul class="sidebar__menu-collapse">

                                        <li class="sidebar__menu-collapse-list">
                                            <div class="accordion">
                                                <a href="#" class="accordion__title collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#men-fashion" aria-expanded="false">MENU <i
                                                        class="far fa-chevron-down"></i></a>
                                                <div id="men-fashion" class="collapse">
                                                    <ul class="accordion__category-list">
                                                        <li><a href="#">Appetizer</a></li>
                                                        <li><a href="#">Main Dish</a></li>
                                                        <li><a href="#">Salad</a></li>
                                                        <li><a href="#">Soup</a></li>
                                                        <li><a href="#">Dessert</a></li>
                                                        <li><a href="#">Drinks &amp; Beverages</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar__widget">
                            <div class="row">
                                <div class="col-12">
                                    <div class="sidebar__banner">
                                        <a href="product-single-default.html" class="banner__link text-center">
                                            <img class="img-fluid" src="assets/img/banner/size-port/img-sidebar.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget">
                            <div class="sidebar__box">
                                <h5 class="sidebar__title">TOP RATED PRODUCTS</h5>
                            </div>
                            <ul class="sidebar__post-product list-space--medium ">
                                <li class="d-flex align-items-center">
                                    <a href="product-single-default.html" class="sidebar__product-img img-responsive">
                                        <img class="product__img img-fluid"
                                            src="assets/img/product/size-small/product-home-1-img-1.jpg" alt="">
                                    </a>
                                    <div class="product__content">
                                        <a href="product-single-default.html" class="product__link">ITEM 1</a>
                                        <div class="product__price">
                                            <span class="product__price">THB 350.00</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <a href="product-single-default.html" class="sidebar__product-img img-responsive">
                                        <img class="product__img img-fluid"
                                            src="assets/img/product/size-small/product-home-1-img-2.jpg" alt="">
                                    </a>

                                    <div class="product__content">
                                        <a href="product-single-default.html" class="product__link">ITEM 2</a>

                                        <div class="product__price">
                                            <span class="product__price">THB 170.00</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <a href="product-single-default.html" class="sidebar__product-img img-responsive">
                                        <img class="product__img img-fluid"
                                            src="assets/img/product/size-small/product-home-1-img-3.jpg" alt="">
                                    </a>

                                    <div class="product__content">
                                        <a href="product-single-default.html" class="product__link">ITEM 3</a>

                                        <div class="product__price">
                                            <span class="product__price">THB 250.00</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="img-responsive">
                        <img src=<?php echo "../storage/profiile-image/".$profile['ResImg']?> alt="<?php echo $profile['Name'].'-img'?>">
                    </div>

                    <div class="sort-box m-tb-40">

                        <div class="sort-box-item">
                            <div class="sort-box__tab">
                                <ul class="sort-box__tab-list nav">
                                    <li><a class="sort-nav-link active" data-bs-toggle="tab" href="#sort-grid"><i
                                                class="fas fa-th"></i> </a></li>
                                    <li><a class="sort-nav-link" data-bs-toggle="tab" href="#sort-list"><i
                                                class="fas fa-list-ul"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="sort-box-item d-flex align-items-center flex-warp">
                            <span>Sort By:</span>
                            <div class="sort-box__option">
                                <label class="select-sort__arrow">
                                    <form action="#" method="post">
                                    <select name="select-sort" class="select-sort">
                                        <button type=submit> <option value="1">Relevance</option> </button>
                                        <button type=submit> <option value="2">Name, A to Z</option> </button>
                                        <!-- <option value="2">Name, A to Z</option> -->
                                        <option value="3"> Name, Z to A </option>
                                        <option value="4"> Price, low to high</option>
                                        <option value="5">Price, high to low</option>
                                    </select>
                                    <!-- <input type='hidden' > -->
                                    </form>
                                </label>
                            </div>
                        </div>

                        <div class="sort-box-item">
                            <span>Showing 1 - 9 of 12 result</span>
                        </div>
                    </div>

                    <div class="product-tab-area">
                        <div class="tab-content tab-animate-zoom">
                            <div class="tab-pane show active shop-grid" id="sort-grid">
                                <div class="row">

                                    <?php 
                                            # type = main
                                            $query = sprintf("SELECT i.*, r.Username FROM `item` i, `restaurant` r WHERE r.`Resid` = i.`Resid` AND i.`Resid` = %d ORDER BY i.`TotalOrdered`, i.`Available` DESC", $profile['Resid']);
                                            $result = $mysqli->query($query);
                                            while ($row = $result->fetch_array()) {
                                    ?>

                                    <div class="col-md-4 col-12">

                                        <div class="product__box product__default--single text-center">

                                            <div class="product__img-box  pos-relative">
                                                <a href="product-single-default.php?Itemid=<?php echo $row['Itemid']?>" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="<?php echo "../storage/food-image/".$row['ImageName']?>"
                                                        alt="<?php echo $row['Itemid'].'--'.$row['Resid'].'--'.$row['Username']?>">
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

                                                <a href="product-single-default.php?Itemid=<?php echo $row['Itemid']?>" class="product__link"><?php echo $row['Name']?></a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB <?php echo $row['Price']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>


                                </div>
                            </div>
                            <div class="tab-pane shop-list" id="sort-list">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="product__box product__box--list">

                                            <div class="product__img-box  pos-relative text-center">
                                                <a href="product-single-default.html" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-5.jpg"
                                                        alt="">
                                                </a>



                                            </div>

                                            <div class="product__content">

                                                <a href="product-single-default.html" class="product__link">
                                                    <h5 class="font--regular">ITEM 10</h5>
                                                </a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 550.00 </span>
                                                </div>
                                                <div class="product__desc">

                                                </div>

                                                <ul class="product__action--link-list m-t-30">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"
                                                            class="btn--black btn--black-hover-green">Add to cart</a>
                                                    </li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">

                                        <div class="product__box product__box--list">

                                            <div class="product__img-box  pos-relative text-center">
                                                <a href="product-single-default.html" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-8.jpg"
                                                        alt="">
                                                </a>




                                            </div>

                                            <div class="product__content">

                                                <a href="product-single-default.html" class="product__link">
                                                    <h5 class="font--regular">ITEM 11</h5>
                                                </a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 390.00 </span>
                                                </div>
                                                <div class="product__desc">

                                                </div>

                                                <ul class="product__action--link-list m-t-30">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"
                                                            class="btn--black btn--black-hover-green">Add to cart</a>
                                                    </li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="product__box product__box--list">

                                            <div class="product__img-box  pos-relative text-center">
                                                <a href="product-single-default.html" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-4.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="product__content">

                                                <a href="product-single-default.html" class="product__link">
                                                    <h5 class="font--regular">ITEM 12</h5>
                                                </a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 50.00</span>
                                                </div>
                                                <div class="product__desc">

                                                </div>
                                                <ul class="product__action--link-list m-t-30">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"
                                                            class="btn--black btn--black-hover-green">Add to cart</a>
                                                    </li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="product__box product__box--list">
                                            <div class="product__img-box  pos-relative text-center">
                                                <a href="product-single-default.html" class="product__img--link">
                                                    <img class="product__img img-fluid"
                                                        src="assets/img/product/size-normal/product-home-1-img-9.jpg"
                                                        alt="">
                                                </a>
                                                <span class="product__label product__label--sale-out">Soldout</span>
                                            </div>
                                            <div class="product__content">

                                                <a href="product-single-default.html" class="product__link">
                                                    <h5 class="font--regular">ITEM 13</h5>
                                                </a>
                                                <div class="product__price m-t-5">
                                                    <span class="product__price">THB 50.00</span>
                                                </div>
                                                <div class="product__desc">

                                                </div>
                                                <ul class="product__action--link-list m-t-30">
                                                    <li><a href="#modalAddCart" data-bs-toggle="modal"
                                                            class="btn--black btn--black-hover-green">Add to cart</a>
                                                    </li>

                                                    <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                                                    <li><a href="#modalQuickView" data-bs-toggle="modal"><i
                                                                class="icon-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page-pagination">
                        <ul class="page-pagination__list">
                            <li class="page-pagination__item"><a class="page-pagination__link" href="#">Prev</a>
                            <li class="page-pagination__item"><a class="page-pagination__link active" href="#">1</a>
                            </li>
                            <li class="page-pagination__item"><a class="page-pagination__link" href="#">2</a></li>
                            <li class="page-pagination__item"><a class="page-pagination__link" href="#">Next</a>
                            </li>
                        </ul>
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