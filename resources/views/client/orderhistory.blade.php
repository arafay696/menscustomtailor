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
                            <div class="empty_colmn"><h5>Order #</h5></div>
                            <div class="product_colmn"><h5>Order Status</h5></div>
                            <div class="product_colmn total_colmn"><h5>Total</h5></div>
                            <div class="product_colmn price_colmn"><h5>Delivered on</h5></div>
                            <div class="product_colmn price_colmn">&nbsp;</div>

                        </div>

                        <div class="cart_listing">
                            <ul>
                                <?php
                                if(count($orders) > 0){
                                foreach ($orders as $order){
                                ?>
                                <li class="clearfix">
                                    <div class="shirt_colmn_list" style="padding: 38px 0 15px 11px !important;">
                                        <img class="hide"
                                             src="<?php echo URL::to('public/assets/client/images/list_shirt_img.png');?>"
                                             alt="#"/>
                                        <a href="<?= URL::to('order/detail/'.$order->ID.'');?>">
                                        <?=$order->Code;?>
                                        </a>
                                    </div>
                                    <div class="product_colmn_list hide">
                                        <label>Simple Groom Style Shirt</label>
                                        <p>lorem 1 + 3.5 ipswm, 25 ipswm </p>
                                    </div>
                                    <div class="product_colmn_list">
                                        <label>Thank you for your business. We have received your order.</label>
                                    </div>
                                    <div class="product_colmn_list price_colmn_list">
                                        <b>$<?=number_format($order->Amount,2);?></b>
                                    </div>
                                    <div class="product_colmn_list orderId">
                                        <h5><?php echo date('d F Y', strtotime($order->DeliveryDate));?></h5>
                                    </div>
                                    <div class="bttnz_two">
                                        <a style="display: none !important;" href="javascript:void(0)"> Return Order</a>
                                        <a style="display: none !important;" href="javascript:void(0)">Re Order</a>
                                        <a href="<?= URL::to('order/detail/'.$order->ID.'');?>">Detail</a>
                                    </div>
                                </li>
                                <?php
                                }
                                }
                                ?>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection