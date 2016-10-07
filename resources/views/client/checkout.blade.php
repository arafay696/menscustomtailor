@extends('client.default')
@section('content')
    <div class="container">
        <div class="cart_container back_background">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head clearfix">
                        <h3>Checkout </h3>
                    </div>

                    <div class="hide login_register_outer clearfix">
                        <div class="login_dtail">
                            <h4>Returning customer? </h4>
                            <p>If you have shopped with us before, please enter your details in the boxes below. If
                                you are a new customer please proceed to the Billing &amp; Shipping section.</p>

                            <div class="login_form">
                                <ul>
                                    <li><input type="text" value="" placeholder="Username or email address *"/></li>
                                    <li><input type="password" value="" placeholder="Password *"/></li>
                                </ul>
                            </div>


                            <div class="login_pasww clearfix">
                                <input type="submit" value="Login"/>
                                <a href="#">Lost your password?</a>
                            </div>
                        </div>


                        <div class="login_dtail fr_section">
                            <h4>New User</h4>
                            <p>If you have shopped with us before, please enter your details in the boxes below. If
                                you are a new customer please proceed to the Billing &amp; Shipping section.</p>

                            <br>

                            <div class="login_pasww clearfix">
                                <input type="submit" value="Register Now"/>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

                    <form method="post" class="form"
                          action="<?php echo URL::to(($goToPaypal) ? 'payment' : 'finish') ?>">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input id="ShippingHidden" type="hidden" name="ShippingHidden"
                               value="<?=$ShipCharges;?>">
                        <input type="hidden" name="offerType" id="offerType" value="<?=$discountType;?>"/>
                        <input type="hidden" name="setDiscountAmount" value="<?=$discountAmount;?>"/>

                        <div class="login_register_outer borderBlack clearfix">
                            <div class="login_dtail">
                                <h4>BILLING DETAILS</h4>

                                <div class="checkOut_form">
                                    <ul>
                                        <li class="clearfix">
                                            <div class="custom_chkout_input">
                                                <label>FIRST NAME *</label>
                                                <input name="FirstName" type="text" value="<?=$Customer->Name;?>"
                                                       placeholder=""/>
                                            </div>
                                            <div class="custom_chkout_input">
                                                <label>LAST NAME *</label>
                                                <input name="LastName" type="text" value="<?=$Customer->Name;?>"
                                                       placeholder=""/>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="custom_chkout_input">
                                                <label>EMAIL ADDRESS *</label>
                                                <input name="Email" type="email" value="<?=$Customer->Email;?>"
                                                       placeholder=""/>
                                            </div>
                                            <div class="custom_chkout_input">
                                                <label>PHONE *</label>
                                                <input name="Phone" type="text" value="<?=$Customer->Phone;?>"
                                                       placeholder=""/>
                                            </div>
                                        </li>
                                        <li class="clearfix single_list">
                                            <div class="custom_chkout_input">
                                                <label>ADDRESS * *</label>
                                                <input name="Address" type="text" value="<?=$Customer->Address;?>"
                                                       placeholder=""/>
                                            </div>
                                        </li>
                                        <li class="clearfix single_list">
                                            <div class="custom_chkout_input">
                                                <label>Country *</label>
                                                <input name="Country" type="text" value="<?=$Customer->Country;?>"
                                                       placeholder=""/>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <div class="ship_to_adress">
                                    <div class="hide servicesTerm">
                                        <p> SHIP TO A DIFFERENT ADDRESS?</p>
                                        <label><input type="checkbox"></label>
                                    </div>

                                    <div class="order_notes">
                                        <label>ORDER NOTES</label>
                                        <textarea name="Comments"></textarea>
                                    </div>


                                </div>
                            </div>


                            <div class="login_dtail fr_section">
                                <h4>YOUR ORDER</h4>

                                <div class="my_orderDtail_outr clearfix">

                                    <div class="order_pic">
                                    <span><img src="<?php echo URL::to('public/assets/client/images/colrr_full_img.png');?>"
                                               alt="#"/></span>
                                    </div>

                                    <div class="my_orderDtail">
                                        <ul>
                                            <li class="clearfix">
                                                <h5>PRODUCT</h5>
                                                <h6>Total</h6>
                                            </li>
                                            <?php
                                            if(count($CartData) > 0){
                                            $TotalPrice = 0;
                                            foreach($CartData as $item){
                                            ?>
                                            <li class="clearfix">
                                                <p><?=$item['ProductName'];?>(<?=$item['Qty'];?>)</p>
                                                <strong class="numberFont">
                                                    $
                                                    <?php
                                                    $pr = $item['Price'] * $item['Qty'];
                                                    $TotalPrice += $pr;
                                                    ?>
                                                    <?=number_format($pr, 2);?>
                                                </strong>
                                            </li>
                                            <?php
                                            }}
                                            ?>
                                            <li class="clearfix">
                                                <h5>Cart Subtotal</h5>
                                                <h6 class="numberFont">$<?=number_format($TotalPrice, 2);?></h6>
                                            </li>
                                            <li class="<?= ($showDiscountField) ? '' : 'hide';?>">
                                                <h5><?=$discountType;?></h5>
                                                <h6 class="numberFont">-$<?=number_format($discountAmount, 2);?></h6>
                                            </li>
                                            <li class="clearfix">
                                                <p>Shipping</p>
                                                <strong class="numberFont">$<?=$ShipCharges;?></strong>
                                            </li>
                                            <li class="clearfix">
                                                <h5>Order Total</h5>
                                                <h6 class="numberFont">
                                                    $<?=number_format(($TotalPrice - $discountAmount) + $ShipCharges, 2);?></h6>
                                            </li>
                                        </ul>
                                    </div>

                                    <div style="clear: both;margin-top: 5px;">
                                        <?php if($goToPaypal){ ?>
                                        <br/>
                                        <br/>
                                        <h4>payment</h4>
                                        <div class="check_oyr_paypal">
                                            <div class="hide artistProducer clearfix">
                                                <label><input type="radio" name="producer"> Cheque Payment</label>

                                                <div class="paypal_txt">
                                                    <p>Please send your cheque to Store Name, Store Street, Store Town,
                                                        Store
                                                        State / County, Store Postcode. </p>
                                                    <i>&nbsp;</i>
                                                </div>
                                            </div>


                                            <div class="artistProducer clearfix">
                                                <label class="select">
                                                    <input type="radio" name="ShipMethod" value="PayPal "
                                                           checked="checked">
                                                    PayPal <img
                                                            src="<?php echo URL::to('public/assets/client/images/paypal_img.png');?>"
                                                            alt="#"/>
                                                </label>
                                            </div>

                                        </div>
                                        <?php } ?>


                                        <div class="placeOrder">
                                            <button type="submit">
                                                <?php echo ($goToPaypal) ? 'Place order' : 'Finish'; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection