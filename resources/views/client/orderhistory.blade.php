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
                                        <a id="<?=$order->ID;?>" class="generatePdf2"
                                           href="<?= URL::to('generate-pdf/' . $order->ID); ?>"> Print PDF</a>
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
                <div style="opacity:0;" id="pdfInvoice" class="cart_pageDtail hide">
                    <div style="width: 100%; clear: both; overflow: hidden; margin-bottom: 10px; padding: 0px 11px 7px; border-bottom: 2px solid rgb(221, 221, 221);">
                        <span style="width:45%;float: left;">
                            <img style="float: left;"
                                 src="<?= URL::to('public/assets/client/images/header_logo.png');?>">
                        </span>
                        <h1 style="width: 10%;float: left;font-weight: bold;">Invoice</h1>
                    </div>
                    <div class="companyDetail"
                         style="padding-bottom: 7px;border-bottom: 2px solid #eee;overflow: hidden">
                        <p>
                            Men's Custom Tailor
                            <br/>
                            2523 Ferndale Ln. <br/> Snellville, GA 30078
                        </p>
                        <p></p>
                        <p style="text-align: right">
                            <strong>Order No. <b id="setOrderID"></b></strong>
                            <br/>
                            <strong style="top: 26px; position: relative;">Order Date: </strong>
                            <span style="top: 26px; position: relative;" id="OrderDate"></span>
                        </p>
                    </div>
                    <div class="companyDetail">
                        <p>
                            <strong>Phone: </strong> (678) 740-3530
                            <br/>
                            <strong>Email: </strong> info@menscustomtailor.com
                            <br/>
                        </p>
                        <p>
                            <strong>Customer Contact: </strong> <?=$user->Name;?>
                            <br/>
                            <strong>Email: </strong> <?=$user->Email;?>
                        </p>
                        <p style="text-align: right">
                            <strong>Phone: </strong> <?=$user->Phone;?>
                        </p>
                    </div>
                    <div class="otherDetail">
                        <div class="billTo">
                            <h3>Bill To:</h3>
                            <br/>
                            <strong><?=$user->Name;?></strong>
                            <br/>
                            <?=$user->Address;?>
                        </div>
                        <div class="shipTo">
                            <h3>Ship To:</h3>
                            <br/>
                            <ul>
                                <li>
                                    <strong>Neck Size: </strong>
                                    &nbsp;&nbsp; <?=(isset($size->NeckSize)) ? $size->NeckSize : '';?>
                                </li>
                                <li>
                                    <strong>Chest Size: </strong>
                                    &nbsp;&nbsp; <?= (isset($size->Chest)) ? $size->Chest : '';?>
                                </li>
                                <li>
                                    <strong>Sleeve Length: </strong>
                                    &nbsp;&nbsp; <?= (isset($size->LeftSleeve)) ? $size->LeftSleeve : '';?>
                                </li>
                                <li>
                                    <strong>Waist: </strong> &nbsp;&nbsp; <?= (isset($size->Waist)) ? $size->Waist : '';?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br/>
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
                <form method="post" name="coupong"
                      action="<?=URL::to('verifyDiscountCoupon');?>">
                    <input id="postToken" type="hidden" name="_token" value="{{csrf_token()}}"/>
                </form>
                <img class="hide-ds" id="SetImage"/>

            </div>
        </div>
    </div>
@endsection