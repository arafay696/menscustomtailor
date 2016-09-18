@extends('client.default')
@section('content')
    <!-- Page Wrapper -->
    <div class="container">
        <div class="banner_dtail">

            <ul class="banner_slider">
                <li>
                    <a href="<?php echo URL::to('fabric');?>">
                        <div class="banner_div">
                        <span><img src="<?php echo URL::to('public/assets/client/images/slider_img.png');?>"
                                   alt="#"/></span>

                            <div class="banner_div_txt">
                                <div class="auto_content">
                                    <div class="banner_heading">
                                        <h3>The Perfect <br/>Custom Shirt
                                            <p>
                                                <strong>You buy it, you wear it, and you’ll love it.</strong>
                                            </p>
                                        </h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL::to('fabric');?>">
                        <div class="banner_div">
                        <span><img src="<?php echo URL::to('public/assets/client/images/slider_img.png');?>"
                                   alt="#"/></span>

                            <div class="banner_div_txt">
                                <div class="auto_content">
                                    <div class="banner_heading">
                                        <h3>Our easy proven <br/>
                                            <p>online system will help you design the <br/>perfect shirt, whatever your
                                                needs.</p>
                                        </h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </li>
            <!--<li class="hide">
                    <div class="banner_div">
                        <span><img src="<?php  URL::to('public/assets/client/images/slider_img.png');?>"
                                   alt="#"/></span>

                        <div class="banner_div_txt hide">
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
                </li>-->
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

                                    <p>Excellent craftsmanship, premium quality, creative innovation and diversity in
                                        style. Our Collection is what was formerly known as Red Ribbon and defines
                                        everything you would expect from MensCustomTailor.com shirt.
                                    </p>
                                    <a class="hide" href="#">Read More</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo URL::to('public/assets/client/images/list_img1.png');?>" alt="#"/>

                            <div class="overley_div_list">
                                <div class="list_inn_dtail">
                                    <h3>Welcome to Men’s Custom Tailor</h3>

                                    <p>Cut from performance fabrics made from 100 % premium cotton – Our Collection
                                        comprises classic, yet contemporary dress shirts for men. This is our flagship
                                        collection where all our brand values truly become envisioned.
                                    </p>
                                    <a class="hide" href="#">Read More</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?php echo URL::to('public/assets/client/images/list_img2.png');?>" alt="#"/>

                            <div class="overley_div_list">
                                <div class="list_inn_dtail">
                                    <h3>Welcome to Men’s Custom Tailor</h3>

                                    <p>Ordering a custom shirt involves using our easy proven online measuring system,
                                        and then we create a pattern specific for your body. We then use that pattern to
                                        cut the fabric and then sew the shirt in our state of the art sewing facility.
                                        Custom tailoring is often referred to as "bespoke," an old tailoring term
                                        meaning that a certain fabric has been "spoken for" by a customer and is
                                        therefore no longer for sale. </p>
                                    <a class="hide" href="#">Read More</a>
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
                        <h3>
                            SHOULD MEN BE JUDGED BY THE WAY THEY DRESS?
                        </h3>

                        <p>
                            From the advent of civilization, man has been in situations where he is judged by his
                            clothes first before his merits are assessed. A man needs to look his very best, more so in
                            this competitive and professional world.
                        </p>
                        <a class="hide" href="#">View More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="popular_choices">
            <div class="auto_content">
                <div class="popular_choices_dtail">
                    <div class="popular_head">
                        <label>Popular choices</label>

                        <p>
                            PICK YOUR FASHION STATEMENT
                        </p>
                    </div>

                    <div class="popular_choices_list clearfix">
                        <ul>
                            <?php
                            if(!is_array($products)){
                            foreach($products as $key => $product) { ?>
                            <li>
                                <a href="<?php echo URL::to('fabric');?>">
                                    <img src="<?php echo URL::to('resources/assets/images/' . $product->ImgName . '');?>"
                                         alt="#"/>
                                </a>
                                <span>
                                    	<a href="<?php echo URL::to('fabric');?>">
                                            <?=$product->Name;?>
                                        </a>
                                    {{--$<?$product->Price;?>--}}
                                    </span>
                            </li>
                            <?php } }?>
                            <li>
                                <a href="<?php echo URL::to('fabric');?>">
                                    <img src="<?php echo URL::to('resources/assets/images/38948.png');?>"
                                         alt="#"/>
                                </a>
                                <span>
                                    	<a href="<?php echo URL::to('fabric');?>">
                                            Dress Shirt
                                        </a>
                                    </span>
                            </li>
                            <li>
                                <a href="<?php echo URL::to('fabric');?>">
                                    <img src="<?php echo URL::to('resources/assets/images/95157.png');?>"
                                         alt="#"/>
                                </a>
                                <span>
                                    	<a href="<?php echo URL::to('fabric');?>">
                                            Casual Shirt
                                        </a>
                                    </span>
                            </li>
                            <li>
                                <a href="<?php echo URL::to('fabric?filter=white');?>">
                                    <img src="<?php echo URL::to('resources/assets/images/Tuxedo.jpg');?>"
                                         alt="#"/>
                                </a>
                                <span>
                                    	<a href="<?php echo URL::to('fabric?filter=white');?>">
                                            Tuxedo Shirt
                                        </a>
                                    </span>
                            </li>
                            <li>
                                <a href="<?php echo URL::to('gift-card');?>">
                                    <img src="<?php echo URL::to('public/assets/client/images/gift.jpg');?>"
                                         alt="#"/>
                                </a>
                                <span>
                                    	<a href="<?php echo URL::to('/');?>">
                                            Gift Certificate
                                        </a>
                                    </span>
                            </li>
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

                        <p>
                            With our money back guarantee we ensure that you will never again regret your purchase of a
                            shirt.
                        </p>
                    </div>

                    <div class="testimonial_section">
                        <ul class="testimonial_slider">
                            <?php
                            if(count($reviews) > 0) {
                            foreach ($reviews as $key => $review) {
                            if($key % 2 == 0) {
                            ?>
                            <li class="clearfix">
                                <?php } ?>
                                <div class="people_say">
                                    <p><?=$review->Review;?></p>

                                    <div class="testimonial_img clearfix ">
                                        <a href="#">
                                            <img src="<?php echo URL::to('resources/assets/userimages/' . $review->UserImg); ?>"
                                                 alt="#"/>
                                        </a>
                                        <label>
                                            - <?=$review->Name;?></label>
                                    </div>
                                </div>

                                <?php if($key % 2 != 0) { ?>
                            </li>
                            <?php } ?>
                            <?php } } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Wrapper -->
@endsection