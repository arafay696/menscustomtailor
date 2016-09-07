@extends('client.default')
@section('content')
    <div class="container">

        <div class="fabric_banner">
            <div class="auto_content">
                <div class="fabric_bannerDtail">
                    <h1>Choose your shirts</h1>
                    <p>All the fabrics you'll ever need to look your best</p>
                </div>
            </div>
        </div>

        <div class="cart_container fabric_cont">
            <div class="auto_content">
                <div class="cart_pageDtail">

                    <div class="our_woRks clearfix">

                        <div class="catigLeft_nav_out clearfix">
                            <div class="colours_pattern clearfix">
                                <div class="colours_pickers clearfix">
                                    <label>ALL COLORS</label>
                                    <ul>
                                        <li class="colorFilter tooltip">
                                            <span style="background:#000;">&nbsp;</span>
                                            <i class="fa fa-check"></i>
                                            <span class="tooltiptext">Black</span>
                                        </li>
                                        <li class="colorFilter tooltip">
                                            <span style="background:#444b5f;">&nbsp;</span>
                                            <i class="fa fa-check"></i>
                                            <span class="tooltiptext">Blue</span>
                                        </li>
                                        <li class="colorFilter tooltip">
                                            <span style="background:#989ca2;">&nbsp;</span>
                                            <i class="fa fa-check"></i>
                                            <span class="tooltiptext">Gray</span>
                                        </li>
                                        <li class="colorFilter tooltip">
                                            <span style="background:#e86830;">&nbsp;</span>
                                            <i class="fa fa-check"></i>
                                            <span class="tooltiptext">Orange</span>
                                        </li>
                                        <li class="colorFilter tooltip">
                                            <span style="background:#f0086c;">&nbsp;</span>
                                            <i class="fa fa-check"></i>
                                            <span class="tooltiptext">Pink</span>
                                        </li>
                                        <li class="colorFilter tooltip">
                                            <span style="background:#f5f5dc;">&nbsp;</span>
                                            <i class="fa fa-check"></i>
                                            <span class="tooltiptext">White</span>
                                        </li>
                                        <li class="colorFilter tooltip">
                                            <span style="background:#eee966;">&nbsp;</span>
                                            <i class="fa fa-check"></i>
                                            <span class="tooltiptext">Yellow</span>
                                        </li>
                                        <li class="colorFilter tooltip">
                                            <span style="background:#8930e8;">&nbsp;</span>
                                            <i class="fa fa-check"></i>
                                            <span class="tooltiptext">Purple</span>
                                        </li>
                                        <li class="colorFilter tooltip">
                                            <span style="background:#a9474c;">&nbsp;</span>
                                            <i class="fa fa-check"></i>
                                            <span class="tooltiptext">Red</span>
                                        </li>
                                        <li class="colorFilter tooltip">
                                            <span style="background:#8ea097;">&nbsp;</span>
                                            <i class="fa fa-check"></i>
                                            <span class="tooltiptext">Green</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="pattern_price clearfix">
                                    <div class="pattern_dropdown">
                                        <div class="customselect">
                                            <span>Pattern</span>
                                            <select id="filterPattern">
                                                <option value="All">All Pattern</option>
                                                <option value="Solids">Solids</option>
                                                <option value="Checks">Checks</option>
                                                <option value="Stripes">Stripes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="pattern_dropdown priceDrop">
                                        <div class="customselect">
                                            <span>Price</span>
                                            <select class="customselectPriceSort" id="sortByPrice">
                                                <option value="Default">Default</option>
                                                <option value="LH">Low to High</option>
                                                <option value="HL">High to Low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="catigLeft_nav_inn filter-button-group button-group js-radio-button-group clearfix">
                                <ul>
                                    <li>
                                        <button class="button is-checked" data-filter="*">ALL</button>
                                    </li>
                                    <li class="hide">
                                        <button class="button" data-filter=".metal">DRESS</button>
                                    </li>
                                    <li class="hide">
                                        <button class="button" data-filter=".transition">PREMIUM</button>
                                    </li>
                                    <li class="hide">
                                        <button class="button" data-filter=".alkali">TUXEDO</button>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <form name="form" method="post" action="<?php echo URL::to('fabric/customize/new');?>">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="popular_choices_list some_change clearfix">
                                <ul class="productGallery grid1">
                                    <?php
                                    $uniqProduct = array();
                                    ?>
                                    <?php foreach($products as $key => $product) {
                                    $type = array('metal', 'transition', 'alkali');
                                    $key = array_rand($type);
                                    $v = $type[$key];

                                    if (in_array($product->ID, $uniqProduct)) {
                                        continue;
                                    }

                                    $classByCat = (array_key_exists($product->ID, $patternByID)) ? $patternByID[$product->ID] : '';
                                    array_push($uniqProduct, $product->ID);
                                    $colors = "";
                                    if (array_key_exists($product->ID, $productColor)) {
                                        $colors = implode(",", $productColor[$product->ID]);
                                    }
                                    ?>
                                    <li class="<?=$classByCat;?> element-item transition <?=$v;?>"
                                        data-percentage="<?=$product->Price;?>"
                                        data-color="<?= $colors; ?>" data-category="<?=$v;?>">
                                        <a class="selectFabric" href="javascript:void(0);">
                                            <img src="<?php echo URL::to('resources/assets/images/' . $product->ImgName . '');?>"
                                                 alt="#"/>
                                            <img src="<?php echo URL::to('public/assets/client/images/fabric_zoomImg.png');?>"
                                                 alt="#" class="zoom_pic"/>
                                            <img src="<?php echo URL::to('public/assets/client/images/new_img.png');?>"
                                                 alt="#" class="new_icon"/>
                                        </a>
                                        <span>
                                    	<b>premium</b>
                                        <a href="#"><?=$product->Name;?></a>

                                    </span>
                                        <div class="check_quentity clearfix">
                                            <div class="servicesTerm">
                                                <label>
                                                    <input class="chkFab" type="checkbox" name="chooseFab[]"
                                                           value="<?=$product->ID;?>">
                                                </label>
                                            </div>

                                            <div class="customselect">
                                                <span>1</span>
                                                <select name="Qty_<?=$product->ID;?>">
                                                    <?php for($i = 1;$i <= 12;$i++){ ?>
                                                    <?php if($i == 1){ ?>
                                                    <option selected="selected"><?=$i;?></option>
                                                    <?php }else {  ?>
                                                    <option><?=$i;?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                            <i>$<?=$product->Price;?></i>
                                        </div>
                                    </li>
                                    <?php $classByCat = ''; } ?>
                                </ul>

                            </div>
                            <div class="fixed_bottom">
                                <button class="nextBtnCustomize disableNextToCustomize" tyle="submit">next</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>


@endsection