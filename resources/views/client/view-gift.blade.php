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
                            <h4 style="clear: both">Your Gift Card will be delivered instantly via email.</h4>

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
                                    <input id="giftAmountText" type="hidden" name="giftAmount"
                                           value="{{csrf_token()}}"/>
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
                                                <textarea id="setMessageHere" name="purMsg"></textarea>
                                            </li>
                                            <li><input id="nextToPayment" class="giftCardBtn" type="button"
                                                       value="Next"/></li>
                                        </ul>
                                    </div>

                                    <div id="Paris" class="tabcontent">
                                        <div class="containerBox">
                                            <div class="text-box">
                                                <h4 id="recNameSet">Abdul Rafay</h4>
                                            </div>
                                            <div class="text-box-1">
                                                <h4 style="">$<span id="giftAmountSet">100</span></h4>
                                            </div>
                                            <img class="img-responsive"
                                                 src="<?= URL::to('public/assets/client/images/gift-card-preview.jpg'); ?>"/>
                                        </div>
                                        <br/>
                                        <br/>
                                        <span id="setMessage"></span>
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
                                <p>Finding the perfect gift can be tough. Which is exactly why we offer gift cards. 
                                   They make great presents for relatives and friends, and are fantastic way to thank 
                                   someone special. They're always the right size and color, too. We can email the gift 
                                   card to you and your intended recipient in seconds. Order your Gift Card Today.

                                </p>
                                    <p>Send the eGift Card to a friend or family via email. It will be typically
                                    delivered within a minute. For your convinience a copy of the ectronic gift
                                    card will be sent you you as well.
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
