@extends('client.default')
@section('content')
    <div class="container">
        <div class="cart_container">
            <div class="auto_content">
                <div class="cart_pageDtail">
                    <div class="cart_head border_header clearfix">
                        <h3>GIFT CARD</h3>
                    </div>

                    <div class="contact_container clearfix">
                        <div class="contact_form giftLEft">
                            <h4>Select a value or enter an amount.</h4>
                            <div class="gift_amount">
                                <h5>USD &dollar;</h5>
                                <input id="giftAmount" type="number" name="amount" value="100" required>
                                <ul class="chooseAmount">
                                    <li id="25">&dollar;25</li>
                                    <li id="50">&dollar;50</li>
                                    <li id="100" class="active">&dollar;100</li>
                                    <li id="500">&dollar;500</li>
                                </ul>
                            </div>
                            <ul class="gift_note">
                                <li>Enter a amount between &dollar;10 - &dollar;500 USD.</li>
                            </ul>
                            <h4 style="clear: both">HOW WOULD YOU LIKE TO DELEIVER YOUR GIFT CARD.</h4>

                            <div class="giftCardTab">
                                <ul class="tab">
                                    <li><a id="defaultClick" href="#" class="tablinks active"
                                           onclick="openCity(event, 'London')">EMAIL</a></li>
                                    <li><a id="finishStep" href="#" class="tablinks" onclick="openCity(event, 'Paris')">Preview</a>
                                    </li>
                                    <li class="hide"><a href="#" class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</a>
                                    </li>
                                </ul>

                                <form method="post" class="form" action="<?php echo URL::to('gift/payment') ?>">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input id="giftAmountText" type="hidden" name="giftAmount" value="{{csrf_token()}}"/>
                                    <div id="London" class="tabcontent" style="display: block;">
                                        <h3 style="font-weight: bold;margin: 7px 0;">To</h3>
                                        <ul>
                                            <li>
                                                <label>* Recipient Name</label>
                                                <input name="recName" id="recName" type="text" value="" required/>
                                            </li>
                                            <li>
                                                <label>* Recipient Email</label>
                                                <input name="recEmail" type="email" value="" required/>
                                            </li>
                                        </ul>
                                        <h3 style="font-weight: bold;margin: 7px 0;">From</h3>
                                        <ul>
                                            <li>
                                                <label>* Purchaser Name</label>
                                                <input name="purName" id="purchaseName" type="text" value="" required/>
                                            </li>
                                            <li>
                                                <label>* Purchaser Email</label>
                                                <input name="purEmail" type="email" value="" required/>
                                            </li>
                                            <li>
                                                <label>Message</label>
                                                <textarea name="purMsg"></textarea>
                                            </li>
                                            <li><input id="nextToPayment" class="giftCardBtn" type="button"
                                                       value="Next"/></li>
                                        </ul>
                                    </div>

                                    <div id="Paris" class="tabcontent">
                                        <h3 style="width: 100%;font-size: 18px;padding-left: 67px;">
                                            <img src="<?= URL::to('public/assets/client/images/gift-card-preview.jpg'); ?>" />
                                            <span style="font-weight: bold; position: relative; top: -255px; left: 155px;" id="recNameSet">

                                            </span>
                                            <span style="font-weight: bold; position: relative; font-size: 43px; left: 53px; top: -129px;">
                                                $<span id="giftAmountSet">100</span>
                                            </span>.

                                            <br/>
                                            <br/>
                                            Thank you.
                                        </h3>
                                        <input id="nextToPayment" class="giftCardBtn" type="submit" value="Checkout"/>
                                    </div>
                                </form>

                                <div id="Tokyo" class="tabcontent">
                                    <h3>Tokyo</h3>
                                    <p>Tokyo is the capital of Japan.</p>
                                </div>

                            </div>
                        </div>

                        <div class="contact_map_section">
                            <div class="contact_info">
                                <h4>Email Delivey</h4>
                                <p>Send the eGift Card to your friend's email inbox. It will be typically
                                    delivered within minute. You'll be notified as soon as your friend view
                                    your gift.
                                </p>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

        </script>
    </div>
@endsection
