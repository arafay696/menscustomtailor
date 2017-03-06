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
                        <input type="hidden" name="offerType" id="offerType" value=""/>
                        <input type="hidden" name="setDiscountAmount" id="setDiscountAmount" value="0"/>
                        <input type="hidden" name="setCoupon" id="setCoupon" value=""/>
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
                            $qty = 0;
                            $shippingCharges = 0;
                            if(is_array($cart) && !empty($cart)) { ?>
                            <div class="cart_listing">
                                <ul class="cartItems">
                                    <?php
                                    foreach ($cart as $key => $cartItem) {
                                    $qty += $cartItem['Qty'];
                                    ?>
                                    <li class="clearfix">
                                        <div class="shirt_colmn_list">
                                            <img src="<?php echo URL::to('resources/assets/images/' . $cartItem['ProductImage']); ?>"
                                                 alt="#"/>
                                        </div>
                                        <div class="product_colmn_list">
                                            <label><?=$cartItem['ProductName'];?></label>
                                            <p>
                                                <b style="display: inline-block;">Shirt Detail:</b>
                                                <?= (isset($cartItem['collarType'])) ? $cartItem['collarType'] . ',' : '';?>
                                                <?= (isset($cartItem['cuffStyle'])) ? $cartItem['cuffStyle'] . ',' : '';?>
                                                <?= (isset($cartItem['frontStyle'])) ? $cartItem['frontStyle'] . ',' : '';?>
                                                <?= (isset($cartItem['pocketStyle'])) ? $cartItem['pocketStyle'] : '';?>
                                                <?php if ((!isset($cartItem['collarType']) || $cartItem['collarType'] == '') && (!isset($cartItem['cuffStyle']) || $cartItem['cuffStyle'] == '') && (!isset($cartItem['frontStyle']) || $cartItem['frontStyle'] == '') && (!isset($cartItem['pocketStyle']) || $cartItem['pocketStyle'] == '')) {
                                                    echo 'Missing Detail';
                                                } ?>
                                            </p>
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
                                                $<span class="ActualPrice numberFont"><?=$cartItem['Price'];?></span>
                                            </b>
                                        </div>
                                        <div class="product_colmn_list q_colmn_list">
                                            <input class="updateQty numberFont" type="number" value="<?=$cartItem['Qty'];?>"/>
                                            <input name="ProductQty[]" type="hidden" value="<?=$cartItem['Qty'];?>"/>
                                        </div>
                                        <div class="product_colmn_list total_colmn_list">
                                            <h5>$<?php
                                                $pr = $cartItem['Price'] * $cartItem['Qty'];
                                                $TotalPrice += $pr;
                                                ?><span class="TotalProductPrice numberFont">
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

                                <?php if(is_array($cart) && count($cart) > 0) { ?>
                                <div class="subtotal_dtail">
                                    <ul>
                                        <li class="clearfix">
                                            <span>Subtotal</span>
                                            <strong class="numberFont" id="SubTotal">$<?=number_format($TotalPrice, 2);?></strong>
                                        </li>
                                        <li class="clearfix hide showDiscountDetail">
                                            <span>Discount</span>
                                            <strong class="numberFont">-$<b id="DiscountAmount">0</b></strong>
                                        </li>
                                        <li class="clearfix hide showGCardDetail">
                                            <span>Gift Card</span>
                                            <strong class="numberFont">-$<b id="GiftCardAmount">0</b></strong>
                                        </li>
                                        <li class="clearfix">
                                            <span>Country</span>
                                            <div class="customselect">
                                                <span style="border-right: none;">United States</span>
                                            <select class="cs" name="country" id="slctCountry">
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Åland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia, Plurinational State of</option>
                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Bouvet Island</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CD">Congo, the Democratic Republic of the</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Côte d'Ivoire</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CW">Curaçao</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Territories</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HM">Heard Island and McDonald Islands</option>
                                                <option value="VA">Holy See (Vatican City State)</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran, Islamic Republic of</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                <option value="KR">Korea, Republic of</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia, Federated States of</option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PS">Palestinian Territory, Occupied</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">Réunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint Barthélemy</option>
                                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="MF">Saint Martin (French part)</option>
                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SX">Sint Maarten (Dutch part)</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syrian Arab Republic</option>
                                                <option value="TW">Taiwan, Province of China</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US" selected="selected">United States</option>
                                                <option value="UM">United States Minor Outlying Islands</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                <option value="VN">Viet Nam</option>
                                                <option value="VG">Virgin Islands, British</option>
                                                <option value="VI">Virgin Islands, U.S.</option>
                                                <option value="WF">Wallis and Futuna</option>
                                                <option value="EH">Western Sahara</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                                </div>
                                        </li>
                                        <li class="clearfix">
                                            <span>Shipping Method</span>
                                            <div class="customselect">
                                                <span id="setShipMethodCntry" style="border-right: none;">USPS Priority</span>
                                                <select id="ShipMethod" size="1" name="ShipMethod">
                                                    <option value="USPS Priority">USPS Priority</option>
                                                    <option value="USPS Next Day">USPS Next Day</option>
                                                    <option value="International Global Priority" disabled="disabled">
                                                        International Global Priority
                                                    </option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span>Shipping</span>
                                            <strong class="numberFont" id="ShippCharges"><?php
                                                if ($qty > 0) {
                                                    $shippingCharges = array_key_exists($qty - 1,$USPSPriority) ? $USPSPriority[$qty - 1] : end($USPSPriority);
                                                    $TotalPrice = $TotalPrice + $shippingCharges;
                                                    echo $shippingCharges;
                                                }
                                                ?></strong>
                                        </li>
                                        <li class="clearfix">
                                            <span>TOTAL</span>
                                            <strong class="numberFont">
                                                $<b id="TotalAmount"><?=number_format($TotalPrice, 2);?></b>
                                                <input id="TotalAmountHidden" type="hidden" name="Amount"
                                                       value="<?=number_format($TotalPrice, 2);?>">
                                                <input id="ShippingHidden" type="hidden" name="ShippingHidden"
                                                       value="<?=$shippingCharges;?>">
                                                <input id="ShippingMethodHidden" type="hidden"
                                                       name="ShippingMethodHidden"
                                                       value="USPS Priority">
                                            </strong>
                                        </li>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if(is_array($cart) && count($cart) > 0) { ?>
                        <div class="discount_gift_cards clearfix">
                            <div class="discount_gift">
                                <div class="errorCoupon hide alert alert-warning fade in">
                                    <strong>Alert!</strong> Coupon code invalid or already used.
                                </div>
                                <div class="SuccesCouponMsg hide alert alert-success fade in">
                                    <strong>Yahoo!</strong> Coupon code applied.
                                </div>
                                <ul>
                                    <li class="chooseWantFitShirt <?=($qty >= 2) ? '' : 'hide'; ?>">
                                        <label>
                                            <input name="wantFitShirt" value="" type="radio" checked="checked">
                                            I don't want fit shirt
                                        </label>
                                        <label>
                                            <input name="wantFitShirt" type="radio" value="fit">
                                             I want fit shirt
                                        </label>
                                    </li>
                                    <li class="applyDiscountHere">
                                        <label>Discount Code</label>
                                        <div class="discount_inputs clearfix">
                                            <form method="post" name="coupong"
                                                  action="<?=URL::to('verifyDiscountCoupon');?>">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                <input id="discountCoupon" type="text" value=""/>
                                                <input id="checkDiscountCoupon" type="button" value="Apply Coupon"/>
                                                <i id="waitDCounpon" class="hide fa fa-spinner fa-spin fa-2x"></i>
                                            </form>

                                        </div>
                                    </li>

                                    <li class="applyGCardHere">
                                        <label>Gift Card Code</label>
                                        <div class="discount_inputs clearfix">
                                            <input id="giftCoupon" type="text" value=""/>
                                            <input id="checkGiftCardCoupon" type="button" value="Use Gift Card"/>
                                            <i id="waitGCounpon" class="hide fa fa-spinner fa-spin fa-2x"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="proceed_checkout">
                                <input type="submit" value="Proceed to Checkout"/>
                            </div>
                        </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection