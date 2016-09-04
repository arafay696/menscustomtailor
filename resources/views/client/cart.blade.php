@extends('client.default')
@section('content')
    <div class="container">
        <div class="cart_container">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head clearfix">
                        <h3>Cart <i style=";" class="updateCartSpin hide fa fa-spinner fa-spin"></i></h3>
                        <a class="updateCart disableUpdateCart" href="javascript:void(0);   ">update cart</a>
                        <form id="DurationForm" method="post" action="<?=URL::to('cart/update-price');?>">
                            <input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                    <div class="saveChangesMsg hide alert alert-warning fade in">
                        <strong>Alert!</strong> Please update your cart to save current changes.
                    </div>
                    <div class="saveChangesSuccesMsg hide alert alert-success fade in">
                        <strong>Thank you!</strong> Your setting saved.
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
                                <ul class="cartItems">
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
                                                $<span class="ActualPrice"><?=$cartItem['Price'];?></span>
                                            </b>
                                        </div>
                                        <div class="product_colmn_list q_colmn_list">
                                            <input class="updateQty" type="number" value="<?=$cartItem['Qty'];?>"/>
                                            <input name="ProductQty[]" type="hidden" value="<?=$cartItem['Qty'];?>"/>
                                        </div>
                                        <div class="product_colmn_list total_colmn_list">
                                            <h5>$<?php
                                                $pr = $cartItem['Price'] * $cartItem['Qty'];
                                                $TotalPrice += $pr;
                                                ?><span class="TotalProductPrice">
                                                    <?=number_format($pr, 2);?>
                                                </span>
                                            </h5>
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
                                            <strong id="SubTotal">$<?=number_format($TotalPrice, 2);?></strong>
                                        </li>
                                        <li class="clearfix">
                                            <span>Shipping</span>
                                            <strong>Free Shipping</strong>
                                        </li>
                                        <li class="clearfix">
                                            <span>TOTAL</span>
                                            <strong>
                                                $<b id="TotalAmount"><?=number_format($TotalPrice, 2);?></b>
                                                <input id="TotalAmountHidden" type="hidden" name="Amount"
                                                       value="<?=number_format($TotalPrice, 2);?>">
                                                <input type="hidden" name="Shipping" value="0">
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