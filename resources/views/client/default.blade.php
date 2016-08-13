<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>MEN'S CUSTOM TAILOR </title>
    <link rel="stylesheet" type="text/css" href="<?php echo URL::asset('public/assets/client/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo URL::asset('public/assets/client/css/my_style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo URL::asset('public/assets/client/css/responsive.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo URL::asset('public/assets/client/css/owl.carousel.css'); ?>">
    <link rel="stylesheet"
          href="<?php echo URL::asset('public/assets/client/css/font-awesome-4.6.3/css/font-awesome.min.css'); ?>">
    <script type="text/javascript"
            src="<?php echo URL::asset('public/assets/client/js/jquery-1.11.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo URL::asset('public/assets/client/js/my_script.js'); ?>"></script>
    <script type="text/javascript"
            src="<?php echo URL::asset('public/assets/client/js/owl.carousel.min.js'); ?>"></script>
    <script type="text/javascript"
            src="<?php echo URL::asset('public/assets/client/js/jquery.bxslider.js'); ?>"></script>

    <script type="text/javascript">

        $(document).ready(function (e) {
            if ($('.banner_slider').length > 0) {
                $('.banner_slider').bxSlider({
                    minSlides: 1,
                    maxSlides: 1,
                    auto: true
                });
            }

            if ($('.testimonial_slider').length > 0) {
                $('.testimonial_slider').bxSlider({
                    minSlides: 1,
                    maxSlides: 1
                });
            }

            if ($('.customize_slider').length > 0) {
                /*$('.customize_slider').bxSlider({
                 minSlides: 1,
                 maxSlides: 1
                 });*/
            }
        });
    </script>


</head>
<body class="page--filtering" data-page="filtering" data-page-id="home">
<input type="hidden" id="baseUrl" value="<?=URL::to('/');?>"/>
@if(Session::has('globalErrMsg'))
    <div style="display:block;"
         class="setOutputSession errorMsgs alert {{ Session::get('alert-class', 'alert-info') }}">
        <span>{{ Session::get('globalErrMsg') }}</span>
        <span class="fa fa-1x fa-times pull-right closeSessionOutput"></span>
    </div>

@endif

@if(Session::has('globalSuccessMsg'))
    <div style="display:block;"
         class="setOutputSession successMsgs alert {{ Session::get('alert-class', 'alert-info') }}">
        <span>{{ Session::get('globalSuccessMsg') }}</span>
        <span class="fa fa-1x fa-times pull-right closeSessionOutput"></span>
    </div>
