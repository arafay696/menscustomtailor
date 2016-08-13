@extends('client.default')
@section('content')
    <div class="container">

        <div class="fabric_banner">
            <div class="auto_content">
                <div class="fabric_bannerDtail">
                    <h1>Shirts</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquet mi <br> sit amet venenatis iaculis</p>
                </div>
            </div>
        </div>

        <div class="cart_container fabric_cont">
            <div class="auto_content">
                <div class="cart_pageDtail">

                    <div class="our_woRks clearfix" >

                        <div class="catigLeft_nav_out clearfix">
                            <div class="colours_pattern clearfix">
                                <div class="colours_pickers clearfix">
                                    <label>ALL COLORS</label>
                                    <ul>
                                        <li><span style="background:#000;">&nbsp;</span></li>
                                        <li><span style="background:#444b5f;">&nbsp;</span></li>
                                        <li><span style="background:#989ca2;">&nbsp;</span></li>
                                        <li><span style="background:#e86830;">&nbsp;</span></li>
                                        <li><span style="background:#f0086c;">&nbsp;</span></li>
                                        <li><span style="background:#f5f5dc;">&nbsp;</span></li>
                                        <li><span style="background:#eee966;">&nbsp;</span></li>
                                        <li><span style="background:#8930e8;">&nbsp;</span></li>
                                        <li><span style="background:#a9474c;">&nbsp;</span></li>
                                        <li><span style="background:#8ea097;">&nbsp;</span></li>
                                    </ul>
                                </div>

                                <div class="pattern_price clearfix">
                                    <div class="pattern_dropdown">
                                        <div class="customselect">
                                            <span>Pattern</span>
                                            <select>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="pattern_dropdown priceDrop">
                                        <div class="customselect">
                                            <span>price</span>
                                            <select>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="catigLeft_nav_inn filter-button-group button-group js-radio-button-group clearfix">
                                <ul>
                                    <li><button class="button is-checked" data-filter="*">ALL</button></li>
                                    <li><button class="button" data-filter=".metal">DRESS</button></li>
                                    <li><button class="button" data-filter=".transition">PREMIUM</button></li>
                                    <li><button class="button" data-filter=".alkali">TUXEDO</button></li>
                                </ul>
                            </div>
                        </div>


                        <form name="form" method="post" action="<?php echo URL::to('fabric/customize/new');?>">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="popular_choices_list some_change clearfix">
                            <ul class="grid">
                                <?php foreach($products as $key => $product) {
                                $type = array('metal', 'transition', 'alkali');
                                $v = $type[$key];
                                ?>
                                    <li class="element-item transition <?=$v;?>" data-category="<?=$v;?>">
                                        <a href="<?php echo URL::to('fabric/' . $product->ID . '');?>">
                                            <img src="<?php echo URL::to('resources/assets/images/' . $product->ImgName . '');?>"
                                                 alt="#"/>
                                        <img src="<?php echo URL::to('public/assets/client/images/fabric_zoomImg.png');?>"
                                             alt="#" class="zoom_pic"/>
                                        <img src="<?php echo URL::to('public/assets/client/images/new_img.png');?>" alt="#" class="new_icon" />
                                    </a>
                                    <span>
                                    	<b>premium</b>
                                        <a href="#"><?=$product->Name;?></a>

                                    </span>
                                    <div class="check_quentity clearfix">
                                        <div class="servicesTerm">
                                            <label><input type="checkbox" name="chooseFab[]" value="<?=$product->ID;?>"></label>
                                        </div>

                                        <div class="customselect">
                                            <span>Qty</span>
                                            <select>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <i>$<?=$product->Price;?></i>
                                    </div>
                                </li>
                                    <?php } ?>
                            </ul>

                        </div>
                            <div class="fixed_bottom">
                                <button tyle="submit">next</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>


@endsection