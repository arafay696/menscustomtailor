@extends('client.default')
@section('content')
    <!-- Page Wrapper -->
    <div class="container">
        <div class="banner_dtail">

            <ul class="banner_slider">
                <li>
                    <div class="banner_div">
                        <span><img src="<?php echo URL::to('public/assets/client/images/slider_img.png');?>"
                                   alt="#"/></span>

                        <div class="banner_div_txt">
                            <div class="auto_content">
                                <div class="banner_heading">
                                    <h3>Custom Made to the <br>Highest Standards.
                                        <p>Starting at $29.99</p>
                                    </h3>
                                    <a href="<?php echo URL::to('fabric');?>">Shop Shirts</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                <li>
                    <div class="banner_div">
                        <span><img src="<?php echo URL::to('public/assets/client/images/slider_img.png');?>"
                                   alt="#"/></span>

                        <div class="banner_div_txt">
                            <div class="auto_content">
                                <div class="banner_heading">
                                    <h3>Custom Made to the <br>Highest Standards.
                                        <p>Starting at $29.99</p>
                                    </h3>
                                    <a href="<?php echo URL::to('fabric');?>">Shop Shirts</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                <li>
                    <div class="banner_div">
                        <span><img src="<?php echo URL::to('public/assets/client/images/slider_img.png');?>"
                                   alt="#"/></span>

                        <div class="banner_div_txt">
                            <div class="auto_content">
                                <div class="banner_heading">
                                    <h3>Custom Made to the <br>Highest Standards.
                                        <p>Starting at $29.99</p>
                                    </h3>
                                    <a href="<?php echo URL::to('fabric');?>">Shop Shirts</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="men_tailor_listing ">
            <div class="auto_content">
                <div class="men_tailor_listDtail clearfix">
                    <ul>
                        <li>
                            <img src="<?php echo URL::to('public/assets/client/images/list_img2.png');?>" alt="#"/>

                            <div class="overley_div_list">
                                <div class="list_inn_dtail">
                                    <h3>Welcome to Men’s Custom Tailor</h3>

                                    <p>Lorem Ipsum available but the have
                                        suffered alteration in some form orem
                                        Ipsum is that it has a more-or-less
                                        normal distribution of letters, as
                                        opposed making it look like readable.</p>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo URL::to('public/assets/client/images/list_img1.png');?>" alt="#"/>

                            <div class="overley_div_list">
                                <div class="list_inn_dtail">
                                    <h3>Welcome to Men’s Custom Tailor</h3>

                                    <p>Lorem Ipsum available but the have
                                        suffered alteration in some form orem
                                        Ipsum is that it has a more-or-less
                                        normal distribution of letters, as
                                        opposed making it look like readable.</p>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo URL::to('public/assets/client/images/list_img2.png');?>" alt="#"/>

                            <div class="overley_div_list">
                                <div class="list_inn_dtail">
                                    <h3>Welcome to Men’s Custom Tailor</h3>

                                    <p>Lorem Ipsum available but the have
                                        suffered alteration in some form orem
                                        Ipsum is that it has a more-or-less
                                        normal distribution of letters, as
                                        opposed making it look like readable.</p>
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="best_shirt_section">
            <div class="auto_content">
                <div class="best_shirt_sectionDtail clearfix">
                    <div class="best_shirt_text">
                        <h3>The Best Performing Shirt In The World™</h3>

                        <p>Lorem Ipsum available but the have suffered alteration in some form
                            orem Ipsum is that it has a more-or-less normal distribution of letters,
                            as opposed making it look like readable.</p>
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="popular_choices">
            <div class="auto_content">
                <div class="popular_choices_dtail">
                    <div class="popular_head">
                        <label>Popular choices</label>

                        <p>Lorem Ipsum available but the have suffered alteration in some form orem Ipsum is that it has
                            a more-or-less normal distribution of letters,
                            as opposed making it look like readable.</p>
                    </div>

                    <div class="popular_choices_list clearfix">
                        <ul>
                            <?php foreach($products as $key => $product) { ?>
                            <li>
                                <a href="<?php echo URL::to('fabric');?>">
                                    <img src="<?php echo URL::to('resources/assets/images/' . $product->ImgName . '');?>"
                                         alt="#"/>
                                </a>
                                <span>
                                    	<a href="<?php echo URL::to('fabric');?>">
                                            <?=$product->Name;?>
                                        </a>
                                        $<?=$product->Price;?>
                                    </span>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="people_says_section">
            <div class="auto_content">
                <div class="people_says_sectionDtail">
                    <div class="people_says_head">
                        <label>What People Says</label>

                        <p>Lorem Ipsum available but the have suffered </p>
                    </div>

                    <div class="testimonial_section">
                        <ul class="testimonial_slider">
                            <li class="clearfix">
                                <div class="people_say">
                                    <p>Vivamus nec magna vel orci dictum lacinia. Nulla velit risus, commod
                                        est ac, congue dictum tortor. Nunc viverra condimentum diam. Nullam
                                        lisis neque vitae mi dignissim egestas. Quisque fringilla, lorem et ultri
                                        molestie, justo est venenatis dolor, et sodales metus orci tristique aug
                                        In pharetra, elit eget mollis lobortis, dui erat pellentesque est, vitae viv
                                        erat dolor et arcu. Quisque mattis elit eget ante sagittis congue. Lor
                                        ipsum dolor sit amet,</p>

                                    <div class="testimonial_img clearfix ">
                                        <a href="#"><img
                                                    src="<?php echo URL::to('public/assets/client/images/test_img.png');?>"
                                                    alt="#"/></a>
                                        <label>
                                            - Darlene Aja custmer</label>
                                    </div>
                                </div>
                                <div class="people_say">
                                    <p>Vivamus nec magna vel orci dictum lacinia. Nulla velit risus, commod
                                        est ac, congue dictum tortor. Nunc viverra condimentum diam. Nullam
                                        lisis neque vitae mi dignissim egestas. Quisque fringilla, lorem et ultri
                                        molestie, justo est venenatis dolor, et sodales metus orci tristique aug
                                        In pharetra, elit eget mollis lobortis, dui erat pellentesque est, vitae viv
                                        erat dolor et arcu. Quisque mattis elit eget ante sagittis congue. Lor
                                        ipsum dolor sit amet,</p>

                                    <div class="testimonial_img  clearfix">
                                        <a href="#"><img
                                                    src="<?php echo URL::to('public/assets/client/images/test_img.png');?>"
                                                    alt="#"/></a>
                                        <label>
                                            - Darlene Aja custmer</label>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="people_say">
                                    <p>Vivamus nec magna vel orci dictum lacinia. Nulla velit risus, commod
                                        est ac, congue dictum tortor. Nunc viverra condimentum diam. Nullam
                                        lisis neque vitae mi dignissim egestas. Quisque fringilla, lorem et ultri
                                        molestie, justo est venenatis dolor, et sodales metus orci tristique aug
                                        In pharetra, elit eget mollis lobortis, dui erat pellentesque est, vitae viv
                                        erat dolor et arcu. Quisque mattis elit eget ante sagittis congue. Lor
                                        ipsum dolor sit amet,</p>

                                    <div class="testimonial_img  clearfix">
                                        <a href="#"><img
                                                    src="<?php echo URL::to('public/assets/client/images/test_img.png');?>"
                                                    alt="#"/></a>
                                        <label>
                                            - Darlene Aja custmer</label>
                                    </div>
                                </div>
                                <div class="people_say">
                                    <p>Vivamus nec magna vel orci dictum lacinia. Nulla velit risus, commod
                                        est ac, congue dictum tortor. Nunc viverra condimentum diam. Nullam
                                        lisis neque vitae mi dignissim egestas. Quisque fringilla, lorem et ultri
                                        molestie, justo est venenatis dolor, et sodales metus orci tristique aug
                                        In pharetra, elit eget mollis lobortis, dui erat pellentesque est, vitae viv
                                        erat dolor et arcu. Quisque mattis elit eget ante sagittis congue. Lor
                                        ipsum dolor sit amet,</p>

                                    <div class="testimonial_img  clearfix">
                                        <a href="#"><img
                                                    src="<?php echo URL::to('public/assets/client/images/test_img.png');?>"
                                                    alt="#"/></a>
                                        <label>
                                            - Darlene Aja custmer</label>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="people_say">
                                    <p>Vivamus nec magna vel orci dictum lacinia. Nulla velit risus, commod
                                        est ac, congue dictum tortor. Nunc viverra condimentum diam. Nullam
                                        lisis neque vitae mi dignissim egestas. Quisque fringilla, lorem et ultri
                                        molestie, justo est venenatis dolor, et sodales metus orci tristique aug
                                        In pharetra, elit eget mollis lobortis, dui erat pellentesque est, vitae viv
                                        erat dolor et arcu. Quisque mattis elit eget ante sagittis congue. Lor
                                        ipsum dolor sit amet,</p>

                                    <div class="testimonial_img  clearfix">
                                        <a href="#"><img
                                                    src="<?php echo URL::to('public/assets/client/images/test_img.png');?>"
                                                    alt="#"/></a>
                                        <label>
                                            - Darlene Aja custmer</label>
                                    </div>
                                </div>
                                <div class="people_say">
                                    <p>Vivamus nec magna vel orci dictum lacinia. Nulla velit risus, commod
                                        est ac, congue dictum tortor. Nunc viverra condimentum diam. Nullam
                                        lisis neque vitae mi dignissim egestas. Quisque fringilla, lorem et ultri
                                        molestie, justo est venenatis dolor, et sodales metus orci tristique aug
                                        In pharetra, elit eget mollis lobortis, dui erat pellentesque est, vitae viv
                                        erat dolor et arcu. Quisque mattis elit eget ante sagittis congue. Lor
                                        ipsum dolor sit amet,</p>

                                    <div class="testimonial_img  clearfix">
                                        <a href="#"><img
                                                    src="<?php echo URL::to('public/assets/client/images/test_img.png');?>"
                                                    alt="#"/></a>
                                        <label>
                                            - Darlene Aja custmer</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Wrapper -->
@endsection