@endif
<div id="wrapper" data-js-module="filtering-demo" role="main" class="page-container current-page">
    <div class="header">
        <div class="auto_content">
            <div class="header_dtail clearfix">
                <div class="men_logo">
                    <a href="<?php echo URL::to('/');?>"><img
                            src="<?php echo URL::to('public/assets/client/images/header_logo.png');?>"
                            alt="#"/></a>
                </div>

                <div class="menu_cart_outer clearfix">
                    <div class="mens_menu clearfix">
                        <b>X</b>
                        <ul>
                            <li><a href="<?php echo URL::to('/');?>">Home</a></li>
                            <li><a href="<?php echo URL::to('about-us');?>">About</a></li>
                            <li><a href="<?php echo URL::to('fabric');?>">Fabric</a></li>
                            <li><a href="#">Style</a></li>
                            <li><a href="#">Measurements</a></li>
                            <li><a href="<?php echo URL::to('contact-us');?>">Contact Us</a></li>
                        </ul>
                    </div>
                    <a href="javascript:void(0)" class="menuIcon">&nbsp;</a>

                    <div class="cart_and_search clearfix">
                        <a href="javascript:void(0)" class="icon_search">&nbsp;</a>
                        <a href="javascript:void(0)" class="icon_cart">&nbsp;</a>
                        @if(!Session::has('CustomerID'))
                            <a id="top_login" href="<?php echo URL::to('/login');?>" class="icon_login">&nbsp;</a>
                        @endif
                    </div>

                    @if(Session::has('CustomerID'))
                        <div class="login_profile clearfix">
                            <span>
                                <img src="<?= URL::to('public/assets/client/images/login_img.png'); ?>" alt="#"/>
                            </span>
                            <a href="#">User Name</a>
                            <ul>
                                <li><a href="#">lovely</a></li>
                                <li><a href="#">Setting</a></li>
                                <li><a href="<?php echo URL::to('/logout');?>">Log Out</a></li>
                            </ul>
                        </div>
                    @endif

                    <div class="card_popup">
                        <h4>Cart Summary</h4>
                        <ul>
                            <?php
                            $TotalPrice = 0;
                            $showTotal = false;
                            if(is_array($ShareData['itemSelected']) && !empty($ShareData['itemSelected'])) {
                            $showTotal = true;
                            foreach ($ShareData['itemSelected'] as $key => $item) { ?>
                            <li class="clearfix">
                                <a href="<?=URL::to('cart/remove/' . $key . '');?>" class="list_close">&nbsp;</a>
                                <img src="<?php echo URL::to('resources/assets/images/' . $item['ProductImage']); ?>"
                                     alt="#"/>
                                <label style="width: 163px;"><?=$item['ProductName'];?></label>
                                <strong> $<?php
                                    $TotalPrice += $item['Price'];
                                    echo $item['Price'];
                                    ?></strong>
                            </li>
                            <?php } ?>
                            <?php } else { ?>
                            <li class="clearfix">
                                <p style="text-align:center;">no item selected.</p>
                            </li>
                            <?php } ?>
                        </ul>

                        <?php if($showTotal){ ?>
                        <div class="total_cart clearfix">
                            <h5>TOTAL</h5>
                            <span>  $<?=$TotalPrice;?></span>
                        </div>
                        <a href="<?php echo URL::to('/cart');?>" class="check_bttn">CHECKOUT</a>
                        <?php } ?>
                    </div>
                </div>

                <div class="search_div">
                    <a href="javascript:void(0)">&nbsp;</a>
                    <input type="search" value="" placeholder="Search..."/>
                </div>

            </div>
        </div>
    </div>
    @yield('content')
    <div class="footer">
        <div class="footer_top">
            <div class="auto_content">
                <div class="footer_top_dtail clearfix">
                    <div class="footer_logo">
                        <a href="#">
                            <img src="<?php echo URL::to('public/assets/client/images/header_logo.png');?>"
                                 alt="Logo"/>
                        </a>

                        <p>Lorem Ipsum available but the have
                            suffered alteration in some form orem
                            Ipsum is that it has a more-or-less
                            normal distribution of letters, as
                            opposed making it look like readable.</p>
                    </div>

                    <div class="footer_links">
                        <ul>
                            <li><a href="<?php echo URL::to('/');?>">Home </a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="<?php echo URL::to('fabric');?>">Fabric</a></li>
                            <li><a href="#">Style</a></li>
                            <li><a href="#">Measurements</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="footer_links">
                        <ul>
                            <li><a href="#">Home </a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Fabric</a></li>
                            <li><a href="#">Style</a></li>
                            <li><a href="#">Measurements</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="footer_socialLinks">
                        <ul>
                            <li><a href="#"><img src="<?php echo URL::to('public/assets/client/images/fb_icon.png');?>"
                                                 alt="#"/></a></li>
                            <li><a href="#"><img
                                            src="<?php echo URL::to('public/assets/client/images/twit_icon.png');?>"
                                            alt="#"/></a></li>
                            <li><a href="#"><img
                                            src="<?php echo URL::to('public/assets/client/images/google_icon.png');?>"
                                            alt="#"/></a></li>
                            <li><a href="#"><img
                                            src="<?php echo URL::to('public/assets/client/images/linked_icon.png');?>"
                                            alt="#"/></a></li>
                            <li><a href="#"><img
                                            src="<?php echo URL::to('public/assets/client/images/insta_icon.png');?>"
                                            alt="#"/></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p>© Copyright 2016 men’s custom tailor. All Rights Reserved.</p>
        </div>
    </div>

</div>
<script type="text/javascript" src="<?php echo URL::to('public/assets/client/js/isotope-docs.min.js');?>"></script>
<script type="text/javascript" src="<?php echo URL::to('public/assets/client/js/customize.js');?>"></script>
</body>
</html>