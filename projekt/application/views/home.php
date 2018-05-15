<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name = "format-detection" content = "telephone=no" />
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="booking/css/booking.css">
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/script.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <script src="js/jquery.mobilemenu.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/camera.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->
    <script src="booking/js/booking.js"></script>
    <script>
        $(document).ready(function(){
            jQuery('#camera_wrap').camera({
                loader: false,
                pagination: false ,
                minHeight: '444',
                thumbnails: false,
                height: '26.18105%',
                caption: true,
                navigation: true,
                fx: 'mosaic'
            });
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" media="screen" href="css/ie.css">
    <![endif]-->
</head>
<body class="page1" id="top">
<div class="main">
    <!--==============================header=================================-->
    <header>
        <div class="menu_block ">
            <div class="container_12">
                <div class="grid_12">
                    <nav class="horizontal-nav full-width horizontalNav-notprocessed">
                        <ul class="sf-menu">
                            <li class="current"><a href="<?php echo site_url('Home')  ?>">Home</a></li>
                            <li><a href="<?php echo site_url('Zakaznik/index')  ?>">Zakaznici</a></li>
                            <li><a href="<?php echo site_url('Auta')  ?>">Detail</a></li>
                            <li><a href="<?php echo site_url('Jazda')  ?>">Rezervacia</a></li>
                            <li><a href="<?php echo site_url('Zakaznik/index')  ?>">Sportoviska</a></li>
                        </ul>
                    </nav>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="container_12">
            <div class="grid_12">
                <h1>
                    <a href="<?php echo site_url('home')  ?>">
                        <img src="assets/images/logo1.jpg" width="600" height="350"  alt="Príď si zašportovať!!">
                    </a>
                    <a href="<?php echo site_url('home')  ?>">
                        <img src="assets/images/logo2.jpg" width="600" height="350"  alt="Príď si zašportovať!!">
                    </a>
                </h1>
            </div>
        </div>
        <div class="clear"></div>
    </header>
    <div class="slider_wrapper ">
        <div id="camera_wrap" class="">
            <div data-src="images/slide.jpg" ></div>
            <div data-src="images/slide1.jpg" ></div>
            <div data-src="images/slide2.jpg"></div>
        </div>
    </div>
    <div class="container_12">
        <div class="grid_4">
            <div class="banner">
                <div class="maxheight">
                    <div class="banner_title">
                        <img src="images/icon1.png" alt="">
                        <div class="extra_wrapper">Zdravie&amp;
                            <div class="color1">Šport</div>
                        </div>
                    </div>
Prídťe si k nám zašportovať na jednom z našich športovísk. Prerite si našu ponuku a vyberte si to pravé pre Vás.
                    <a href="<?php echo site_url('Jazdy')  ?>" class="fa fa-share-square"></a>
                </div>
            </div>
        </div>

        <div class="clear"></div>
    </div>
    <div class="c_phone">
        <div class="container_12">
            <div class="grid_12">
                <div class="fa fa-phone"></div>+421 911 223 322
                <span>Rezervuj na tomto čísle</span>
                <a href="<?php echo site_url('home')  ?>">
                    <img src="assets/images/ikona.png" width="200" height="200"  alt="Príď si zašportovať!!">
                </a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!--==============================footer=================================-->
<script>
    $(function (){
        $('#bookingForm').bookingForm({
            ownerEmail: '#'
        });
    })
    $(function() {
        $('#bookingForm input, #bookingForm textarea').placeholder();
    });
</script>
</body>
</html>