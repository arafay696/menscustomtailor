@extends('client.default')
@section('content')
    <div class="container">
        <div class="cart_container back_background">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head clearfix">
                        <h3>Checkout </h3>
                    </div>

                    <div class="login_register_outer clearfix">
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


                    <div class="login_register_outer borderBlack clearfix">
                        <div class="login_dtail">
                            <h4>BILLING DETAILS</h4>

                            <div class="checkOut_form">
                                <ul>
                                    <li class="clearfix">
                                        <div class="custom_chkout_input">
                                            <label>FIRST NAME *</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                        <div class="custom_chkout_input">
                                            <label>LAST NAME *</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                    </li>
                                    <li class="clearfix single_list">
                                        <div class="custom_chkout_input">
                                            <label>COMPANY NAME</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="custom_chkout_input">
                                            <label>EMAIL ADDRESS *</label>
                                            <input type="email" value="" placeholder=""/>
                                        </div>
                                        <div class="custom_chkout_input">
                                            <label>PHONE *</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="custom_chkout_input">
                                            <label>COUNTRY *</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                        <div class="custom_chkout_input">
                                            <label>PHONE *</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                    </li>
                                    <li class="clearfix single_list">
                                        <div class="custom_chkout_input">
                                            <label>ADDRESS * *</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="custom_chkout_input">
                                            <label>TOWN / CITY *</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                        <div class="custom_chkout_input">
                                            <label>PHONE *</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="custom_chkout_input">
                                            <label>STATE / COUNTY *</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                        <div class="custom_chkout_input">
                                            <label>POSTCODE / ZIP *</label>
                                            <input type="text" value="" placeholder=""/>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="ship_to_adress">
                                <div class="servicesTerm">
                                    <p> SHIP TO A DIFFERENT ADDRESS?</p>
                                    <label><input type="checkbox"></label>
                                </div>

                                <div class="order_notes">
                                    <label>ORDER NOTES</label>
                                    <textarea></textarea>
                                </div>

                                <h4>payment</h4>
                                <div class="check_oyr_paypal">
                                    <div class="artistProducer clearfix">
                                        <label><input type="radio" name="producer"> Cheque Payment</label>

                                        <div class="paypal_txt">
                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store
                                                State / County, Store Postcode. </p>
                                            <i>&nbsp;</i>
                                        </div>
                                    </div>

                                    <div class="artistProducer clearfix">
                                        <label><input type="radio" name="producer"> PayPal <img
                                                    src="<?php echo URL::to('public/assets/client/images/paypal_img.png');?>"
                                                    alt="#"/></label>
                                    </div>
                                </div>


                                <div class="placeOrder">
                                    <a href="#">Place order</a>
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
                                        <li class="clearfix">
                                            <p>Shirt Sample PRo</p>
                                            <strong>$100</strong>
                                        </li>
                                        <li class="clearfix">
                                            <p>Shirt Sample PRo</p>
                                            <strong>$100</strong>
                                        </li>
                                        <li class="clearfix">
                                            <p>Shirt Sample PRo</p>
                                            <strong>$100</strong>
                                        </li>
                                        <li class="clearfix">
                                            <p>Shirt Sample PRo</p>
                                            <strong>$100</strong>
                                        </li>
                                        <li class="clearfix">
                                            <h5>Cart Subtotal</h5>
                                            <h6>$400</h6>
                                        </li>
                                        <li class="clearfix">
                                            <p>Shipping</p>
                                            <strong>Free Shipping</strong>
                                        </li>
                                        <li class="clearfix">
                                            <h5>Order Total</h5>
                                            <h6>$400</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection