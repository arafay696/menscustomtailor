@extends('client.default')
@section('content')
    <div class="container">
        <div class="cart_container">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head clearfix">
                        <h3>Cart</h3>
                        <a href="#">update cart</a>
                    </div>
                    <!-- cart/save -->
                    <form method="post" class="form" action="<?php echo URL::to('cart/save') ?>">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="cart_listing_outer">
                            <div class="cart_listing_head clearfix">
                                <div class="empty_colmn">&nbsp;</div>
                                <div class="product_colmn"><h5>PRODUCT</h5></div>
                                <div class="product_colmn price_colmn"><h5>Price</h5></div>
                                <div class="product_colmn q_colmn"><h5>Quantity</h5></div>
                                <div class="product_colmn total_colmn"><h5>Total</h5></div>
                            </div>
                            <?php
                            $TotalPrice = 0;
                            if(is_array($cart) && !empty($cart)) { ?>
                            <div class="cart_listing">
                                <ul>
                                    <?php
                                    foreach ($cart as $key => $cartItem) { ?>
                                    <li class="clearfix">
                                        <div class="shirt_colmn_list">
                                            <img src="<?php echo URL::to('resources/assets/images/' . $cartItem['ProductImage']); ?>"
                                                 alt="#"/>
                                        </div>
                                        <div class="product_colmn_list">
                                            <label><?=$cartItem['ProductName'];?></label>
                                            <p>lorem 1 + 3.5 ipswm, 25 ipswm </p>
                                            <div class="diffrent_icon clearfix">
                                                <a href="<?php echo URL::to('fabric/' . $cartItem['productID'] . '');?>">
                                                    Change Style
                                                </a>
                                                <a href="<?php echo URL::to('fabric/' . $cartItem['productID'] . '');?>">
                                                    Change Shirt Size
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product_colmn_list price_colmn_list">
                                            <b>
                                                $<?=$cartItem['Price'];?>
                                            </b>
                                        </div>
                                        <div class="product_colmn_list q_colmn_list">
                                            <input type="number" value="<?=$cartItem['Qty'];?>"/>
                                        </div>
                                        <div class="product_colmn_list total_colmn_list">
                                            <h5>$<?php
                                                $pr = $cartItem['Price']*$cartItem['Qty'];
                                                $TotalPrice += $pr;
                                                echo $pr;
                                                ?></h5>
                                        </div>
                                        <div class="del_icon">
                                            <a href="<?=URL::to('cart/remove/' . $key . '');?>">&nbsp;</a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } else { ?>
                            <div class="cart_listing cartEmpty">
                                <ul>
                                    <li class="clearfix">
                                        <div class="shirt_colmn_list">
                                            <p>Empty Cart</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <?php } ?>
                            <div class="shopping_total clearfix">
                                <a href="<?php echo URL::to('fabric');?>">Continue Shopping</a>

                                <div class="subtotal_dtail">
                                    <ul>
                                        <li class="clearfix">
                                            <span>Subtotal</span>
                                            <strong>$<?=$TotalPrice;?></strong>
                                        </li>
                                        <li class="clearfix">
                                            <span>Shipping</span>
                                            <strong>Free Shipping</strong>
                                        </li>
                                        <li class="clearfix">
                                            <span>TOTAL</span>
                                            <strong>
                                                $<?=$TotalPrice;?>
                                                <input type="hidden" name="TotalPrice" value="750">
                                                <input type="hidden" name="Amount" value="750">
                                                <input type="hidden" name="Shipping" value="15">
                                            </strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="discount_gift_cards clearfix">
                            <div class="discount_gift">
                                <ul>
                                    <li>
                                        <label>Discount Code</label>
                                        <div class="discount_inputs clearfix">
                                            <input type="text" value=""/>
                                            <input type="submit" value="Apply Coupon"/>
                                        </div>
                                    </li>

                                    <li>
                                        <label>Gift Card</label>
                                        <div class="discount_inputs clearfix">
                                            <input type="text" value=""/>
                                            <input type="submit" value="Add Gift Card"/>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="proceed_checkout">
                                <input type="submit" value="Proceed to Checkout"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection