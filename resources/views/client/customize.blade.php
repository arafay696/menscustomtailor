@extends('client.default')
@section('content')
    <!-- Page Wrapper -->
    <div class="container">
        <div class="cart_container back_background">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head clearfix customize_setting">
                        <h3>CUSTOMIZE Your Shirts <i class="fa fa-spinner fa-spin savingCustomize" style="display:none;"></i></h3>
                        <div class="actions">
                            <a class="previousSection" href="javascript:void(0);" style="">Previous</a>
                            <a class="nextSection" href="javascript:void(0);" style="margin-right: 2px">Next</a>
                        </div>
                    </div>
                    <div class="customize_page">
                        <ul class="customize_slider">
                            <li class="active-customize">
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="productID" value="<?=$productID;?>" />
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label class="select"><input type="radio" name="shirtType" value="Dress" checked="checked">&nbsp;
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
                                            <div style="clear: both;">
                                                <div class="customization_item">
                                                    <div class="artistProducer clearfix">
                                                        <label class="select"><input type="radio" name="frontStyle" value="Tab Front" checked="checked">&nbsp;
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
                                                        <label><input type="radio" name="frontStyle" value="Fly Front">&nbsp;
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
                                        </div>
                                        <div class="customize_rightSection">
                                            <div class="swathces_images clearfix">
                                                <ul>
                                                    <li><span><img alt="#" src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"></span></li>
                                                    <li><span><img alt="#" src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"></span></li>
                                                    <li><span class="active_swatch"><img alt="#" src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"></span></li>
                                                    <li><span><img alt="#" src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png'); ?>"></span></li>

                                                </ul>
                                            </div>
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
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="productID" value="<?=$productID;?>" />
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label class="select"><input type="radio" name="collarType"
                                                                  value="Traditional Point" checked="checked">&nbsp;</label>
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
                                                                  value="Hide Button Down">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Hide Button Down</span>
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
                                                <label>Neck Detail:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <input name="NeckSize" type="text" value=""
                                                       placeholder="Neck size in/ cm"/>
                                                <select style="margin-top: 4px;" name="NeckHeight">
                                                    <option>Select Neck Height</option>
                                                    <option>Short</option>
                                                    <option>Average</option>
                                                    <option>Long</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="hidden" name="productID" value="<?=$productID;?>" />
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label class="select"><input type="radio" name="cuffStyle" value="One Button Cuff" checked="checked">&nbsp;
                                                    </label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
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
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
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
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
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
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
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
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
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
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
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
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>Angled French Cuff</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize_rightSection">
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
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden" name="productID" value="<?=$productID;?>" />
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="sleeveStyle" value="Full Sleeve">&nbsp;
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
                                                    <label class="select"><input type="radio" name="sleeveStyle"
                                                                  value="Plain Short Sleeve" checked="checked">&nbsp;</label>
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
                                                <label>Neck Detail:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <select title="Sleeve Length" name="sleeveLength">
                                                    <option value="">Select Sleeve Length</option>
                                                    <option value="24">24</option>
                                                    <option value="24 1/4">24 1/4</option>
                                                    <option value="24 1/2">24 1/2</option>
                                                    <option value="24 3/4">24 3/4</option>
                                                    <option value="25">25</option>
                                                    <option value="25 1/4">25 1/4</option>
                                                    <option value="25 1/2">25 1/2</option>
                                                    <option value="25 3/4">25 3/4</option>
                                                    <option value="26">26</option>
                                                    <option value="26 1/4">26 1/4</option>
                                                    <option value="26 1/2">26 1/2</option>
                                                    <option value="26 3/4">26 3/4</option>
                                                    <option value="27">27</option>
                                                    <option value="27 1/4">27 1/4</option>
                                                    <option value="27 1/2">27 1/2</option>
                                                    <option value="27 3/4">27 3/4</option>
                                                    <option value="28">28</option>
                                                    <option value="28 1/4">28 1/4</option>
                                                    <option value="28 1/2">28 1/2</option>
                                                    <option value="28 3/4">28 3/4</option>
                                                    <option value="29">29</option>
                                                    <option value="29 1/4">29 1/4</option>
                                                    <option value="29 1/2">29 1/2</option>
                                                    <option value="29 3/4">29 3/4</option>
                                                    <option value="30">30</option>
                                                    <option value="30 1/4">30 1/4</option>
                                                    <option value="30 1/2">30 1/2</option>
                                                    <option value="30 3/4">30 3/4</option>
                                                    <option value="31">31</option>
                                                    <option value="31 1/4">31 1/4</option>
                                                    <option value="31 1/2">31 1/2</option>
                                                    <option value="31 3/4">31 3/4</option>
                                                    <option value="32">32</option>
                                                    <option value="32 1/4">32 1/4</option>
                                                    <option value="32 1/2">32 1/2</option>
                                                    <option value="32 3/4">32 3/4</option>
                                                    <option value="33">33</option>
                                                    <option value="33 1/4">33 1/4</option>
                                                    <option value="33 1/2">33 1/2</option>
                                                    <option value="33 3/4">33 3/4</option>
                                                    <option value="34">34</option>
                                                    <option value="34 1/4">34 1/4</option>
                                                    <option value="34 1/2">34 1/2</option>
                                                    <option value="34 3/4">34 3/4</option>
                                                    <option value="35">35</option>
                                                    <option value="35 1/4">35 1/4</option>
                                                    <option value="35 1/2">35 1/2</option>
                                                    <option value="35 3/4">35 3/4</option>
                                                    <option value="36">36</option>
                                                    <option value="36 1/4">36 1/4</option>
                                                    <option value="36 1/2">36 1/2</option>
                                                    <option value="36 3/4">36 3/4</option>
                                                    <option value="37">37</option>
                                                    <option value="37 1/4">37 1/4</option>
                                                    <option value="37 1/2">37 1/2</option>
                                                    <option value="37 3/4">37 3/4</option>
                                                    <option value="38">38</option>
                                                    <option value="38 1/4">38 1/4</option>
                                                    <option value="38 1/2">38 1/2</option>
                                                    <option value="38 3/4">38 3/4</option>
                                                    <option value="39">39</option>
                                                    <option value="39 1/4">39 1/4</option>
                                                    <option value="39 1/2">39 1/2</option>
                                                    <option value="39 3/4">39 3/4</option>
                                                    <option value="40">40</option>
                                                    <option value="40 1/4">40 1/4</option>
                                                    <option value="40 1/2">40 1/2</option>
                                                    <option value="40 3/4">40 3/4</option>
                                                    <option value="41">41</option>
                                                    <option value="41 1/4">41 1/4</option>
                                                    <option value="41 1/2">41 1/2</option>
                                                    <option value="41 3/4">41 3/4</option>
                                                    <option value="42">42</option>
                                                    <option value="42 1/4">42 1/4</option>
                                                    <option value="42 1/2">42 1/2</option>
                                                    <option value="42 3/4">42 3/4</option>
                                                    <option value="43">43</option>
                                                    <option value="43 1/4">43 1/4</option>
                                                    <option value="43 1/2">43 1/2</option>
                                                    <option value="43 3/4">43 3/4</option>
                                                    <option value="44">44</option>
                                                    <option value="44 1/4">44 1/4</option>
                                                    <option value="44 1/2">44 1/2</option>
                                                    <option value="44 3/4">44 3/4</option>
                                                    <option value="45">45</option>
                                                    <option value="45 1/4">45 1/4</option>
                                                    <option value="45 1/2">45 1/2</option>
                                                    <option value="45 3/4">45 3/4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden" name="productID" value="<?=$productID;?>" />
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label class="select"><input type="radio" name="pocketStyle"
                                                                  value="No Pocket" checked="checked">&nbsp;</label>
                                                </div>
                                                <img src="<?php echo URL::to('public/assets/client/images/colrr_img.png'); ?>"
                                                     alt="#"/>

                                                <div class="customization_dropdown">
                                                    <div class="customselect_customize">
                                                        <span>No Pocket</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="pocketStyle"
                                                                  value="Regular Pocket">&nbsp;</label>
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
                                        </div>
                                        <div class="customize_rightSection">
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
                                                <label>No. Of Pocket:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <input name="noOfPocket" type="text" value=""
                                                       placeholder="No. Of Pocket"/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden" name="productID" value="<?=$productID;?>" />
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_item">
                                                <div class="artistProducer clearfix">
                                                    <label><input type="radio" name="monogramStyle" value="None"
                                                                  checked="checked">&nbsp;</label>
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
                                                    <label class="select"><input type="radio" name="monogramStyle"
                                                                  value="Block Letter" checked="checked">&nbsp;</label>
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
                                                <label>Monogram Detail:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <input name="monogramIntials" type="text" value=""
                                                       placeholder="Monogram Intials"/>
                                                <select style="margin-top: 4px;" name="monogramColor">
                                                    <option selected="" value="-1">Select Monogram Color</option>
                                                    <option>Black</option>
                                                    <option>Brown</option>
                                                    <option>White</option>
                                                </select>
                                                <select style="margin-top: 4px;" name="monogramLocation">
                                                    <option selected="" value="-1">Select Monogram Location</option>
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
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden" name="productID" value="<?=$productID;?>" />
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <img src="<?php echo URL::to('public/assets/client/images/slider_img.png'); ?>"
                                                 alt="#"/>
                                        </div>


                                        <div class="customize_rightSection">
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
                                                <label>Neck:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <select name="Chest">
                                                    <option value="">Select Chest Size</option>
                                                    <option value="30">30</option>
                                                    <option value="30 1/4">30 1/4</option>
                                                    <option value="30 1/2">30 1/2</option>
                                                    <option value="30 3/4">30 3/4</option>
                                                    <option value="31">31</option>
                                                    <option value="31 1/4">31 1/4</option>
                                                    <option value="31 1/2">31 1/2</option>
                                                    <option value="31 3/4">31 3/4</option>
                                                    <option value="32">32</option>
                                                    <option value="32 1/4">32 1/4</option>
                                                    <option value="32 1/2">32 1/2</option>
                                                    <option value="32 3/4">32 3/4</option>
                                                    <option value="33">33</option>
                                                    <option value="33 1/4">33 1/4</option>
                                                    <option value="33 1/2">33 1/2</option>
                                                    <option value="33 3/4">33 3/4</option>
                                                    <option value="34">34</option>
                                                    <option value="34 1/4">34 1/4</option>
                                                    <option value="34 1/2">34 1/2</option>
                                                    <option value="34 3/4">34 3/4</option>
                                                    <option value="35">35</option>
                                                    <option value="35 1/4">35 1/4</option>
                                                    <option value="35 1/2">35 1/2</option>
                                                    <option value="35 3/4">35 3/4</option>
                                                    <option value="36">36</option>
                                                    <option value="36 1/4">36 1/4</option>
                                                    <option value="36 1/2">36 1/2</option>
                                                    <option value="36 3/4">36 3/4</option>
                                                    <option value="37">37</option>
                                                    <option value="37 1/4">37 1/4</option>
                                                    <option value="37 1/2">37 1/2</option>
                                                    <option value="37 3/4">37 3/4</option>
                                                    <option value="38">38</option>
                                                    <option value="38 1/4">38 1/4</option>
                                                    <option value="38 1/2">38 1/2</option>
                                                    <option value="38 3/4">38 3/4</option>
                                                    <option value="39">39</option>
                                                    <option value="39 1/4">39 1/4</option>
                                                    <option value="39 1/2">39 1/2</option>
                                                    <option value="39 3/4">39 3/4</option>
                                                    <option value="40">40</option>
                                                    <option value="40 1/4">40 1/4</option>
                                                    <option value="40 1/2">40 1/2</option>
                                                    <option value="40 3/4">40 3/4</option>
                                                    <option value="41">41</option>
                                                    <option value="41 1/4">41 1/4</option>
                                                    <option value="41 1/2">41 1/2</option>
                                                    <option value="41 3/4">41 3/4</option>
                                                    <option value="42">42</option>
                                                    <option value="42 1/4">42 1/4</option>
                                                    <option value="42 1/2">42 1/2</option>
                                                    <option value="42 3/4">42 3/4</option>
                                                    <option value="43">43</option>
                                                    <option value="43 1/4">43 1/4</option>
                                                    <option value="43 1/2">43 1/2</option>
                                                    <option value="43 3/4">43 3/4</option>
                                                    <option value="44">44</option>
                                                    <option value="44 1/4">44 1/4</option>
                                                    <option value="44 1/2">44 1/2</option>
                                                    <option value="44 3/4">44 3/4</option>
                                                    <option value="45">45</option>
                                                    <option value="45 1/4">45 1/4</option>
                                                    <option value="45 1/2">45 1/2</option>
                                                    <option value="45 3/4">45 3/4</option>
                                                    <option value="46">46</option>
                                                    <option value="46 1/4">46 1/4</option>
                                                    <option value="46 1/2">46 1/2</option>
                                                    <option value="46 3/4">46 3/4</option>
                                                    <option value="47">47</option>
                                                    <option value="47 1/4">47 1/4</option>
                                                    <option value="47 1/2">47 1/2</option>
                                                    <option value="47 3/4">47 3/4</option>
                                                    <option value="48">48</option>
                                                    <option value="48 1/4">48 1/4</option>
                                                    <option value="48 1/2">48 1/2</option>
                                                    <option value="48 3/4">48 3/4</option>
                                                    <option value="49">49</option>
                                                    <option value="49 1/4">49 1/4</option>
                                                    <option value="49 1/2">49 1/2</option>
                                                    <option value="49 3/4">49 3/4</option>
                                                    <option value="50">50</option>
                                                    <option value="50 1/4">50 1/4</option>
                                                    <option value="50 1/2">50 1/2</option>
                                                    <option value="50 3/4">50 3/4</option>
                                                    <option value="51">51</option>
                                                    <option value="51 1/4">51 1/4</option>
                                                    <option value="51 1/2">51 1/2</option>
                                                    <option value="51 3/4">51 3/4</option>
                                                    <option value="52">52</option>
                                                    <option value="52 1/4">52 1/4</option>
                                                    <option value="52 1/2">52 1/2</option>
                                                    <option value="52 3/4">52 3/4</option>
                                                    <option value="53">53</option>
                                                    <option value="53 1/4">53 1/4</option>
                                                    <option value="53 1/2">53 1/2</option>
                                                    <option value="53 3/4">53 3/4</option>
                                                    <option value="54">54</option>
                                                    <option value="54 1/4">54 1/4</option>
                                                    <option value="54 1/2">54 1/2</option>
                                                    <option value="54 3/4">54 3/4</option>
                                                    <option value="55">55</option>
                                                    <option value="55 1/4">55 1/4</option>
                                                    <option value="55 1/2">55 1/2</option>
                                                    <option value="55 3/4">55 3/4</option>
                                                    <option value="56">56</option>
                                                    <option value="56 1/4">56 1/4</option>
                                                    <option value="56 1/2">56 1/2</option>
                                                    <option value="56 3/4">56 3/4</option>
                                                    <option value="57">57</option>
                                                    <option value="57 1/4">57 1/4</option>
                                                    <option value="57 1/2">57 1/2</option>
                                                    <option value="57 3/4">57 3/4</option>
                                                    <option value="58">58</option>
                                                    <option value="58 1/4">58 1/4</option>
                                                    <option value="58 1/2">58 1/2</option>
                                                    <option value="58 3/4">58 3/4</option>
                                                    <option value="59">59</option>
                                                    <option value="59 1/4">59 1/4</option>
                                                    <option value="59 1/2">59 1/2</option>
                                                    <option value="59 3/4">59 3/4</option>
                                                    <option value="60">60</option>
                                                    <option value="60 1/4">60 1/4</option>
                                                    <option value="60 1/2">60 1/2</option>
                                                    <option value="60 3/4">60 3/4</option>
                                                    <option value="61">61</option>
                                                    <option value="61 1/4">61 1/4</option>
                                                    <option value="61 1/2">61 1/2</option>
                                                    <option value="61 3/4">61 3/4</option>
                                                    <option value="62">62</option>
                                                    <option value="62 1/4">62 1/4</option>
                                                    <option value="62 1/2">62 1/2</option>
                                                    <option value="62 3/4">62 3/4</option>
                                                    <option value="63">63</option>
                                                    <option value="63 1/4">63 1/4</option>
                                                    <option value="63 1/2">63 1/2</option>
                                                    <option value="63 3/4">63 3/4</option>
                                                    <option value="64">64</option>
                                                    <option value="64 1/4">64 1/4</option>
                                                    <option value="64 1/2">64 1/2</option>
                                                    <option value="64 3/4">64 3/4</option>
                                                    <option value="65">65</option>
                                                    <option value="65 1/4">65 1/4</option>
                                                    <option value="65 1/2">65 1/2</option>
                                                    <option value="65 3/4">65 3/4</option>
                                                    <option value="66">66</option>
                                                    <option value="66 1/4">66 1/4</option>
                                                    <option value="66 1/2">66 1/2</option>
                                                    <option value="66 3/4">66 3/4</option>
                                                    <option value="67">67</option>
                                                    <option value="67 1/4">67 1/4</option>
                                                    <option value="67 1/2">67 1/2</option>
                                                    <option value="67 3/4">67 3/4</option>
                                                    <option value="68">68</option>
                                                    <option value="68 1/4">68 1/4</option>
                                                    <option value="68 1/2">68 1/2</option>
                                                    <option value="68 3/4">68 3/4</option>
                                                    <option value="69">69</option>
                                                    <option value="69 1/4">69 1/4</option>
                                                    <option value="69 1/2">69 1/2</option>
                                                    <option value="69 3/4">69 3/4</option>
                                                    <option value="70">70</option>
                                                    <option value="70 1/4">70 1/4</option>
                                                    <option value="70 1/2">70 1/2</option>
                                                    <option value="70 3/4">70 3/4</option>
                                                    <option value="71">71</option>
                                                    <option value="71 1/4">71 1/4</option>
                                                    <option value="71 1/2">71 1/2</option>
                                                    <option value="71 3/4">71 3/4</option>
                                                    <option value="72">72</option>
                                                    <option value="72 1/4">72 1/4</option>
                                                    <option value="72 1/2">72 1/2</option>
                                                    <option value="72 3/4">72 3/4</option>
                                                    <option value="73">73</option>
                                                    <option value="73 1/4">73 1/4</option>
                                                    <option value="73 1/2">73 1/2</option>
                                                    <option value="73 3/4">73 3/4</option>
                                                    <option value="74">74</option>
                                                    <option value="74 1/4">74 1/4</option>
                                                    <option value="74 1/2">74 1/2</option>
                                                    <option value="74 3/4">74 3/4</option>
                                                    <option value="75">75</option>
                                                    <option value="75 1/4">75 1/4</option>
                                                    <option value="75 1/2">75 1/2</option>
                                                    <option value="75 3/4">75 3/4</option>
                                                    <option value="76">76</option>
                                                    <option value="76 1/4">76 1/4</option>
                                                    <option value="76 1/2">76 1/2</option>
                                                    <option value="76 3/4">76 3/4</option>
                                                </select>
                                                <select style="margin-top: 4px;" name="ChestDescription">
                                                    <option>Select Chect Description</option>
                                                    <option>Slender</option>
                                                    <option>Regular Build</option>
                                                    <option>Very Muscular</option>
                                                    <option>Husky / Hefty</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden" name="productID" value="<?=$productID;?>" />
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <img src="<?php echo URL::to('public/assets/client/images/slider_img.png'); ?>"
                                                 alt="#"/>
                                        </div>


                                        <div class="customize_rightSection">
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
                                                <label>Neck:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <select style="display: inline-block; clear: none; width: 50%; float: left;"
                                                        name="HeightFeet">
                                                    <option selected="">Height Feet</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                </select>
                                                <select name="HeightInches" size="1"
                                                        style="display: inline-block; clear: none; margin-left: 2px; width: 49%;">
                                                    <option selected="" value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                </select>
                                                <select style="margin-top: 4px;" title="Weight" size="1" name="Weight">
                                                    <option value="">Select Weight</option>
                                                    <option value="90">90</option>
                                                    <option value="91">91</option>
                                                    <option value="92">92</option>
                                                    <option value="93">93</option>
                                                    <option value="94">94</option>
                                                    <option value="95">95</option>
                                                    <option value="96">96</option>
                                                    <option value="97">97</option>
                                                    <option value="98">98</option>
                                                    <option value="99">99</option>
                                                    <option value="100">100</option>
                                                    <option value="101">101</option>
                                                    <option value="102">102</option>
                                                    <option value="103">103</option>
                                                    <option value="104">104</option>
                                                    <option value="105">105</option>
                                                    <option value="106">106</option>
                                                    <option value="107">107</option>
                                                    <option value="108">108</option>
                                                    <option value="109">109</option>
                                                    <option value="110">110</option>
                                                    <option value="111">111</option>
                                                    <option value="112">112</option>
                                                    <option value="113">113</option>
                                                    <option value="114">114</option>
                                                    <option value="115">115</option>
                                                    <option value="116">116</option>
                                                    <option value="117">117</option>
                                                    <option value="118">118</option>
                                                    <option value="119">119</option>
                                                    <option value="120">120</option>
                                                    <option value="121">121</option>
                                                    <option value="122">122</option>
                                                    <option value="123">123</option>
                                                    <option value="124">124</option>
                                                    <option value="125">125</option>
                                                    <option value="126">126</option>
                                                    <option value="127">127</option>
                                                    <option value="128">128</option>
                                                    <option value="129">129</option>
                                                    <option value="130">130</option>
                                                    <option value="131">131</option>
                                                    <option value="132">132</option>
                                                    <option value="133">133</option>
                                                    <option value="134">134</option>
                                                    <option value="135">135</option>
                                                    <option value="136">136</option>
                                                    <option value="137">137</option>
                                                    <option value="138">138</option>
                                                    <option value="139">139</option>
                                                    <option value="140">140</option>
                                                    <option value="141">141</option>
                                                    <option value="142">142</option>
                                                    <option value="143">143</option>
                                                    <option value="144">144</option>
                                                    <option value="145">145</option>
                                                    <option value="146">146</option>
                                                    <option value="147">147</option>
                                                    <option value="148">148</option>
                                                    <option value="149">149</option>
                                                    <option value="150">150</option>
                                                    <option value="151">151</option>
                                                    <option value="152">152</option>
                                                    <option value="153">153</option>
                                                    <option value="154">154</option>
                                                    <option value="155">155</option>
                                                    <option value="156">156</option>
                                                    <option value="157">157</option>
                                                    <option value="158">158</option>
                                                    <option value="159">159</option>
                                                    <option value="160">160</option>
                                                    <option value="161">161</option>
                                                    <option value="162">162</option>
                                                    <option value="163">163</option>
                                                    <option value="164">164</option>
                                                    <option value="165">165</option>
                                                    <option value="166">166</option>
                                                    <option value="167">167</option>
                                                    <option value="168">168</option>
                                                    <option value="169">169</option>
                                                    <option value="170">170</option>
                                                    <option value="171">171</option>
                                                    <option value="172">172</option>
                                                    <option value="173">173</option>
                                                    <option value="174">174</option>
                                                    <option value="175">175</option>
                                                    <option value="176">176</option>
                                                    <option value="177">177</option>
                                                    <option value="178">178</option>
                                                    <option value="179">179</option>
                                                    <option value="180">180</option>
                                                    <option value="181">181</option>
                                                    <option value="182">182</option>
                                                    <option value="183">183</option>
                                                    <option value="184">184</option>
                                                    <option value="185">185</option>
                                                    <option value="186">186</option>
                                                    <option value="187">187</option>
                                                    <option value="188">188</option>
                                                    <option value="189">189</option>
                                                    <option value="190">190</option>
                                                    <option value="191">191</option>
                                                    <option value="192">192</option>
                                                    <option value="193">193</option>
                                                    <option value="194">194</option>
                                                    <option value="195">195</option>
                                                    <option value="196">196</option>
                                                    <option value="197">197</option>
                                                    <option value="198">198</option>
                                                    <option value="199">199</option>
                                                    <option value="200">200</option>
                                                    <option value="201">201</option>
                                                    <option value="202">202</option>
                                                    <option value="203">203</option>
                                                    <option value="204">204</option>
                                                    <option value="205">205</option>
                                                    <option value="206">206</option>
                                                    <option value="207">207</option>
                                                    <option value="208">208</option>
                                                    <option value="209">209</option>
                                                    <option value="210">210</option>
                                                    <option value="211">211</option>
                                                    <option value="212">212</option>
                                                    <option value="213">213</option>
                                                    <option value="214">214</option>
                                                    <option value="215">215</option>
                                                    <option value="216">216</option>
                                                    <option value="217">217</option>
                                                    <option value="218">218</option>
                                                    <option value="219">219</option>
                                                    <option value="220">220</option>
                                                    <option value="221">221</option>
                                                    <option value="222">222</option>
                                                    <option value="223">223</option>
                                                    <option value="224">224</option>
                                                    <option value="225">225</option>
                                                    <option value="226">226</option>
                                                    <option value="227">227</option>
                                                    <option value="228">228</option>
                                                    <option value="229">229</option>
                                                    <option value="230">230</option>
                                                    <option value="231">231</option>
                                                    <option value="232">232</option>
                                                    <option value="233">233</option>
                                                    <option value="234">234</option>
                                                    <option value="235">235</option>
                                                    <option value="236">236</option>
                                                    <option value="237">237</option>
                                                    <option value="238">238</option>
                                                    <option value="239">239</option>
                                                    <option value="240">240</option>
                                                    <option value="241">241</option>
                                                    <option value="242">242</option>
                                                    <option value="243">243</option>
                                                    <option value="244">244</option>
                                                    <option value="245">245</option>
                                                    <option value="246">246</option>
                                                    <option value="247">247</option>
                                                    <option value="248">248</option>
                                                    <option value="249">249</option>
                                                    <option value="250">250</option>
                                                    <option value="251">251</option>
                                                    <option value="252">252</option>
                                                    <option value="253">253</option>
                                                    <option value="254">254</option>
                                                    <option value="255">255</option>
                                                    <option value="256">256</option>
                                                    <option value="257">257</option>
                                                    <option value="258">258</option>
                                                    <option value="259">259</option>
                                                    <option value="260">260</option>
                                                    <option value="261">261</option>
                                                    <option value="262">262</option>
                                                    <option value="263">263</option>
                                                    <option value="264">264</option>
                                                    <option value="265">265</option>
                                                    <option value="266">266</option>
                                                    <option value="267">267</option>
                                                    <option value="268">268</option>
                                                    <option value="269">269</option>
                                                    <option value="270">270</option>
                                                    <option value="271">271</option>
                                                    <option value="272">272</option>
                                                    <option value="273">273</option>
                                                    <option value="274">274</option>
                                                    <option value="275">275</option>
                                                    <option value="276">276</option>
                                                    <option value="277">277</option>
                                                    <option value="278">278</option>
                                                    <option value="279">279</option>
                                                    <option value="280">280</option>
                                                    <option value="281">281</option>
                                                    <option value="282">282</option>
                                                    <option value="283">283</option>
                                                    <option value="284">284</option>
                                                    <option value="285">285</option>
                                                    <option value="286">286</option>
                                                    <option value="287">287</option>
                                                    <option value="288">288</option>
                                                    <option value="289">289</option>
                                                    <option value="290">290</option>
                                                    <option value="291">291</option>
                                                    <option value="292">292</option>
                                                    <option value="293">293</option>
                                                    <option value="294">294</option>
                                                    <option value="295">295</option>
                                                    <option value="296">296</option>
                                                    <option value="297">297</option>
                                                    <option value="298">298</option>
                                                    <option value="299">299</option>
                                                    <option value="300">300</option>
                                                    <option value="301">301</option>
                                                    <option value="302">302</option>
                                                    <option value="303">303</option>
                                                    <option value="304">304</option>
                                                    <option value="305">305</option>
                                                    <option value="306">306</option>
                                                    <option value="307">307</option>
                                                    <option value="308">308</option>
                                                    <option value="309">309</option>
                                                    <option value="310">310</option>
                                                    <option value="311">311</option>
                                                    <option value="312">312</option>
                                                    <option value="313">313</option>
                                                    <option value="314">314</option>
                                                    <option value="315">315</option>
                                                    <option value="316">316</option>
                                                    <option value="317">317</option>
                                                    <option value="318">318</option>
                                                    <option value="319">319</option>
                                                    <option value="320">320</option>
                                                    <option value="321">321</option>
                                                    <option value="322">322</option>
                                                    <option value="323">323</option>
                                                    <option value="324">324</option>
                                                    <option value="325">325</option>
                                                    <option value="326">326</option>
                                                    <option value="327">327</option>
                                                    <option value="328">328</option>
                                                    <option value="329">329</option>
                                                    <option value="330">330</option>
                                                    <option value="331">331</option>
                                                    <option value="332">332</option>
                                                    <option value="333">333</option>
                                                    <option value="334">334</option>
                                                    <option value="335">335</option>
                                                    <option value="336">336</option>
                                                    <option value="337">337</option>
                                                    <option value="338">338</option>
                                                    <option value="339">339</option>
                                                    <option value="340">340</option>
                                                    <option value="341">341</option>
                                                    <option value="342">342</option>
                                                    <option value="343">343</option>
                                                    <option value="344">344</option>
                                                    <option value="345">345</option>
                                                    <option value="346">346</option>
                                                    <option value="347">347</option>
                                                    <option value="348">348</option>
                                                    <option value="349">349</option>
                                                    <option value="350">350</option>
                                                    <option value="351">351</option>
                                                    <option value="352">352</option>
                                                    <option value="353">353</option>
                                                    <option value="354">354</option>
                                                    <option value="355">355</option>
                                                    <option value="356">356</option>
                                                    <option value="357">357</option>
                                                    <option value="358">358</option>
                                                    <option value="359">359</option>
                                                    <option value="360">360</option>
                                                    <option value="361">361</option>
                                                    <option value="362">362</option>
                                                    <option value="363">363</option>
                                                    <option value="364">364</option>
                                                    <option value="365">365</option>
                                                    <option value="366">366</option>
                                                    <option value="367">367</option>
                                                    <option value="368">368</option>
                                                    <option value="369">369</option>
                                                    <option value="370">370</option>
                                                    <option value="371">371</option>
                                                    <option value="372">372</option>
                                                    <option value="373">373</option>
                                                    <option value="374">374</option>
                                                    <option value="375">375</option>
                                                    <option value="376">376</option>
                                                    <option value="377">377</option>
                                                    <option value="378">378</option>
                                                    <option value="379">379</option>
                                                    <option value="380">380</option>
                                                    <option value="381">381</option>
                                                    <option value="382">382</option>
                                                    <option value="383">383</option>
                                                    <option value="384">384</option>
                                                    <option value="385">385</option>
                                                    <option value="386">386</option>
                                                    <option value="387">387</option>
                                                    <option value="388">388</option>
                                                    <option value="389">389</option>
                                                    <option value="390">390</option>
                                                    <option value="391">391</option>
                                                    <option value="392">392</option>
                                                    <option value="393">393</option>
                                                    <option value="394">394</option>
                                                    <option value="395">395</option>
                                                    <option value="396">396</option>
                                                    <option value="397">397</option>
                                                    <option value="398">398</option>
                                                    <option value="399">399</option>
                                                    <option value="400">400</option>
                                                    <option value="401">401</option>
                                                    <option value="402">402</option>
                                                    <option value="403">403</option>
                                                    <option value="404">404</option>
                                                    <option value="405">405</option>
                                                    <option value="406">406</option>
                                                    <option value="407">407</option>
                                                    <option value="408">408</option>
                                                    <option value="409">409</option>
                                                    <option value="410">410</option>
                                                    <option value="411">411</option>
                                                    <option value="412">412</option>
                                                    <option value="413">413</option>
                                                    <option value="414">414</option>
                                                    <option value="415">415</option>
                                                    <option value="416">416</option>
                                                    <option value="417">417</option>
                                                    <option value="418">418</option>
                                                    <option value="419">419</option>
                                                    <option value="420">420</option>
                                                    <option value="421">421</option>
                                                    <option value="422">422</option>
                                                    <option value="423">423</option>
                                                    <option value="424">424</option>
                                                    <option value="425">425</option>
                                                    <option value="426">426</option>
                                                    <option value="427">427</option>
                                                    <option value="428">428</option>
                                                    <option value="429">429</option>
                                                    <option value="430">430</option>
                                                    <option value="431">431</option>
                                                    <option value="432">432</option>
                                                    <option value="433">433</option>
                                                    <option value="434">434</option>
                                                    <option value="435">435</option>
                                                    <option value="436">436</option>
                                                    <option value="437">437</option>
                                                    <option value="438">438</option>
                                                    <option value="439">439</option>
                                                    <option value="440">440</option>
                                                    <option value="441">441</option>
                                                    <option value="442">442</option>
                                                    <option value="443">443</option>
                                                    <option value="444">444</option>
                                                    <option value="445">445</option>
                                                    <option value="446">446</option>
                                                    <option value="447">447</option>
                                                    <option value="448">448</option>
                                                    <option value="449">449</option>
                                                    <option value="450">450</option>
                                                </select>
                                                <select style="margin-top: 4px;" title="Waist" size="1" name="Waist">
                                                    <option value="">Select Waist</option>
                                                    <option value="24">24</option>
                                                    <option value="24 1/4">24 1/4</option>
                                                    <option value="24 1/2">24 1/2</option>
                                                    <option value="24 3/4">24 3/4</option>
                                                    <option value="25">25</option>
                                                    <option value="25 1/4">25 1/4</option>
                                                    <option value="25 1/2">25 1/2</option>
                                                    <option value="25 3/4">25 3/4</option>
                                                    <option value="26">26</option>
                                                    <option value="26 1/4">26 1/4</option>
                                                    <option value="26 1/2">26 1/2</option>
                                                    <option value="26 3/4">26 3/4</option>
                                                    <option value="27">27</option>
                                                    <option value="27 1/4">27 1/4</option>
                                                    <option value="27 1/2">27 1/2</option>
                                                    <option value="27 3/4">27 3/4</option>
                                                    <option value="28">28</option>
                                                    <option value="28 1/4">28 1/4</option>
                                                    <option value="28 1/2">28 1/2</option>
                                                    <option value="28 3/4">28 3/4</option>
                                                    <option value="29">29</option>
                                                    <option value="29 1/4">29 1/4</option>
                                                    <option value="29 1/2">29 1/2</option>
                                                    <option value="29 3/4">29 3/4</option>
                                                    <option value="30">30</option>
                                                    <option value="30 1/4">30 1/4</option>
                                                    <option value="30 1/2">30 1/2</option>
                                                    <option value="30 3/4">30 3/4</option>
                                                    <option value="31">31</option>
                                                    <option value="31 1/4">31 1/4</option>
                                                    <option value="31 1/2">31 1/2</option>
                                                    <option value="31 3/4">31 3/4</option>
                                                    <option value="32">32</option>
                                                    <option value="32 1/4">32 1/4</option>
                                                    <option value="32 1/2">32 1/2</option>
                                                    <option value="32 3/4">32 3/4</option>
                                                    <option value="33">33</option>
                                                    <option value="33 1/4">33 1/4</option>
                                                    <option value="33 1/2">33 1/2</option>
                                                    <option value="33 3/4">33 3/4</option>
                                                    <option value="34">34</option>
                                                    <option value="34 1/4">34 1/4</option>
                                                    <option value="34 1/2">34 1/2</option>
                                                    <option value="34 3/4">34 3/4</option>
                                                    <option value="35">35</option>
                                                    <option value="35 1/4">35 1/4</option>
                                                    <option value="35 1/2">35 1/2</option>
                                                    <option value="35 3/4">35 3/4</option>
                                                    <option value="36">36</option>
                                                    <option value="36 1/4">36 1/4</option>
                                                    <option value="36 1/2">36 1/2</option>
                                                    <option value="36 3/4">36 3/4</option>
                                                    <option value="37">37</option>
                                                    <option value="37 1/4">37 1/4</option>
                                                    <option value="37 1/2">37 1/2</option>
                                                    <option value="37 3/4">37 3/4</option>
                                                    <option value="38">38</option>
                                                    <option value="38 1/4">38 1/4</option>
                                                    <option value="38 1/2">38 1/2</option>
                                                    <option value="38 3/4">38 3/4</option>
                                                    <option value="39">39</option>
                                                    <option value="39 1/4">39 1/4</option>
                                                    <option value="39 1/2">39 1/2</option>
                                                    <option value="39 3/4">39 3/4</option>
                                                    <option value="40">40</option>
                                                    <option value="40 1/4">40 1/4</option>
                                                    <option value="40 1/2">40 1/2</option>
                                                    <option value="40 3/4">40 3/4</option>
                                                    <option value="41">41</option>
                                                    <option value="41 1/4">41 1/4</option>
                                                    <option value="41 1/2">41 1/2</option>
                                                    <option value="41 3/4">41 3/4</option>
                                                    <option value="42">42</option>
                                                    <option value="42 1/4">42 1/4</option>
                                                    <option value="42 1/2">42 1/2</option>
                                                    <option value="42 3/4">42 3/4</option>
                                                    <option value="43">43</option>
                                                    <option value="43 1/4">43 1/4</option>
                                                    <option value="43 1/2">43 1/2</option>
                                                    <option value="43 3/4">43 3/4</option>
                                                    <option value="44">44</option>
                                                    <option value="44 1/4">44 1/4</option>
                                                    <option value="44 1/2">44 1/2</option>
                                                    <option value="44 3/4">44 3/4</option>
                                                    <option value="45">45</option>
                                                    <option value="45 1/4">45 1/4</option>
                                                    <option value="45 1/2">45 1/2</option>
                                                    <option value="45 3/4">45 3/4</option>
                                                    <option value="46">46</option>
                                                    <option value="46 1/4">46 1/4</option>
                                                    <option value="46 1/2">46 1/2</option>
                                                    <option value="46 3/4">46 3/4</option>
                                                    <option value="47">47</option>
                                                    <option value="47 1/4">47 1/4</option>
                                                    <option value="47 1/2">47 1/2</option>
                                                    <option value="47 3/4">47 3/4</option>
                                                    <option value="48">48</option>
                                                    <option value="48 1/4">48 1/4</option>
                                                    <option value="48 1/2">48 1/2</option>
                                                    <option value="48 3/4">48 3/4</option>
                                                    <option value="49">49</option>
                                                    <option value="49 1/4">49 1/4</option>
                                                    <option value="49 1/2">49 1/2</option>
                                                    <option value="49 3/4">49 3/4</option>
                                                    <option value="50">50</option>
                                                    <option value="50 1/4">50 1/4</option>
                                                    <option value="50 1/2">50 1/2</option>
                                                    <option value="50 3/4">50 3/4</option>
                                                    <option value="51">51</option>
                                                    <option value="51 1/4">51 1/4</option>
                                                    <option value="51 1/2">51 1/2</option>
                                                    <option value="51 3/4">51 3/4</option>
                                                    <option value="52">52</option>
                                                    <option value="52 1/4">52 1/4</option>
                                                    <option value="52 1/2">52 1/2</option>
                                                    <option value="52 3/4">52 3/4</option>
                                                    <option value="53">53</option>
                                                    <option value="53 1/4">53 1/4</option>
                                                    <option value="53 1/2">53 1/2</option>
                                                    <option value="53 3/4">53 3/4</option>
                                                    <option value="54">54</option>
                                                    <option value="54 1/4">54 1/4</option>
                                                    <option value="54 1/2">54 1/2</option>
                                                    <option value="54 3/4">54 3/4</option>
                                                    <option value="55">55</option>
                                                    <option value="55 1/4">55 1/4</option>
                                                    <option value="55 1/2">55 1/2</option>
                                                    <option value="55 3/4">55 3/4</option>
                                                    <option value="56">56</option>
                                                    <option value="56 1/4">56 1/4</option>
                                                    <option value="56 1/2">56 1/2</option>
                                                    <option value="56 3/4">56 3/4</option>
                                                    <option value="57">57</option>
                                                    <option value="57 1/4">57 1/4</option>
                                                    <option value="57 1/2">57 1/2</option>
                                                    <option value="57 3/4">57 3/4</option>
                                                    <option value="58">58</option>
                                                    <option value="58 1/4">58 1/4</option>
                                                    <option value="58 1/2">58 1/2</option>
                                                    <option value="58 3/4">58 3/4</option>
                                                    <option value="59">59</option>
                                                    <option value="59 1/4">59 1/4</option>
                                                    <option value="59 1/2">59 1/2</option>
                                                    <option value="59 3/4">59 3/4</option>
                                                    <option value="60">60</option>
                                                    <option value="60 1/4">60 1/4</option>
                                                    <option value="60 1/2">60 1/2</option>
                                                    <option value="60 3/4">60 3/4</option>
                                                    <option value="61">61</option>
                                                    <option value="61 1/4">61 1/4</option>
                                                    <option value="61 1/2">61 1/2</option>
                                                    <option value="61 3/4">61 3/4</option>
                                                    <option value="62">62</option>
                                                    <option value="62 1/4">62 1/4</option>
                                                    <option value="62 1/2">62 1/2</option>
                                                    <option value="62 3/4">62 3/4</option>
                                                    <option value="63">63</option>
                                                    <option value="63 1/4">63 1/4</option>
                                                    <option value="63 1/2">63 1/2</option>
                                                    <option value="63 3/4">63 3/4</option>
                                                    <option value="64">64</option>
                                                    <option value="64 1/4">64 1/4</option>
                                                    <option value="64 1/2">64 1/2</option>
                                                    <option value="64 3/4">64 3/4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden" name="productID" value="<?=$productID;?>" />
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <img src="<?php echo URL::to('public/assets/client/images/slider_img.png'); ?>"
                                                 alt="#"/>
                                        </div>


                                        <div class="customize_rightSection">
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
                                                <label>Neck:</label>

                                                <p>The neck measurement is taken around the neck with the
                                                    tape resting on your shoulders. You should put one finger
                                                    between the tape and the neck if you want to allow for
                                                    some extra room.</p>
                                                <select name="Posture">
                                                    <option selected="" value="-1">Posture</option>
                                                    <option value="Flat">Flat</option>
                                                    <option value="Average">Average</option>
                                                    <option value="Rounded">Rounded</option>
                                                    <option value="Stout">Stout</option>
                                                </select>
                                                <select name="ArmType" style="margin-top: 4px;">
                                                    <option selected="" value="-1">Select Arm Type</option>
                                                    <option value="Slender">Slender</option>
                                                    <option value="Average">Average</option>
                                                    <option value="Muscular">Muscular</option>
                                                    <option value="Heavy">Heavy</option>
                                                </select>
                                                <select style="margin-top: 4px;" title="Weight" size="1"
                                                        name="BodyShape">
                                                    <option selected="" value="-1">Select Body Shape</option>
                                                    <option value="Average">Average</option>
                                                    <option value="Athletic">Athletic</option>
                                                    <option value="Portly">Portly</option>
                                                </select>
                                                <select style="margin-top: 4px;" title="Waist" size="1"
                                                        name="BodyProportion">
                                                    <option selected="" value="-1">Select Body proportion</option>
                                                    <option value="Evenly Proportioned">Evenly Proportioned</option>
                                                    <option value="Short Torso / Long Legs">Short Torso / Long Legs
                                                    </option>
                                                    <option value="Long Torso / Short Legs">Long Torso / Short Legs
                                                    </option>
                                                </select>
                                                <select style="margin-top: 4px;" title="Waist" size="1"
                                                        name="Shoulder">
                                                    <option selected="" value="-1">Select Shoulder Type</option>
                                                    <option value="Sloping">Sloping</option>
                                                    <option value="Average">Average</option>
                                                    <option value="Square">Square</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="<?php echo URL::to('/fabric/customize') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/><input type="hidden" name="productID" value="<?=$productID;?>" />
                                    <div class="customization_outer clearfix">
                                        <div class="customization_itemz_outer">
                                            <div class="customization_itemz_outer">
                                                <img src="<?php echo URL::to('public/assets/client/images/slider_img.png'); ?>"
                                                     alt="#"/>
                                            </div>
                                        </div>
                                        <div class="customize_rightSection">
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
                                                    <label class="active"><input name="whiteCollar" type="checkbox" value="1" checked></label><p>White Collar</p>
                                                </div>
                                                <div style="padding-bottom: 0px;" class="servicesTerm whiteCuff">
                                                    <label class="active"><input name="whiteCuff" type="checkbox" value="1" checked></label><p>White Cuff</p>
                                                </div>
                                                <select style="margin-top: 4px;" name="shirtTailType">
                                                    <option selected="" value="-1">Shirt Tail Type</option>
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
    </div>
    <!-- Page Wrapper -->
@endsection