@extends('client.default')
@section('content')
    <!-- Page Wrapper -->
    <?php

    $slectedItems = '<div class="swathces_images clearfix"><ul>';
    foreach ($cartData as $item) {
        $class = ($productID == $item['productID']) ? 'active_swatch' : '';
        $slectedItems .= '<li style="display:block;"><a href="' . URL::to('fabric/' . $item['productID'] . '') . '"><span class="' . $class . '"><img alt="#" src="' . URL::to('resources/assets/images/' . $item['ProductImage']) . '"></span></a></li>';
    }
    $slectedItems .= '</ul></div>';
    ?>

    <div class="container">
        <input type="hidden" id="openModalCondi"
               value="<?php echo (is_array(Session::get('currentSize')) && count(Session::get('currentSize')) > 0) ? 'open' : 'closed'; ?>">
        <input type="hidden" id="setCanChangeSize" value="0">
        <div class="cart_container back_background">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head clearfix customize_setting">
                        <h3>CUSTOMIZE Your Shirts <i class="fa fa-spinner fa-spin savingCustomize"
                                                     style="display:none;"></i></h3>
                        <div class="actions">
                            <a class="nextSection" href="javascript:void(0);" style="margin-right: 2px">Next</a>
                            <a class="previousSection" href="javascript:void(0);" style="">Previous</a>
                        </div>
                    </div>
                    <div class="customize_page">
                        <ul class="customize_slider">
                            <li class="active-customize">
                                <h2 class="stepHeading">Choose Shirt Type
                                    <a class="makeAllSame makeAllSameInactive" href="javascript:void(0);" style="">
                                        <i class="fa fa-times"></i> Make All Same</a>
                                </h2>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="productID" value="<?=$productID;?>"/>
                                    <input id="makeSame" type="hidden" name="makeSame" value="no"/>
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label class="select"><input type="radio" name="shirtType"
                                                                                 value="Dress" checked="checked">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Dress</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="shirtType" value="Casual">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Casual</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="shirtType" value="Tuxedo">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Tuxedo</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="clear: both;">
                                                <h2 class="stepHeading">Choose Your Front Style</h2>
                                                <div class="frontDressCasual">
                                                    <div class="customization_item">
                                                        <div class="artistProducer clearfix">
                                                            <label class="select"><input type="radio" name="frontStyle"
                                                                                         value="Tab Front"
                                                                                         checked="checked">&nbsp;
                                                            </label>
                                                        </div>
                                                        <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                             alt="#"/>

                                                        <div class="customization_dropdown">
                                                            <div class="customselect_customize">
                                                                <span>Tab Front</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="customization_item">
                                                        <div class="artistProducer clearfix">
                                                            <label><input type="radio" name="frontStyle"
                                                                          value="Fly Front">&nbsp;
                                                            </label>
                                                        </div>
                                                        <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                             alt="#"/>

                                                        <div class="customization_dropdown">
                                                            <div class="customselect_customize">
                                                                <span>Fly Front</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="customization_item">
                                                        <div class="artistProducer clearfix">
                                                            <label><input type="radio" name="frontStyle"
                                                                          value="Sport Front">&nbsp;
                                                            </label>
                                                        </div>
                                                        <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                             alt="#"/>

                                                        <div class="customization_dropdown">
                                                            <div class="customselect_customize">
                                                                <span>Sport Front</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="frontTuxedo hide">
                                                    <div class="customization_item">
                                                        <div class="artistProducer clearfix">
                                                            <label class="select"><input type="radio" name="frontStyle"
                                                                                         value="Fly Front"
                                                                                         checked="checked">&nbsp;
                                                            </label>
                                                        </div>
                                                        <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                             alt="#"/>

                                                        <div class="customization_dropdown">
                                                            <div class="customselect_customize">
                                                                <span>Fly Front</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="customization_item">
                                                        <div class="artistProducer clearfix">
                                                            <label><input type="radio" name="frontStyle"
                                                                          value="1/4 pleat with stud holes">&nbsp;
                                                            </label>
                                                        </div>
                                                        <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                             alt="#"/>

                                                        <div class="customization_dropdown">
                                                            <div class="customselect_customize">
                                                                <span>1/4" pleat with stud holes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="customization_item">
                                                        <div class="artistProducer clearfix">
                                                            <label><input type="radio" name="frontStyle"
                                                                          value="1/2 pleat with stud holes">&nbsp;
                                                            </label>
                                                        </div>
                                                        <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                             alt="#"/>

                                                        <div class="customization_dropdown">
                                                            <div class="customselect_customize">
                                                                <span>1/2" pleat with stud holes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="customization_item">
                                                        <div class="artistProducer clearfix">
                                                            <label><input type="radio" name="frontStyle"
                                                                          value="Plain Front">&nbsp;
                                                            </label>
                                                        </div>
                                                        <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                             alt="#"/>

                                                        <div class="customization_dropdown">
                                                            <div class="customselect_customize">
                                                                <span>Plain Front</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize_rightSection">
                                            <?=$slectedItems;?>
                                            <div class="customize_rightSection_content clearfix">
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"
                                                     alt="#"/>

                                                <p>The Medium Collar is the most
                                                    popular and versatile option as it
                                                    complements most face shapes
                                                    and tie-knots. Spread is also
                                                    well-liked and flattering on most
                                                    people. View the gallery below
                                                    for recommendations on which
                                                    of our fashionable collars will
                                                    best compliment your face
                                                    shape and preference of
                                                    tie-knot.</p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <h2 class="stepHeading">Choose Collar Type</h2>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="productID" value="<?=$productID;?>"/>
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label class="select"><input type="radio" name="collarType"
                                                                                 value="Traditional Point"
                                                                                 checked="checked">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Traditional Point</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="collarType" value="Button Down">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Button Down</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="collarType" value="Narrow Point">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Narrow Point</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="collarType" value="Medium Spread">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Medium Spread</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="collarType" value="Wide Spread">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Wide Spread</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="collarType"
                                                                  value="Hidden Button Down">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Hidden Button Down</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="collarType" value="Tab Collar">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Tab Collar</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="collarType" value="Curve Point">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Curve Point</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="collarType"
                                                                  value="Traditional Band Collar">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Traditional Band Collar/span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize_rightSection">
                                            <?=$slectedItems;?>
                                            <div class="customize_rightSection_content clearfix">
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"
                                                     alt="#"/>

                                                <p>The Medium Collar is the most
                                                    popular and versatile option as it
                                                    complements most face shapes
                                                    and tie-knots. Spread is also
                                                    well-liked and flattering on most
                                                    people. View the gallery below
                                                    for recommendations on which
                                                    of our fashionable collars will
                                                    best compliment your face
                                                    shape and preference of
                                                    tie-knot.</p>
                                            </div>

                                            <div class="neck_dtail canChangeSize">
                                                <label>Neck Detail:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <input name="NeckSize" type="text"
                                                       value="<?php echo (isset(Session::get('currentSize')['NeckSize']) && Session::get('currentSize')['NeckSize'] != "") ? Session::get('currentSize')['NeckSize'] : ""; ?>"
                                                       placeholder="Neck size in/ cm"/>
                                                <select style="margin-top: 4px;" name="NeckHeight">
                                                    <option>Select Neck Height</option>
                                                    <option value="Short" <?php echo (isset(Session::get('currentSize')['NeckHeight']) && Session::get('currentSize')['NeckHeight'] == "Short") ? "selected='selected'" : "" ?>>
                                                        Short
                                                    </option>
                                                    <option value="Average" <?php echo (isset(Session::get('currentSize')['NeckHeight']) && Session::get('currentSize')['NeckHeight'] == "Average") ? "selected='selected'" : "" ?>>
                                                        Average
                                                    </option>
                                                    <option value="Long" <?php echo (isset(Session::get('currentSize')['NeckHeight']) && Session::get('currentSize')['NeckHeight'] == "Long") ? "selected='selected'" : "" ?>>
                                                        Long
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <h2 class="stepHeading">Choose Cuff Style</h2>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="productID" value="<?=$productID;?>"/>
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label class="select"><input type="radio" name="cuffStyle"
                                                                                 value="One Button Cuff"
                                                                                 checked="checked">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/two_button_barrel.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>One Button Cuff</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="cuffStyle"
                                                                  value="Round French Cuff">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/two_button_barrel.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Round French Cuff</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="cuffStyle"
                                                                  value="Square French Cuff">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/two_button_barrel.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Square French Cuff</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="cuffStyle"
                                                                  value="Convertible Cuff">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/two_button_barrel.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Convertible Cuff</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="cuffStyle"
                                                                  value="Angled One Button Cuff">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/two_button_barrel.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Angled One Button Cuff</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="cuffStyle" value="Two Button Cuff">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/two_button_barrel.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Two Button Cuff</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="cuffStyle"
                                                                  value="Angled French Cuff">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/two_button_barrel.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Angled French Cuff</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize_rightSection">
                                            <?=$slectedItems;?>
                                            <div class="customize_rightSection_content clearfix">
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"
                                                     alt="#"/>

                                                <p>The Medium Collar is the most
                                                    popular and versatile option as it
                                                    complements most face shapes
                                                    and tie-knots. Spread is also
                                                    well-liked and flattering on most
                                                    people. View the gallery below
                                                    for recommendations on which
                                                    of our fashionable collars will
                                                    best compliment your face
                                                    shape and preference of
                                                    tie-knot.</p>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <h2 class="stepHeading">Choose Sleeve Style</h2>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden"
                                                                                                        name="productID"
                                                                                                        value="<?=$productID;?>"/>
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label class="select">
                                                        <input type="radio" name="sleeveStyle" value="Full Sleeve"
                                                               checked="checked">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Full Sleeve</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label>
                                                        <input type="radio" name="sleeveStyle"
                                                               value="Plain Short Sleeve">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Plain Short Sleeve</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize_rightSection">
                                            <?=$slectedItems;?>
                                            <div class="customize_rightSection_content clearfix">
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"
                                                     alt="#"/>

                                                <p>The Medium Collar is the most
                                                    popular and versatile option as it
                                                    complements most face shapes
                                                    and tie-knots. Spread is also
                                                    well-liked and flattering on most
                                                    people. View the gallery below
                                                    for recommendations on which
                                                    of our fashionable collars will
                                                    best compliment your face
                                                    shape and preference of
                                                    tie-knot.</p>
                                            </div>

                                            <div class="neck_dtail canChangeSize">
                                                <label>Neck Detail:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <select title="Sleeve Length" name="sleeveLength">
                                                    <option value="">Select Sleeve Length</option>
                                                    <option value="24" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "24") ? "selected='selected'" : "" ?>>
                                                        24
                                                    </option>
                                                    <option value="24 1/4" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "24 1/4") ? "selected='selected'" : "" ?>>
                                                        24 1/4
                                                    </option>
                                                    <option value="24 1/2" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "24 1/2") ? "selected='selected'" : "" ?>>
                                                        24 1/2
                                                    </option>
                                                    <option value="24 3/4" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "24 3/4") ? "selected='selected'" : "" ?>>
                                                        24 3/4
                                                    </option>
                                                    <option value="25" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "25") ? "selected='selected'" : "" ?>>
                                                        25
                                                    </option>
                                                    <option value="25 1/4" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "25 1/4") ? "selected='selected'" : "" ?>>
                                                        25 1/4
                                                    </option>
                                                    <option value="25 1/2" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "25 1/2") ? "selected='selected'" : "" ?>>
                                                        25 1/2
                                                    </option>
                                                    <option value="25 3/4" <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "25 3/4") ? "selected='selected'" : "" ?>>
                                                        25 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "26") ? "selected='selected'" : "" ?> value="26">
                                                        26
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "26 1/4") ? "selected='selected'" : "" ?> value="26 1/4">
                                                        26 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "26 1/2") ? "selected='selected'" : "" ?> value="26 1/2">
                                                        26 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "26 3/4") ? "selected='selected'" : "" ?> value="26 3/4">
                                                        26 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "27") ? "selected='selected'" : "" ?> value="27">
                                                        27
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "27 1/4") ? "selected='selected'" : "" ?> value="27 1/4">
                                                        27 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "27 1/2") ? "selected='selected'" : "" ?> value="27 1/2">
                                                        27 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "27 3/4") ? "selected='selected'" : "" ?> value="27 3/4">
                                                        27 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "28") ? "selected='selected'" : "" ?> value="28">
                                                        28
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "28 1/4") ? "selected='selected'" : "" ?> value="28 1/4">
                                                        28 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "28 1/2") ? "selected='selected'" : "" ?> value="28 1/2">
                                                        28 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "28 3/4") ? "selected='selected'" : "" ?> value="28 3/4">
                                                        28 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "29") ? "selected='selected'" : "" ?> value="29">
                                                        29
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "29 1/4") ? "selected='selected'" : "" ?> value="29 1/4">
                                                        29 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "29 1/2") ? "selected='selected'" : "" ?> value="29 1/2">
                                                        29 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "29 3/4") ? "selected='selected'" : "" ?> value="29 3/4">
                                                        29 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "30") ? "selected='selected'" : "" ?> value="30">
                                                        30
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                                        30 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                                        30 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                                        30 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "31") ? "selected='selected'" : "" ?> value="31">
                                                        31
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                                        31 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                                        31 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                                        31 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "32") ? "selected='selected'" : "" ?> value="32">
                                                        32
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                                        32 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                                        32 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                                        32 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "33") ? "selected='selected'" : "" ?> value="33">
                                                        33
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                                        33 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                                        33 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                                        33 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "34") ? "selected='selected'" : "" ?> value="34">
                                                        34
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                                        34 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                                        34 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                                        34 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "35") ? "selected='selected'" : "" ?> value="35">
                                                        35
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                                        35 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                                        35 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "36") ? "selected='selected'" : "" ?> value="35 3/4">
                                                        35 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "36") ? "selected='selected'" : "" ?> value="36">
                                                        36
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                                        36 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                                        36 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                                        36 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "37") ? "selected='selected'" : "" ?> value="37">
                                                        37
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                                        37 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                                        37 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                                        37 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "38") ? "selected='selected'" : "" ?> value="38">
                                                        38
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                                        38 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                                        38 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                                        38 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "39") ? "selected='selected'" : "" ?> value="39">
                                                        39
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                                        39 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                                        39 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                                        39 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "40") ? "selected='selected'" : "" ?> value="40">
                                                        40
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                                        40 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                                        40 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                                        40 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "41") ? "selected='selected'" : "" ?> value="41">
                                                        41
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                                        41 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                                        41 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                                        41 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "42") ? "selected='selected'" : "" ?> value="42">
                                                        42
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                                        42 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                                        42 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                                        42 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "43") ? "selected='selected'" : "" ?> value="43">
                                                        43
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                                        43 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                                        43 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                                        43 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "44") ? "selected='selected'" : "" ?> value="44">
                                                        44
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                                        44 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                                        44 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                                        44 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "45") ? "selected='selected'" : "" ?> value="45">
                                                        45
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                                        45 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                                        45 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['LeftSleeve']) && Session::get('currentSize')['LeftSleeve'] == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                                        45 3/4
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <h2 class="stepHeading">Choose Pocket Style</h2>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden"
                                                                                                        name="productID"
                                                                                                        value="<?=$productID;?>"/>
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label class="select">
                                                        <input type="radio" name="pocketStyle" value="Regular Pocket"
                                                               checked="checked">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Regular Pocket</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="pocketStyle"
                                                                  value="Round Corned Pocket">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Round Corned Pocket</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label>
                                                        <input type="radio" name="pocketStyle" value="No Pocket">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>No Pocket</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="customize_rightSection">
                                            <?=$slectedItems;?>
                                            <div class="customize_rightSection_content clearfix">
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"
                                                     alt="#"/>

                                                <p>The Medium Collar is the most
                                                    popular and versatile option as it
                                                    complements most face shapes
                                                    and tie-knots. Spread is also
                                                    well-liked and flattering on most
                                                    people. View the gallery below
                                                    for recommendations on which
                                                    of our fashionable collars will
                                                    best compliment your face
                                                    shape and preference of
                                                    tie-knot.</p>
                                            </div>

                                            <div class="neck_dtail selectPocketNo">
                                                <label>No. Of Pocket:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <select size="1" name="noOfPocket">
                                                    <?php foreach ($NoOfPockets as $key => $np) { ?>
                                                    <option value="<?=$key;?>"><?=$np;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <h2 class="stepHeading">Choose Monogram Style</h2>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden"
                                                                                                        name="productID"
                                                                                                        value="<?=$productID;?>"/>
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label class="select">
                                                        <input type="radio" name="monogramStyle" value="None"
                                                               checked="checked">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>None</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="monogramStyle"
                                                                  value="Block Letter" checked="checked">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Block Letter</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="monogramStyle" value="Script">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Script</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize_rightSection">
                                            <?=$slectedItems;?>
                                            <div class="customize_rightSection_content clearfix">
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"
                                                     alt="#"/>

                                                <p>The Medium Collar is the most
                                                    popular and versatile option as it
                                                    complements most face shapes
                                                    and tie-knots. Spread is also
                                                    well-liked and flattering on most
                                                    people. View the gallery below
                                                    for recommendations on which
                                                    of our fashionable collars will
                                                    best compliment your face
                                                    shape and preference of
                                                    tie-knot.</p>
                                            </div>

                                            <div class="neck_dtail monogramDescription">
                                                <label>Monogram Detail:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <input name="monogramIntials" type="text" maxlength="3" value=""
                                                       placeholder="Monogram Intials"/>
                                                <select style="margin-top: 4px;" name="monogramColor">
                                                    <option selected="" value="">Select Monogram Color</option>
                                                    <option>Black</option>
                                                    <option>Brown</option>
                                                    <option>White</option>
                                                </select>
                                                <select style="margin-top: 4px;" name="monogramLocation">
                                                    <option selected="" value="">Select Monogram Location</option>
                                                    <option>Cuff</option>
                                                    <option>Chest</option>
                                                    <option>Pocket</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <h2 class="stepHeading">Size Detail</h2>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden"
                                                                                                        name="productID"
                                                                                                        value="<?=$productID;?>"/>
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <img src="<?php echo URL::to('public/assets/client/images/slider_img.png'); ?>"
                                                 alt="#"/>
                                        </div>


                                        <div class="customize_rightSection">
                                            <?=$slectedItems;?>
                                            <div class="customize_rightSection_content clearfix">
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"
                                                     alt="#"/>

                                                <p>The Medium Collar is the most
                                                    popular and versatile option as it
                                                    complements most face shapes
                                                    and tie-knots. Spread is also
                                                    well-liked and flattering on most
                                                    people. View the gallery below
                                                    for recommendations on which
                                                    of our fashionable collars will
                                                    best compliment your face
                                                    shape and preference of
                                                    tie-knot.</p>
                                            </div>

                                            <div class="neck_dtail canChangeSize">
                                                <label>Neck:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <select name="Chest">
                                                    <option>Select Chest Size</option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "30") ? "selected='selected'" : "" ?> value="30">
                                                        30
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                                        30 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                                        30 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                                        30 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "31") ? "selected='selected'" : "" ?> value="31">
                                                        31
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                                        31 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                                        31 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                                        31 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "32") ? "selected='selected'" : "" ?> value="32">
                                                        32
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                                        32 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                                        32 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                                        32 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "33") ? "selected='selected'" : "" ?> value="33">
                                                        33
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                                        33 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                                        33 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                                        33 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "34") ? "selected='selected'" : "" ?> value="34">
                                                        34
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                                        34 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                                        34 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                                        34 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "35") ? "selected='selected'" : "" ?> value="35">
                                                        35
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                                        35 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                                        35 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "35 3/4") ? "selected='selected'" : "" ?> value="35 3/4">
                                                        35 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "36") ? "selected='selected'" : "" ?> value="36">
                                                        36
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                                        36 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                                        36 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                                        36 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "37") ? "selected='selected'" : "" ?> value="37">
                                                        37
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                                        37 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                                        37 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                                        37 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "38") ? "selected='selected'" : "" ?> value="38">
                                                        38
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                                        38 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                                        38 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                                        38 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "39") ? "selected='selected'" : "" ?> value="39">
                                                        39
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                                        39 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                                        39 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                                        39 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "40") ? "selected='selected'" : "" ?> value="40">
                                                        40
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                                        40 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                                        40 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                                        40 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "41") ? "selected='selected'" : "" ?> value="41">
                                                        41
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                                        41 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                                        41 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                                        41 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "42") ? "selected='selected'" : "" ?> value="42">
                                                        42
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                                        42 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                                        42 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                                        42 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "43") ? "selected='selected'" : "" ?> value="43">
                                                        43
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                                        43 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                                        43 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                                        43 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "44") ? "selected='selected'" : "" ?> value="44">
                                                        44
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                                        44 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                                        44 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                                        44 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "45") ? "selected='selected'" : "" ?> value="45">
                                                        45
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                                        45 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                                        45 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                                        45 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "46") ? "selected='selected'" : "" ?> value="46">
                                                        46
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "46 1/4") ? "selected='selected'" : "" ?> value="46 1/4">
                                                        46 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "46 1/2") ? "selected='selected'" : "" ?> value="46 1/2">
                                                        46 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "46 3/4") ? "selected='selected'" : "" ?> value="46 3/4">
                                                        46 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "47") ? "selected='selected'" : "" ?> value="47">
                                                        47
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "47 1/4") ? "selected='selected'" : "" ?> value="47 1/4">
                                                        47 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "47 1/2") ? "selected='selected'" : "" ?> value="47 1/2">
                                                        47 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "47 3/4") ? "selected='selected'" : "" ?> value="47 3/4">
                                                        47 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "48") ? "selected='selected'" : "" ?> value="48">
                                                        48
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "48 1/4") ? "selected='selected'" : "" ?> value="48 1/4">
                                                        48 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "48 1/2") ? "selected='selected'" : "" ?> value="48 1/2">
                                                        48 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "48 3/4") ? "selected='selected'" : "" ?> value="48 3/4">
                                                        48 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "49") ? "selected='selected'" : "" ?> value="49">
                                                        49
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "49 1/4") ? "selected='selected'" : "" ?> value="49 1/4">
                                                        49 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "49 1/2") ? "selected='selected'" : "" ?> value="49 1/2">
                                                        49 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "49 3/4") ? "selected='selected'" : "" ?> value="49 3/4">
                                                        49 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "50") ? "selected='selected'" : "" ?> value="50">
                                                        50
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "50 1/4") ? "selected='selected'" : "" ?> value="50 1/4">
                                                        50 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "50 1/2") ? "selected='selected'" : "" ?> value="50 1/2">
                                                        50 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "50 3/4") ? "selected='selected'" : "" ?> value="50 3/4">
                                                        50 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "51") ? "selected='selected'" : "" ?> value="51">
                                                        51
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "51 1/4") ? "selected='selected'" : "" ?> value="51 1/4">
                                                        51 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "51 1/2") ? "selected='selected'" : "" ?> value="51 1/2">
                                                        51 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "51 3/4") ? "selected='selected'" : "" ?> value="51 3/4">
                                                        51 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "52") ? "selected='selected'" : "" ?> value="52">
                                                        52
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "52 1/4") ? "selected='selected'" : "" ?> value="52 1/4">
                                                        52 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "52 1/2") ? "selected='selected'" : "" ?> value="52 1/2">
                                                        52 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "52 3/4") ? "selected='selected'" : "" ?> value="52 3/4">
                                                        52 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "53") ? "selected='selected'" : "" ?> value="53">
                                                        53
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "53 1/4") ? "selected='selected'" : "" ?> value="53 1/4">
                                                        53 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "53 1/2") ? "selected='selected'" : "" ?> value="53 1/2">
                                                        53 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "53 3/4") ? "selected='selected'" : "" ?> value="53 3/4">
                                                        53 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "54") ? "selected='selected'" : "" ?> value="54">
                                                        54
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "54 1/4") ? "selected='selected'" : "" ?> value="54 1/4">
                                                        54 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "54 1/2") ? "selected='selected'" : "" ?> value="54 1/2">
                                                        54 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "54 3/4") ? "selected='selected'" : "" ?> value="54 3/4">
                                                        54 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "55") ? "selected='selected'" : "" ?> value="55">
                                                        55
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "55 1/4") ? "selected='selected'" : "" ?> value="55 1/4">
                                                        55 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "55 1/2") ? "selected='selected'" : "" ?> value="55 1/2">
                                                        55 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "55 3/4") ? "selected='selected'" : "" ?> value="55 3/4">
                                                        55 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "56") ? "selected='selected'" : "" ?> value="56">
                                                        56
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "56 1/4") ? "selected='selected'" : "" ?> value="56 1/4">
                                                        56 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "56 1/2") ? "selected='selected'" : "" ?> value="56 1/2">
                                                        56 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "56 3/4") ? "selected='selected'" : "" ?> value="56 3/4">
                                                        56 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "57") ? "selected='selected'" : "" ?> value="57">
                                                        57
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "57 1/4") ? "selected='selected'" : "" ?> value="57 1/4">
                                                        57 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "57 1/2") ? "selected='selected'" : "" ?> value="57 1/2">
                                                        57 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "57 3/4") ? "selected='selected'" : "" ?> value="57 3/4">
                                                        57 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "58") ? "selected='selected'" : "" ?> value="58">
                                                        58
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "58 1/4") ? "selected='selected'" : "" ?> value="58 1/4">
                                                        58 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "58 1/2") ? "selected='selected'" : "" ?> value="58 1/2">
                                                        58 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "58 3/4") ? "selected='selected'" : "" ?> value="58 3/4">
                                                        58 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "59") ? "selected='selected'" : "" ?> value="59">
                                                        59
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "59 1/4") ? "selected='selected'" : "" ?> value="59 1/4">
                                                        59 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "59 1/2") ? "selected='selected'" : "" ?> value="59 1/2">
                                                        59 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "59 3/4") ? "selected='selected'" : "" ?> value="59 3/4">
                                                        59 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "60") ? "selected='selected'" : "" ?> value="60">
                                                        60
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "60 1/4") ? "selected='selected'" : "" ?> value="60 1/4">
                                                        60 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "60 1/2") ? "selected='selected'" : "" ?> value="60 1/2">
                                                        60 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "60 3/4") ? "selected='selected'" : "" ?> value="60 3/4">
                                                        60 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "61") ? "selected='selected'" : "" ?> value="61">
                                                        61
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "61 1/4") ? "selected='selected'" : "" ?> value="61 1/4">
                                                        61 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "61 1/2") ? "selected='selected'" : "" ?> value="61 1/2">
                                                        61 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "61 3/4") ? "selected='selected'" : "" ?> value="61 3/4">
                                                        61 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "62") ? "selected='selected'" : "" ?> value="62">
                                                        62
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "62 1/4") ? "selected='selected'" : "" ?> value="62 1/4">
                                                        62 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "62 1/2") ? "selected='selected'" : "" ?> value="62 1/2">
                                                        62 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "62 3/4") ? "selected='selected'" : "" ?> value="62 3/4">
                                                        62 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "63") ? "selected='selected'" : "" ?> value="63">
                                                        63
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "63 1/4") ? "selected='selected'" : "" ?> value="63 1/4">
                                                        63 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "63 1/2") ? "selected='selected'" : "" ?> value="63 1/2">
                                                        63 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "63 3/4") ? "selected='selected'" : "" ?> value="63 3/4">
                                                        63 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "64") ? "selected='selected'" : "" ?> value="64">
                                                        64
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "64 1/4") ? "selected='selected'" : "" ?> value="64 1/4">
                                                        64 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "64 1/2") ? "selected='selected'" : "" ?> value="64 1/2">
                                                        64 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "64 3/4") ? "selected='selected'" : "" ?> value="64 3/4">
                                                        64 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "65") ? "selected='selected'" : "" ?> value="65">
                                                        65
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "65 1/4") ? "selected='selected'" : "" ?> value="65 1/4">
                                                        65 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "65 1/2") ? "selected='selected'" : "" ?> value="65 1/2">
                                                        65 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "65 3/4") ? "selected='selected'" : "" ?> value="65 3/4">
                                                        65 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "66") ? "selected='selected'" : "" ?> value="66">
                                                        66
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "66 1/4") ? "selected='selected'" : "" ?> value="66 1/4">
                                                        66 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "66 1/2") ? "selected='selected'" : "" ?> value="66 1/2">
                                                        66 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "66 3/4") ? "selected='selected'" : "" ?> value="66 3/4">
                                                        66 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "67") ? "selected='selected'" : "" ?> value="67">
                                                        67
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "67 1/4") ? "selected='selected'" : "" ?> value="67 1/4">
                                                        67 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "67 1/2") ? "selected='selected'" : "" ?> value="67 1/2">
                                                        67 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "67 3/4") ? "selected='selected'" : "" ?> value="67 3/4">
                                                        67 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "68") ? "selected='selected'" : "" ?> value="68">
                                                        68
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "68 1/4") ? "selected='selected'" : "" ?> value="68 1/4">
                                                        68 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "68 1/2") ? "selected='selected'" : "" ?> value="68 1/2">
                                                        68 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "68 3/4") ? "selected='selected'" : "" ?> value="68 3/4">
                                                        68 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "69") ? "selected='selected'" : "" ?> value="69">
                                                        69
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "69 1/4") ? "selected='selected'" : "" ?> value="69 1/4">
                                                        69 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "69 1/2") ? "selected='selected'" : "" ?> value="69 1/2">
                                                        69 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "69 3/4") ? "selected='selected'" : "" ?> value="69 3/4">
                                                        69 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "70") ? "selected='selected'" : "" ?> value="70">
                                                        70
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "70 1/4") ? "selected='selected'" : "" ?> value="70 1/4">
                                                        70 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "70 1/2") ? "selected='selected'" : "" ?> value="70 1/2">
                                                        70 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "70 3/4") ? "selected='selected'" : "" ?> value="70 3/4">
                                                        70 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "71") ? "selected='selected'" : "" ?> value="71">
                                                        71
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "71 1/4") ? "selected='selected'" : "" ?> value="71 1/4">
                                                        71 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "71 1/2") ? "selected='selected'" : "" ?> value="71 1/2">
                                                        71 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "71 3/4") ? "selected='selected'" : "" ?> value="71 3/4">
                                                        71 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "72") ? "selected='selected'" : "" ?> value="72">
                                                        72
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "72 1/4") ? "selected='selected'" : "" ?> value="72 1/4">
                                                        72 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "72 1/2") ? "selected='selected'" : "" ?> value="72 1/2">
                                                        72 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "72 3/4") ? "selected='selected'" : "" ?> value="72 3/4">
                                                        72 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "73") ? "selected='selected'" : "" ?> value="73">
                                                        73
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "73 1/4") ? "selected='selected'" : "" ?> value="73 1/4">
                                                        73 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "73 1/2") ? "selected='selected'" : "" ?> value="73 1/2">
                                                        73 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "73 3/4") ? "selected='selected'" : "" ?> value="73 3/4">
                                                        73 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "74") ? "selected='selected'" : "" ?> value="74">
                                                        74
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "74 1/4") ? "selected='selected'" : "" ?> value="74 1/4">
                                                        74 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "74 1/2") ? "selected='selected'" : "" ?> value="74 1/2">
                                                        74 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "74 3/4") ? "selected='selected'" : "" ?> value="74 3/4">
                                                        74 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "75") ? "selected='selected'" : "" ?> value="75">
                                                        75
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "75 1/4") ? "selected='selected'" : "" ?> value="75 1/4">
                                                        75 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "75 1/2") ? "selected='selected'" : "" ?> value="75 1/2">
                                                        75 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "75 3/4") ? "selected='selected'" : "" ?> value="75 3/4">
                                                        75 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "76") ? "selected='selected'" : "" ?> value="76">
                                                        76
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "76 1/4") ? "selected='selected'" : "" ?> value="76 1/4">
                                                        76 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "76 1/2") ? "selected='selected'" : "" ?> value="76 1/2">
                                                        76 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Chest']) && Session::get('currentSize')['Chest'] == "76 3/4") ? "selected='selected'" : "" ?> value="76 3/4">
                                                        76 3/4
                                                    </option>
                                                </select>
                                                <select style="margin-top: 4px;" name="ChestDescription">
                                                    <option>Select Chest Description</option>
                                                    <option <?php echo (isset(Session::get('currentSize')['ChestDescription']) && Session::get('currentSize')['ChestDescription'] == "Slender") ? "selected='selected'" : "" ?> value="Slender">
                                                        Slender
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['ChestDescription']) && Session::get('currentSize')['ChestDescription'] == "Regular Build") ? "selected='selected'" : "" ?> value="Regular Build">
                                                        Regular Build
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['ChestDescription']) && Session::get('currentSize')['ChestDescription'] == "Very Muscular") ? "selected='selected'" : "" ?> value="Very Muscular">
                                                        Very Muscular
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['ChestDescription']) && Session::get('currentSize')['ChestDescription'] == "Husky / Hefty") ? "selected='selected'" : "" ?> value="Husky / Hefty">
                                                        Husky / Hefty
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <h2 class="stepHeading">Size Detail</h2>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden"
                                                                                                        name="productID"
                                                                                                        value="<?=$productID;?>"/>
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <img src="<?php echo URL::to('public/assets/client/images/slider_img.png'); ?>"
                                                 alt="#"/>
                                        </div>


                                        <div class="customize_rightSection">
                                            <?=$slectedItems;?>
                                            <div class="customize_rightSection_content clearfix">
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"
                                                     alt="#"/>

                                                <p>The Medium Collar is the most
                                                    popular and versatile option as it
                                                    complements most face shapes
                                                    and tie-knots. Spread is also
                                                    well-liked and flattering on most
                                                    people. View the gallery below
                                                    for recommendations on which
                                                    of our fashionable collars will
                                                    best compliment your face
                                                    shape and preference of
                                                    tie-knot.</p>
                                            </div>

                                            <div class="neck_dtail canChangeSize">
                                                <label>Neck:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <select style="display: inline-block; clear: none; width: 50%; float: left;"
                                                        name="HeightFeet">
                                                    <option selected="">Height Feet</option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "3") ? "selected='selected'" : "" ?> value="3">
                                                        3
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "4") ? "selected='selected'" : "" ?> value="4">
                                                        4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "5") ? "selected='selected'" : "" ?> value="5">
                                                        5
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "6") ? "selected='selected'" : "" ?> value="6">
                                                        6
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "7") ? "selected='selected'" : "" ?> value="7">
                                                        7
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "8") ? "selected='selected'" : "" ?> value="8">
                                                        8
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightFeet']) && Session::get('currentSize')['HeightFeet'] == "9") ? "selected='selected'" : "" ?> value="9">
                                                        9
                                                    </option>
                                                </select>
                                                <select name="HeightInches" size="1"
                                                        style="display: inline-block; clear: none; margin-left: 2px; width: 49% !important;">
                                                    <option value="0" selected="">Height Inches</option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "1") ? "selected='selected'" : "" ?> value="1">
                                                        1
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "2") ? "selected='selected'" : "" ?> value="2">
                                                        2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "3") ? "selected='selected'" : "" ?> value="3">
                                                        3
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "4") ? "selected='selected'" : "" ?> value="4">
                                                        4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "5") ? "selected='selected'" : "" ?> value="5">
                                                        5
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "6") ? "selected='selected'" : "" ?> value="6">
                                                        6
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "7") ? "selected='selected'" : "" ?> value="7">
                                                        7
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "8") ? "selected='selected'" : "" ?> value="8">
                                                        8
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "9") ? "selected='selected'" : "" ?> value="9">
                                                        9
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "10") ? "selected='selected'" : "" ?> value="10">
                                                        10
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['HeightInches']) && Session::get('currentSize')['HeightInches'] == "11") ? "selected='selected'" : "" ?> value="11">
                                                        11
                                                    </option>
                                                </select>
                                                <select style="margin-top: 4px;" title="Weight" size="1" name="Weight">
                                                    <option value="">Select Weight</option>
                                                    <?php
                                                    for($i = 90;$i <= 450;$i++) {
                                                    ?>
                                                    <option <?php echo (isset(Session::get('currentSize')['Weight']) && Session::get('currentSize')['Weight'] == $i) ? "selected='selected'" : "" ?> value="<?=$i;?>">
                                                        <?=$i;?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                                <select style="margin-top: 4px;" title="Waist" size="1" name="Waist">
                                                    <option value="">Select Waist</option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "24") ? "selected='selected'" : "" ?> value="24">
                                                        24
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "24 1/4") ? "selected='selected'" : "" ?> value="24 1/4">
                                                        24 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "24 1/2") ? "selected='selected'" : "" ?> value="24 1/2">
                                                        24 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "24 3/4") ? "selected='selected'" : "" ?> value="24 3/4">
                                                        24 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "25") ? "selected='selected'" : "" ?> value="25">
                                                        25
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "25 1/4") ? "selected='selected'" : "" ?> value="25 1/4">
                                                        25 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "25 1/2") ? "selected='selected'" : "" ?> value="25 1/2">
                                                        25 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "25 3/4") ? "selected='selected'" : "" ?> value="25 3/4">
                                                        25 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "26") ? "selected='selected'" : "" ?> value="26">
                                                        26
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "26 1/3") ? "selected='selected'" : "" ?> value="26 1/4">
                                                        26 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "26 1/2") ? "selected='selected'" : "" ?> value="26 1/2">
                                                        26 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "26 3/4") ? "selected='selected'" : "" ?> value="26 3/4">
                                                        26 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "27") ? "selected='selected'" : "" ?> value="27">
                                                        27
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "27 1/4") ? "selected='selected'" : "" ?> value="27 1/4">
                                                        27 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "27 1/2") ? "selected='selected'" : "" ?> value="27 1/2">
                                                        27 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "27 3/4") ? "selected='selected'" : "" ?> value="27 3/4">
                                                        27 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "28") ? "selected='selected'" : "" ?> value="28">
                                                        28
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "28 1/4") ? "selected='selected'" : "" ?> value="28 1/4">
                                                        28 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "28 1/2") ? "selected='selected'" : "" ?> value="28 1/2">
                                                        28 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "28 3/4") ? "selected='selected'" : "" ?> value="28 3/4">
                                                        28 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "29") ? "selected='selected'" : "" ?> value="29">
                                                        29
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "29 1/4") ? "selected='selected'" : "" ?> value="29 1/4">
                                                        29 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "29 1/2") ? "selected='selected'" : "" ?> value="29 1/2">
                                                        29 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "29 3/4") ? "selected='selected'" : "" ?> value="29 3/4">
                                                        29 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "30") ? "selected='selected'" : "" ?> value="30">
                                                        30
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                                        30 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                                        30 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                                        30 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "31") ? "selected='selected'" : "" ?> value="31">
                                                        31
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                                        31 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                                        31 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                                        31 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "32") ? "selected='selected'" : "" ?> value="32">
                                                        32
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                                        32 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                                        32 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                                        32 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "33") ? "selected='selected'" : "" ?> value="33">
                                                        33
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                                        33 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                                        33 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                                        33 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "34") ? "selected='selected'" : "" ?> value="34">
                                                        34
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                                        34 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                                        34 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                                        34 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "35") ? "selected='selected'" : "" ?> value="35">
                                                        35
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                                        35 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                                        35 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "35 3/4") ? "selected='selected'" : "" ?> value="35 3/4">
                                                        35 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "36") ? "selected='selected'" : "" ?> value="36">
                                                        36
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                                        36 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                                        36 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                                        36 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "37") ? "selected='selected'" : "" ?> value="37">
                                                        37
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                                        37 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                                        37 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                                        37 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "38") ? "selected='selected'" : "" ?> value="38">
                                                        38
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                                        38 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                                        38 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                                        38 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "39") ? "selected='selected'" : "" ?> value="39">
                                                        39
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                                        39 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                                        39 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                                        39 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "40") ? "selected='selected'" : "" ?> value="40">
                                                        40
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                                        40 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                                        40 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                                        40 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "41") ? "selected='selected'" : "" ?> value="41">
                                                        41
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                                        41 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                                        41 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                                        41 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "42") ? "selected='selected'" : "" ?> value="42">
                                                        42
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                                        42 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                                        42 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                                        42 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "43") ? "selected='selected'" : "" ?> value="43">
                                                        43
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                                        43 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                                        43 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                                        43 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "44") ? "selected='selected'" : "" ?> value="44">
                                                        44
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                                        44 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                                        44 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                                        44 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "45") ? "selected='selected'" : "" ?> value="45">
                                                        45
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                                        45 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                                        45 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                                        45 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "46") ? "selected='selected'" : "" ?> value="46">
                                                        46
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "46 1/4") ? "selected='selected'" : "" ?> value="46 1/4">
                                                        46 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "46 1/2") ? "selected='selected'" : "" ?> value="46 1/2">
                                                        46 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "46 3/4") ? "selected='selected'" : "" ?> value="46 3/4">
                                                        46 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "47") ? "selected='selected'" : "" ?> value="47">
                                                        47
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "47 1/4") ? "selected='selected'" : "" ?> value="47 1/4">
                                                        47 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "47 1/2") ? "selected='selected'" : "" ?> value="47 1/2">
                                                        47 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "47 3/4") ? "selected='selected'" : "" ?> value="47 3/4">
                                                        47 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "48") ? "selected='selected'" : "" ?> value="48">
                                                        48
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "48 1/4") ? "selected='selected'" : "" ?> value="48 1/4">
                                                        48 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "48 1/2") ? "selected='selected'" : "" ?> value="48 1/2">
                                                        48 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "48 3/4") ? "selected='selected'" : "" ?> value="48 3/4">
                                                        48 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "49") ? "selected='selected'" : "" ?> value="49">
                                                        49
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "49 1/4") ? "selected='selected'" : "" ?> value="49 1/4">
                                                        49 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "49 1/2") ? "selected='selected'" : "" ?> value="49 1/2">
                                                        49 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "49 3/4") ? "selected='selected'" : "" ?> value="49 3/4">
                                                        49 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "50") ? "selected='selected'" : "" ?> value="50">
                                                        50
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "50 1/4") ? "selected='selected'" : "" ?> value="50 1/4">
                                                        50 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "50 1/2") ? "selected='selected'" : "" ?> value="50 1/2">
                                                        50 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "50 3/4") ? "selected='selected'" : "" ?> value="50 3/4">
                                                        50 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "51") ? "selected='selected'" : "" ?> value="51">
                                                        51
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "51 1/4") ? "selected='selected'" : "" ?> value="51 1/4">
                                                        51 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "51 1/2") ? "selected='selected'" : "" ?> value="51 1/2">
                                                        51 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "51 3/4") ? "selected='selected'" : "" ?> value="51 3/4">
                                                        51 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "52") ? "selected='selected'" : "" ?> value="52">
                                                        52
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "52 1/4") ? "selected='selected'" : "" ?> value="52 1/4">
                                                        52 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "52 1/2") ? "selected='selected'" : "" ?> value="52 1/2">
                                                        52 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "52 3/4") ? "selected='selected'" : "" ?> value="52 3/4">
                                                        52 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "53") ? "selected='selected'" : "" ?> value="53">
                                                        53
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "53 1/4") ? "selected='selected'" : "" ?> value="53 1/4">
                                                        53 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "53 1/2") ? "selected='selected'" : "" ?> value="53 1/2">
                                                        53 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "53 3/4") ? "selected='selected'" : "" ?> value="53 3/4">
                                                        53 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "54") ? "selected='selected'" : "" ?> value="54">
                                                        54
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "54 1/4") ? "selected='selected'" : "" ?> value="54 1/4">
                                                        54 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "54 1/2") ? "selected='selected'" : "" ?> value="54 1/2">
                                                        54 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "54 3/4") ? "selected='selected'" : "" ?> value="54 3/4">
                                                        54 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "55") ? "selected='selected'" : "" ?> value="55">
                                                        55
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "55 1/4") ? "selected='selected'" : "" ?> value="55 1/4">
                                                        55 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "55 1/2") ? "selected='selected'" : "" ?> value="55 1/2">
                                                        55 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "55 3/4") ? "selected='selected'" : "" ?> value="55 3/4">
                                                        55 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "56") ? "selected='selected'" : "" ?> value="56">
                                                        56
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "56 1/4") ? "selected='selected'" : "" ?> value="56 1/4">
                                                        56 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "56 1/2") ? "selected='selected'" : "" ?> value="56 1/2">
                                                        56 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "56 3/4") ? "selected='selected'" : "" ?> value="56 3/4">
                                                        56 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "57") ? "selected='selected'" : "" ?> value="57">
                                                        57
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "57 1/4") ? "selected='selected'" : "" ?> value="57 1/4">
                                                        57 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "57 1/2") ? "selected='selected'" : "" ?> value="57 1/2">
                                                        57 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "57 3/4") ? "selected='selected'" : "" ?> value="57 3/4">
                                                        57 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "58") ? "selected='selected'" : "" ?> value="58">
                                                        58
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "58 1/4") ? "selected='selected'" : "" ?> value="58 1/4">
                                                        58 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "58 1/2") ? "selected='selected'" : "" ?> value="58 1/2">
                                                        58 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "58 3/4") ? "selected='selected'" : "" ?> value="58 3/4">
                                                        58 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "59") ? "selected='selected'" : "" ?> value="59">
                                                        59
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "59 1/4") ? "selected='selected'" : "" ?> value="59 1/4">
                                                        59 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "59 1/2") ? "selected='selected'" : "" ?> value="59 1/2">
                                                        59 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "59 3/4") ? "selected='selected'" : "" ?> value="59 3/4">
                                                        59 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "60") ? "selected='selected'" : "" ?> value="60">
                                                        60
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "60 1/4") ? "selected='selected'" : "" ?> value="60 1/4">
                                                        60 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "60 1/2") ? "selected='selected'" : "" ?> value="60 1/2">
                                                        60 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "60 3/4") ? "selected='selected'" : "" ?> value="60 3/4">
                                                        60 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "61") ? "selected='selected'" : "" ?> value="61">
                                                        61
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "61 1/4") ? "selected='selected'" : "" ?> value="61 1/4">
                                                        61 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "61 1/2") ? "selected='selected'" : "" ?> value="61 1/2">
                                                        61 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "61 3/4") ? "selected='selected'" : "" ?> value="61 3/4">
                                                        61 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "62") ? "selected='selected'" : "" ?> value="62">
                                                        62
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "62 1/4") ? "selected='selected'" : "" ?> value="62 1/4">
                                                        62 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "62 1/2") ? "selected='selected'" : "" ?> value="62 1/2">
                                                        62 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "62 3/4") ? "selected='selected'" : "" ?> value="62 3/4">
                                                        62 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "63") ? "selected='selected'" : "" ?> value="63">
                                                        63
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "63 1/4") ? "selected='selected'" : "" ?> value="63 1/4">
                                                        63 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "63 1/2") ? "selected='selected'" : "" ?> value="63 1/2">
                                                        63 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "63 3/4") ? "selected='selected'" : "" ?> value="63 3/4">
                                                        63 3/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "64") ? "selected='selected'" : "" ?> value="64">
                                                        64
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "64 1/4") ? "selected='selected'" : "" ?> value="64 1/4">
                                                        64 1/4
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "64 1/2") ? "selected='selected'" : "" ?> value="64 1/2">
                                                        64 1/2
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Waist']) && Session::get('currentSize')['Waist'] == "64 3/4") ? "selected='selected'" : "" ?> value="64 3/4">
                                                        64 3/4
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <h2 class="stepHeading">Size Detail</h2>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden"
                                                                                                        name="productID"
                                                                                                        value="<?=$productID;?>"/>
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <img src="<?php echo URL::to('public/assets/client/images/slider_img.png'); ?>"
                                                 alt="#"/>
                                        </div>


                                        <div class="customize_rightSection">
                                            <?=$slectedItems;?>
                                            <div class="customize_rightSection_content clearfix">
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"
                                                     alt="#"/>

                                                <p>The Medium Collar is the most
                                                    popular and versatile option as it
                                                    complements most face shapes
                                                    and tie-knots. Spread is also
                                                    well-liked and flattering on most
                                                    people. View the gallery below
                                                    for recommendations on which
                                                    of our fashionable collars will
                                                    best compliment your face
                                                    shape and preference of
                                                    tie-knot.</p>
                                            </div>

                                            <div class="neck_dtail canChangeSize">
                                                <label>Neck:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <select name="Posture">
                                                    <option selected="" value="">Posture</option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Posture']) && Session::get('currentSize')['Posture'] == "Flat") ? "selected='selected'" : "" ?> value="Flat">
                                                        Flat
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Posture']) && Session::get('currentSize')['Posture'] == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                        Average
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Posture']) && Session::get('currentSize')['Posture'] == "Rounded") ? "selected='selected'" : "" ?> value="Rounded">
                                                        Rounded
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Posture']) && Session::get('currentSize')['Posture'] == "Stout") ? "selected='selected'" : "" ?> value="Stout">
                                                        Stout
                                                    </option>
                                                </select>
                                                <select name="ArmType" style="margin-top: 4px;">
                                                    <option selected="" value="">Select Arm Type</option>
                                                    <option <?php echo (isset(Session::get('currentSize')['ArmType']) && Session::get('currentSize')['ArmType'] == "Slender") ? "selected='selected'" : "" ?> value="Slender">
                                                        Slender
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['ArmType']) && Session::get('currentSize')['ArmType'] == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                        Average
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['ArmType']) && Session::get('currentSize')['ArmType'] == "Muscular") ? "selected='selected'" : "" ?> value="Muscular">
                                                        Muscular
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['ArmType']) && Session::get('currentSize')['ArmType'] == "Heavy") ? "selected='selected'" : "" ?> value="Heavy">
                                                        Heavy
                                                    </option>
                                                </select>
                                                <select style="margin-top: 4px;" title="Weight" size="1"
                                                        name="BodyShape">
                                                    <option selected="" value="">Select Body Shape</option>
                                                    <option <?php echo (isset(Session::get('currentSize')['BodyShape']) && Session::get('currentSize')['BodyShape'] == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                        Average
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['BodyShape']) && Session::get('currentSize')['BodyShape'] == "Athletic") ? "selected='selected'" : "" ?> value="Athletic">
                                                        Athletic
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['BodyShape']) && Session::get('currentSize')['BodyShape'] == "Portly") ? "selected='selected'" : "" ?> value="Portly">
                                                        Portly
                                                    </option>
                                                </select>
                                                <select style="margin-top: 4px;" title="Waist" size="1"
                                                        name="BodyProportion">
                                                    <option selected="" value="">Select Body proportion</option>
                                                    <option <?php echo (isset(Session::get('currentSize')['BodyProportion']) && Session::get('currentSize')['BodyProportion'] == "Evenly Proportioned") ? "selected='selected'" : "" ?> value="Evenly Proportioned">
                                                        Evenly Proportioned
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['BodyProportion']) && Session::get('currentSize')['BodyProportion'] == "Short Torso / Long Legs") ? "selected='selected'" : "" ?> value="Short Torso / Long Legs">
                                                        Short Torso / Long Legs
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['BodyProportion']) && Session::get('currentSize')['BodyProportion'] == "Long Torso / Short Legs") ? "selected='selected'" : "" ?> value="Long Torso / Short Legs">
                                                        Long Torso / Short Legs
                                                    </option>
                                                </select>
                                                <select style="margin-top: 4px;" title="Waist" size="1"
                                                        name="Shoulder">
                                                    <option selected="" value="">Select Shoulder Type</option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Shoulder']) && Session::get('currentSize')['Shoulder'] == "Sloping") ? "selected='selected'" : "" ?> value="Sloping">
                                                        Sloping
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Shoulder']) && Session::get('currentSize')['Shoulder'] == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                        Average
                                                    </option>
                                                    <option <?php echo (isset(Session::get('currentSize')['Shoulder']) && Session::get('currentSize')['Shoulder'] == "Square") ? "selected='selected'" : "" ?> value="Square">
                                                        Square
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <h2 class="stepHeading">Choose Advance Options</h2>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="productID" value="<?=$productID;?>"/>
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_itemz_outer">
                                                <img src="<?php echo URL::to('public/assets/client/images/slider_img.png'); ?>"
                                                     alt="#"/>
                                            </div>
                                        </div>
                                        <div class="customize_rightSection">
                                            <?=$slectedItems;?>
                                            <div class="customize_rightSection_content clearfix">
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"
                                                     alt="#"/>

                                                <p>The Medium Collar is the most
                                                    popular and versatile option as it
                                                    complements most face shapes
                                                    and tie-knots. Spread is also
                                                    well-liked and flattering on most
                                                    people. View the gallery below
                                                    for recommendations on which
                                                    of our fashionable collars will
                                                    best compliment your face
                                                    shape and preference of
                                                    tie-knot.</p>
                                            </div>

                                            <div class="neck_dtail">
                                                <label>Other Customization:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <div style="padding-bottom: 0px;" class="servicesTerm whiteCollar">
                                                    <label class="active"><input name="whiteCollar" type="checkbox"
                                                                                 value="1" checked></label>
                                                    <p>White Collar</p>
                                                </div>
                                                <div style="padding-bottom: 0px;" class="servicesTerm whiteCuff">
                                                    <label class="active"><input name="whiteCuff" type="checkbox"
                                                                                 value="1" checked></label>
                                                    <p>White Cuff</p>
                                                </div>
                                                <select style="margin-top: 4px;" name="shirtTailType">
                                                    <option selected="" value="">Shirt Tail Type</option>
                                                    <option value="Full Cut">Full Cut</option>
                                                    <option value="Traditional Cut">Traditional Cut</option>
                                                    <option value="Trim Fit">Trim Fit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
        <button id="myBtn" class="hide">Open Modal</button>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">×</span>
                <h2>Shirt Size</h2>
            </div>
            <div class="modal-body">
                <h2>Choose Option</h2>
                <div style="margin-top:8px;padding-bottom: 0px;">
                    <p id="lastSizeFit" class="sizeFitorNot activeOption">
                        <i class="fa fa-check" style="color:#FFFFFF;"></i>&nbsp;Last order fit fine
                    </p>
                </div>
                <div style="padding-bottom: 0px;">
                    <p id="Modify" class="sizeFitorNot">
                        <i class="fa fa-check" style="color:#FFFFFF;"></i>&nbsp;Adjust my measurement
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <a class="continueStyling" style="float:right;">Done</a>
            </div>
        </div>

    </div>
    <script>
        /*
         * --------- Modal JS
         *
         * */
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        if ($('#openModalCondi').val() == 'open') {
            modal.style.display = "block";
        }
        // -------------------------- Modal JS End -------------------//
    </script>
    <!-- Page Wrapper -->
@endsection