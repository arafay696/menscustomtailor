<!DOCTYPE HTML>

<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title><?php echo $info['title']; ?> </title>
    <meta name="subject" content="Custom Tailored Shirts">
	<!--<meta name="Keywords" content="dress shirts, custom shirts, business shirts, tailored shirts, custom tailored shirts, custom suits, tailored suits, shirts, buy shirts, tailored shirts online, custom tailored shirts online, dress shirts, custom shirts, business shirts, tailored shirts">-->
	<meta name="Description" content="Custom Shirts from $49, Top Quality, Tailored Dress Shirts, Hundrads of Fabrics, Business Shirts, Dress Shirts, Worldwide Delivery, Custom Dress Shirts">
	<meta name="Designer" content="www.menscustomtailor.com">
	<meta name="Publisher" content="Men's Custom Tailor">
	<meta name="distribution" content="Global">
	<meta name="Robots" content="INDEX,FOLLOW">
	<meta name="google-site-verification" content="5dWiRRUd-15hjmVA-0NSSqElv_BwlserT-w3AjtRAjs" />
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
    <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen"/>
    <script type="text/javascript">

        $(document).ready(function (e) {
            //$("a.single_image").fancybox();
            if ($('.banner_slider').length > 0) {
                $('.banner_slider').bxSlider({
                    minSlides: 1,
                    maxSlides: 1,
                    auto: true,
                    speed: 1000,
                    pause: 6000
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

            if ($('.product_slider').length > 0) {
                $('.product_slider').bxSlider({
                    minSlides: 4,
                    maxSlides: 4,
                    auto: true,
                    slideWidth: 285,
                    speed: 1000,
                    pause: 6000,
                    controls: false,
                    ticker: false,
                    pager: false,
                });
            }
        });
    </script>
	<!--Start of Zendesk Chat Script-->
	<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
	$.src="https://v2.zopim.com/?4Pyy3A8rrzBLeONLLj6CecN9TVWKdfxy";z.t=+new Date;$.
	type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
	</script>
	<!--End of Zendesk Chat Script-->

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
                                alt="Custom Dress Shirts"/></a>
                </div>

                <div class="menu_cart_outer clearfix">
                    <div class="mens_menu clearfix">
                        <b>X</b>
                        <ul>
                            <li><a href="<?php echo URL::to('/');?>">Home</a></li>
                            <li><a href="<?php echo URL::to('about-us');?>">About Us</a></li>
                            <li><a href="<?php echo URL::to('fabric');?>">Fabrics</a></li>
                            <li><a href="<?php echo URL::to('contact-us');?>">Contact Us</a></li>
                            <li><a href="<?php echo URL::to('faqs');?>">FAQ</a></li>
                            <li class="showOnMobile"><a href="<?php echo URL::to('profile');?>">Account </a></li>
                            <li class="showOnMobile"><a href="<?php echo URL::to('order-history');?>">Order History</a></li>
                            <li class="showOnMobile"><a href="<?php echo URL::to('cart');?>">Shopping Cart</a></li>
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
                                <?php if(Session::get('CustomerImg') != "") { ?>
                                <img src="<?php echo URL::to('resources/assets/userimages/' . Session::get('CustomerImg'));?>"
                                     alt="#"/>
                                <?php } else { ?>
                                <img src="<?= URL::to('public/assets/client/images/login_img.png'); ?>" alt="Men's Custom Tailor Login"/>
                                <?php } ?>
                            </span>
                            <a href="#">{{Session::get('CustomerName')}}</a>
                            <ul>
                                <li><a href="<?php echo URL::to('profile');?>">Profile</a></li>
                                <li><a href="<?php echo URL::to('order-history');?>">Order History</a></li>
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
    <link rel="stylesheet" type="text/css" href="<?php echo URL::asset('public/assets/client/css/footer.css'); ?>">
	<footer id="footer">
			<div class="container_12">
	<div class="grid_12">
		<div class="footer-top">
			<div class="grid_3 alpha">
				<div class="footer-block-title">
					<h2>About us</h2>
				</div>
				<div class="footer-info">
					<a href="#" title="Footer Logo" class="footer-logo"><img src="<?php echo URL::to('public/assets/client/images/footer-logo-mct.png');?>" alt=""></a>
					<p>Mens Custom Tailor provides a cutting edge technology platform for those men who are after individuality through custom apparel. Our hundreds of different textiles range from premium fabrics for the man who demands the ultimate sophistication, down to the style conscious man who wants value for his money.</p>
					
				</div>
				<hr class="indent-36 white-space">
			</div>
			<div class="grid_3">
				<div class="footer-block-title">
					<h2>Site Map</h2>
				</div>
				<ul>
					<li><a href="<?php echo URL::to('/');?>">Home </a></li>
					<li><a href="<?php echo URL::to('about-us');?>">About</a></li>
					<li><a href="<?php echo URL::to('fabric');?>">Fabrics</a></li>
					<li><a href="<?php echo URL::to('contact-us');?>">Contact Us</a></li>
					<li><a href="<?php echo URL::to('faqs');?>">FAQ</a></li>
				</ul>
				<hr class="indent-36 white-space">
			</div>
			<div class="grid_3">
				<div class="footer-block-title">
					<h2>Contact Us</h2>
				</div>
				<ul class="contact-info">
					<li>
						<i class="fa fa-phone"></i>
						<span>
							<strong>(678) 740-3530</strong>
							
						</span>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<span>
							<strong>2523 Ferndale Ln.</strong>
							<strong>Snellville, GA 30078 USA</strong>
						</span>
					</li>
					<li>
						<i class="fa fa-envelope-o"></i>
						<span>
							<strong><a href="mailto:info@menscustomtailor.com">info@menscustomtailor.com</a></strong>
						</span>
					</li>
					<li>
						<i class="fa fa-clock-o"></i>
						<span>
							<strong>From Monday to Friday</strong>
							<strong>9:00 a.m. to 5:00 p.m.</strong>
						</span>
					</li>
				</ul>
				<hr class="indent-36 white-space">
			</div>
			<div class="grid_3 omega">
				<div class="footer-block-title">
					<h2>Orders</h2>
				</div>
				<ul>
					<li><a href="<?php echo URL::to('profile');?>">Account</a></li>
					<li><a href="<?php echo URL::to('order-history');?>">Order History</a></li>
					<li><a href="<?php echo URL::to('cart');?>">Shopping Cart</a></li>
					<li><a href="<?php echo URL::to('gift-card');?>">Gift Cards</a></li>
					
				</ul>
				<hr class="indent-36 white-space"></div>
			<div class="clear"></div>
		</div>
		<hr class="solid">
		<div class="footer-block">
			<div class="left">
				<ul class="social-links"><li><a class="twitter" href="https://twitter.com/@cs06908547"><i class="fa fa-twitter"></i></a></li><li><a class="facebook" href="https://www.facebook.com/MensCustomTailor-752451578190499/"><i class="fa fa-facebook"></i></a></li><li><a class="googleplus" href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li><li><a class="linkedin" href="http://linkedin.com/"><i class="fa fa-linkedin"></i></a></li><li><a class="pinterest" href="https://www.pinterest.com/menscustomtailo/"><i class="fa fa-pinterest"></i></a></li></ul>
			</div>
            <hr class="solid mobile">
			<div class="right">
				<ul class="footer-links">
					<li><a href="<?php echo URL::to('about-us');?>">About Us</a></li>
					<li><a href="<?php echo URL::to('faqs');?>">Faq</a></li>
					<li><a href="<?php echo URL::to('order-history');?>">Orders History</a></li>
					<li class="last"><a href="<?php echo URL::to('contact-us');?>">Contact Us</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>

</div>	</footer>

</div>
<script type="text/javascript" src="<?php echo URL::to('public/assets/client/jsPDF/dist/jspdf.min.js');?>"></script>

<script type="text/javascript" src="<?php echo URL::to('public/assets/client/js/isotope-docs.min.js');?>"></script>
<script type="text/javascript" src="<?php echo URL::to('public/assets/client/js/html2canvas.js');?>"></script>
<script type="text/javascript" src="<?php echo URL::to('public/assets/client/js/customize.js');?>"></script>

	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-88040522-1', 'auto');
      ga('send', 'pageview');
    
    </script>
</body>	
</html>