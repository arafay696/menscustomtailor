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
                            <li><a href="<?php echo URL::to('measurements');?>">MY MEASUREMENTS</a></li>
                            <li><a href="<?php echo URL::to('newsletter');?>">NEWSLETTER</a></li>
                        </ul>
                    </div>
                    <br><br><br>

                    <div class="cart_listing_outer order_view">
                        <div class="cart_listing_head clearfix">
                            <div class="empty_colmn"><h5>Order #</h5></div>
                            <div class="product_colmn"><h5>Order Status</h5></div>
                            <div class="product_colmn total_colmn"><h5>Total</h5></div>
                            <div class="product_colmn price_colmn"><h5>Order Date</h5></div>
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
                                        <a href="<?= URL::to('order/detail/' . $order->ID . '');?>">
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
                                        <b>$<?=number_format($order->Amount, 2);?></b>
                                    </div>
                                    <div class="product_colmn_list orderId">
                                        <h5><?php echo date('d F Y', strtotime($order->OrderDate));?></h5>
                                    </div>
                                    <div class="bttnz_two">
                                        <i class="updateCartSpin hide fa fa-spinner fa-spin"></i>
                                        <a id="<?=$order->ID;?>" class="generatePdf" href="javascript:void(0);"> Print PDF</a>
                                        <a style="display: none !important;" href="javascript:void(0)">Re Order</a>
                                        <a href="<?= URL::to('order/detail/' . $order->ID . '');?>">Detail</a>
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

                <!--Invoice PDF-->
                <div style="opacity:0;" id="pdfInvoice" class="cart_pageDtail">
                    <div style="width: 100%;clear: both;overflow: hidden;margin-bottom: 10px;">
                        <span style="width:45%;float: left;">
                            <img style="float: left;" src="<?= URL::to('public/assets/client/images/header_logo.png');?>">
                        </span>
                        <h1 style="width: 10%;float: left;font-weight: bold;">Invoice</h1>
                            <h2 style="width: 10%;float: right;">Order # <b id="setOrderID"></b></h2>
                    </div>

                    <div class="customerDetailInvoice">
                        <table>
                            <tr>
                                <th>Customer Name</th>
                                <td><?=$user->Name;?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?=$user->Address;?></td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td class="specialClass"><?=$user->City;?></td>
                            </tr>
                            <tr>
                                <th>State</th>
                                <td><?=$user->Country;?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?=$user->Phone;?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?=$user->Email;?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="cart_listing_outer">
                        <div class="cart_listing_head clearfix">
                            <div class="empty_colmn">&nbsp;</div>
                            <div class="product_colmn"><h5>PRODUCT</h5></div>
                            <div class="product_colmn price_colmn"><h5>Price</h5></div>
                            <div class="product_colmn q_colmn"><h5>Quantity</h5></div>
                            <div class="product_colmn total_colmn"><h5>Total</h5></div>
                        </div>

                        <div class="cart_listing">
                            <ul id="appendElements">

                            </ul>
                        </div>

                        <div class="shopping_total clearfix">

                            <div class="subtotal_dtail">
                                <ul>
                                    <li class="clearfix">
                                        <span>Subtotal</span>
                                        <strong>$<b id="setSubTotal" 750></b></strong>
                                    </li>
                                    <li class="clearfix">
                                        <span>Discount</span>
                                        <strong>$<b id="setDiscount">0</b></strong>
                                    </li>
                                    <li class="clearfix">
                                        <span>Shipping</span>
                                        <strong>$<b id="setShipping"></b></strong>
                                    </li>
                                    <li class="clearfix">
                                        <span>TOTAL</span>
                                        <strong>$<b id="setTotal"></b></strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="hide" id="SetImage" />

            </div>
        </div>
    </div>
@endsection