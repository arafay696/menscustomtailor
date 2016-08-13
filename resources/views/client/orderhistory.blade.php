@extends('client.default')
@section('content')
    <div class="container">
        <div class="cart_container">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head_profile clearfix">
                        <h3>Order history</h3>

                        <ul class="clearfix">
                            <li><a href="<?php echo URL::to('profile');?>">ACCOUNT</a></li>
                            <li><a href="<?php echo URL::to('order-history');?>" class="secl_page">ORDER AND REVIEW</a>
                            </li>
                            <li><a href="<?php echo URL::to('newsletter');?>">NEWSLETTER</a></li>
                        </ul>
                    </div>
                    <br><br><br>

                    <div class="cart_listing_outer order_view">
                        <div class="cart_listing_head clearfix">
                            <div class="empty_colmn"><h5>Image</h5></div>
                            <div class="product_colmn"><h5>PRODUCT</h5></div>
                            <div class="product_colmn total_colmn"><h5>Total</h5></div>
                            <div class="product_colmn price_colmn"><h5>Delivered on</h5></div>
                            <div class="product_colmn price_colmn">&nbsp;</div>

                        </div>

                        <div class="cart_listing">
                            <ul>
                                <li class="clearfix">
                                    <div class="shirt_colmn_list">
                                        <img src="<?php echo URL::to('public/assets/client/images/list_shirt_img.png');?>"
                                             alt="#"/>
                                    </div>
                                    <div class="product_colmn_list">
                                        <label>Simple Groom Style Shirt</label>
                                        <p>lorem 1 + 3.5 ipswm, 25 ipswm </p>
                                    </div>
                                    <div class="product_colmn_list price_colmn_list">
                                        <b>$250</b>
                                    </div>
                                    <div class="product_colmn_list orderId">
                                        <h5>$OD31207</h5>
                                    </div>
                                    <div class="bttnz_two">
                                        <a href="javascript:void(0)"> Return Order</a>
                                        <a href="javascript:void(0)">Re Order</a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="shirt_colmn_list">
                                        <img src="<?php echo URL::to('public/assets/client/images/list_shirt_img.png');?>"
                                             alt="#"/>
                                    </div>
                                    <div class="product_colmn_list">
                                        <label>Simple Groom Style Shirt</label>
                                        <p>lorem 1 + 3.5 ipswm, 25 ipswm </p>
                                    </div>
                                    <div class="product_colmn_list price_colmn_list">
                                        <b>$250</b>
                                    </div>
                                    <div class="product_colmn_list orderId">
                                        <h5>$OD31207</h5>
                                    </div>
                                    <div class="bttnz_two">
                                        <a href="javascript:void(0)"> Return Order</a>
                                        <a href="javascript:void(0)">Re Order</a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="shirt_colmn_list">
                                        <img src="<?php echo URL::to('public/assets/client/images/list_shirt_img.png');?>"
                                             alt="#"/>
                                    </div>
                                    <div class="product_colmn_list">
                                        <label>Simple Groom Style Shirt</label>
                                        <p>lorem 1 + 3.5 ipswm, 25 ipswm </p>
                                    </div>
                                    <div class="product_colmn_list price_colmn_list">
                                        <b>$250</b>
                                    </div>
                                    <div class="product_colmn_list orderId">
                                        <h5>$OD31207</h5>
                                    </div>
                                    <div class="bttnz_two">
                                        <a href="javascript:void(0)"> Return Order</a>
                                        <a href="javascript:void(0)">Re Order</a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="shirt_colmn_list">
                                        <img src="<?php echo URL::to('public/assets/client/images/list_shirt_img.png');?>"
                                             alt="#"/>
                                    </div>
                                    <div class="product_colmn_list">
                                        <label>Simple Groom Style Shirt</label>
                                        <p>lorem 1 + 3.5 ipswm, 25 ipswm </p>
                                    </div>
                                    <div class="product_colmn_list price_colmn_list">
                                        <b>$250</b>
                                    </div>
                                    <div class="product_colmn_list orderId">
                                        <h5>$OD31207</h5>
                                    </div>
                                    <div class="bttnz_two">
                                        <a href="javascript:void(0)"> Return Order</a>
                                        <a href="javascript:void(0)">Re Order</a>
                                    </div>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection