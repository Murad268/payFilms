<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">

    <!-- Notify plugin -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">

</head>



<body>

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <img src="{{asset('assets/front/img/preloader.svg')}}" alt="">
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header>
        <div id="sticky-header" class="menu-area transparent-header">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="{{asset('assets/front/icons/'.$settings->logo)}}" alt="Logo">
                                    </a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li><a href="index.php">Əsas Səhİfə</a></li>
                                        <li><a href="movies.php?page=1">Son Yüklənən Fİlmlər</a></li>
                                        <li class="menu-item-has-children"><a href="#">Kateqorİyalar</a>
                                            <ul class="submenu">
                                                <?php
                                                // try {
                                                //     $sql = $conn->query("SELECT * FROM category");
                                                //     $sql2 = $conn->query("SELECT * FROM series");
                                                //     while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
                                                //         echo '<li><a href="category.php?category=' . $result['name'] . '">' . $result['name'] . '</a></li>';
                                                //     }
                                                // } catch (PDOException $e) {
                                                //     die($e->getMessage());
                                                // }
                                                ?>
                                            </ul>
                                        </li>
                                        <li><a href="series.php?page=1">Seriallar</a></li>
                                        <!-- <li><a href="tv-show">Kateqoriyalar</a></li> -->
                                        <!-- <li><a href="pricing">Pricing</a></li> -->
                                        <!-- <li class="menu-item-has-children"><a href="#">blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog">Our Blog</a></li>
                                                <li><a href="blog-details">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="contact.php">Əlaqə</a></li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <li class="header-search"><a href="#" data-toggle="modal" data-target="#search-modal"><i class="fas fa-search"></i></a></li>
                                        <!-- <li class="header-lang">
                                            <form action="#">
                                                <div class="icon"><i class="flaticon-globe"></i></div>
                                                <select id="lang-dropdown">
                                                    <option value="">En</option>
                                                    <option value="">Au</option>
                                                    <option value="">AR</option>
                                                    <option value="">TU</option>
                                                </select>
                                            </form>
                                        </li> -->
                                        <?php

                                        if (isset($_SESSION['sessionLogin'])) {
                                            echo '<li class="header-btn"><a href="account.php" class="btn">Hesabım</a></li>';
                                        } else {
                                            echo '<li class="header-btn"><a href="login.php" class="btn">Daxil ol</a></li>';
                                        }

                                        ?>

                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <div class="close-btn"><i class="fas fa-times"></i></div>

                            <nav class="menu-box">
                                <div class="nav-logo"><a href="index.php"><img src="{{asset('assets/front/icons/'.$settings->logo)}}" alt="" title=""></a>
                                </div>
                                <div class="menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <?php

                                        if (isset($_SESSION['sessionLogin'])) {
                                            echo '<li class="header-btn"><a href="account.php" class="btn">Hesabım</a></li>';
                                        } else {
                                            echo '<li class="header-btn"><a href="login.php" class="btn">Daxil ol</a></li>';
                                        }

                                        ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->

                        <!-- Modal Search -->
                        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form>
                                        <input type="text" placeholder="Axtar..." name="search" id="search" class="form-control" autocomplete="off">
                                        <div class="result"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Search-end -->

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

                        <script type="text/javascript">
                            $(document).ready(function() {
                                loadData();

                                function loadData(query) {
                                    $.ajax({
                                        url: "search.php",
                                        type: "POST",
                                        chache: false,
                                        data: {
                                            query: query
                                        },
                                        success: function(response) {
                                            $(".result").html(response);
                                        }
                                    });
                                }
                                $("#search").keyup(function() {
                                    let search = $(this).val();
                                    if (search != "") {
                                        loadData(search);
                                    } else {
                                        loadData();
                                    }
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </header>