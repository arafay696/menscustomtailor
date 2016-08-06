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

                    <div class="cart_listing_outer">
                        <div class="cart_listing_head clearfix">
                            <div class="empty_colmn">&nbsp;</div>
                            <div class="product_colmn"><h5>PRODUCT</h5></div>
                            <div class="product_colmn price_colmn"><h5>Price</h5></div>
                            <div class="product_colmn q_colmn"><h5>Quantity</h5></div>
                            <div class="product_colmn total_colmn"><h5>Total</h5></div>
                        </div>
                        <?php if(is_array($cart) && !empty($cart)) { ?>
                        <div class="cart_listing">
                            <ul>
                                <?php
                                foreach ($cart as $cartItem) { ?>
                                    <li class="clearfix">
                                    <div class="shirt_colmn_list">
                                        <img src="<?php echo URL::to('resources/assets/images/' . $cartItem['ProductImage']); ?>"
                                             alt="#"/>
                                    </div>
                                    <div class="product_colmn_list">
                                        <label><?=$cartItem['ProductName'];?></label>
                                        <p>lorem 1 + 3.5 ipswm, 25 ipswm </p>
                                    </div>
                                    <div class="product_colmn_list price_colmn_list">
                                        <b>$<?=$cartItem['Price'];?></b>
                                    </div>
                                    <div class="product_colmn_list q_colmn_list">
                                        <input type="number" value="1"/>
                                    </div>
                                    <div class="product_colmn_list total_colmn_list">
                                        <h5>$250</h5>
                                    </div>
                                    <div class="del_icon">
                                        <a href="javascript:void(0)">&nbsp;</a>
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
                            <a href="#">Continue Shopping</a>

                            <div class="subtotal_dtail">
                                <ul>
                                    <li class="clearfix">
                                        <span>Subtotal</span>
                                        <strong>$750</strong>
                                    </li>
                                    <li class="clearfix">
                                        <span>Shipping</span>
                                        <strong>Free Shipping</strong>
                                    </li>
                                    <li class="clearfix">
                                        <span>TOTAL</span>
                                        <strong>$750</strong>
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
                </div>
            </div>
        </div>
    </div>
@endsection