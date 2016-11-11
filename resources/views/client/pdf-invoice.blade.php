
<div id="pdfInvoice" class="cart_pageDtail">
    <div class="firstDiv">
        <span>
            <img src="<?= URL::to('public/assets/client/images/header_logo.png');?>">
        </span>
        <h1>Invoice</h1>
    </div>
    <div class="companyDetail">
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
                    <strong>Neck Size: </strong> <?=$size->NeckSize;?>
                </li>
                <li>
                    <strong>Chest Size: </strong> <?=$size->Chest;?>
                </li>
                <li>
                    <strong>Sleeve Length: </strong> <?=$size->LeftSleeve;?>
                </li>
                <li>
                    <strong>Waist: </strong> <?=$size->Waist;?>
                </li>
            </ul>
        </div>
    </div>
    <br/>
    <div class="customerDetailInvoice hide">
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