<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial;
            font-size: 10pt;
            color: #000;
        }

        body {
            width: 100%;
            font-family: Arial;
            font-size: 10pt;
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        #wrapper {
            width: 180mm;
            margin: 0 15mm;
        }

        .page {
            height: 297mm;
            width: 210mm;
            page-break-after: always;
        }

        table {
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;

            border-spacing: 0;
            border-collapse: collapse;

        }

        table td {
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm;
        }

        table.heading {
            height: 50mm;
        }

        h1.heading {
            font-size: 14pt;
            color: #000;
            font-weight: normal;
        }

        h2.heading {
            font-size: 9pt;
            color: #000;
            font-weight: normal;
        }

        hr {
            color: #ccc;
            background: #ccc;
        }

        #invoice_body {
            height: 149mm;
        }

        #invoice_body, #invoice_total {
            width: 100%;
        }

        #invoice_body table, #invoice_total table {
            width: 100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;

            border-spacing: 0;
            border-collapse: collapse;

            margin-top: 5mm;
        }

        #invoice_body table td, #invoice_total table td {
            text-align: center;
            font-size: 9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm 0;
        }

        #invoice_body table td.mono, #invoice_total table td.mono {
            font-family: monospace;
            text-align: right;
            padding-right: 3mm;
            font-size: 10pt;
        }

        #footer {
            width: 180mm;
            margin: 0 15mm;
            padding-bottom: 3mm;
        }

        #footer table {
            width: 100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;

            background: #eee;

            border-spacing: 0;
            border-collapse: collapse;
        }

        #footer table td {
            width: 25%;
            text-align: center;
            font-size: 9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }

        .customize_setting h3 {
            float: left !important;
            width: 75% !important;
        }

        .customize_setting .actions {
            background: rgba(0, 0, 0, 0) url("../images/border_double2.png") repeat-x scroll center bottom;
            display: block;
            float: right !important;
            margin-top: 5px;
            padding-bottom: 24px;
            width: 25% !important;
        }

        .customize_setting .actions a:first-child, .responsive_next_prev a:first-child {
            background: #000;
            color: #fff;
            border: none;
        }

        .customize_setting .actions a:last-child, .responsive_next_prev a:last-child {
            margin-right: 2px !important;;
        }

        .customize_slider li {
            display: none;
        }

        .customize_slider .active-customize {
            display: block;
            transition: width .5s ease, background-color .5s ease;
        }

        .neck_dtail select {
            background: #fff none repeat scroll 0 0;
            border: 1px solid #9f9f9f;
            color: #000;
            font-family: "ralewaylight";
            font-size: 18px;
            height: 40px;
            margin: auto;
            padding: 6px 10px;
            text-align: left;
            width: 100%;
        }

        .neck_dtail input, .neck_dtail select {
            width: 50% !important;
        }

        .cartEmpty {
            background: none !important;
            border: 1px solid #9f9f9f;
        }

        .cartEmpty ul li .shirt_colmn_list {
            width: 100% !important;
        }

        .cartEmpty ul li div {
            font-size: 18px;
            text-align: center;
        }

        .shirt_colmn_list {
            padding: 15px 0 15px 11px !important;
        }

        .orderDetail p, .orderDetailValues p {
            padding: 12px;
            border: 1px solid #3e454c;
        }

        .customerMeasure select {
            background: #fff none repeat scroll 0 0;
            border: 1px solid #9f9f9f;
            color: #000;
            font-family: "ralewaylight";
            -webkit-appearance: initial !important;
            appearance: normal !important;
            outline: black !important;
            font-size: 18px;
            height: 40px;
            margin: auto;
            padding: 6px 10px;
            text-align: left;
            width: 100%;
        }

        .customerMeasure th {
            padding: 16px 20px !important;
            text-align: center;
        }

        .customerDetailInvoice table th {
            width: 10%;
            background: #EEEEEE;
            text-align: left;
            padding-left: 20px;
        }

        .customerDetailInvoice .specialClass {
            width: 35% !important;
        }

        .customerDetailInvoice table tr td {
            width: 40%;
        }

        .customerDetailInvoice table {
            padding-bottom: 4px;
        }

        .customerDetailInvoice table td {
            padding: 10px;
        }

        .customerDetailInvoice tr td {
            border: 1px solid #ccc;
        }

        #loadingSize {
            margin-left: 77px;
            color: black;
            margin-top: 7px;
        }

        .companyDetail, .otherDetail {
            width: 100%;
            clear: both;
            overflow: hidden;
        }

        .companyDetail p {
            float: left;
            padding-bottom: 12px;
            padding-left: 12px;
            padding-right: 12px;
            padding-top: 12px;
            width: 60mm;
            font-size: 9pt;
            color: #000;
            font-weight: normal;
        }

        .companyDetail p strong, .otherDetail strong, #fitStyleDetail li b {
            font-weight: bold;
        }

        .otherDetail .billTo, .otherDetail .shipTo {
            width: 50%;
            float: left;
            padding: 5px;
        }

        .otherDetail {
            border: 1px solid #ddd;
        }

        .otherDetail h3, .shipToBg1 {
            background: #EEEEEE;
            padding: 5px 5px 5px 8px;
        }

        .shipTo ul {
            width: 100%;
        }

        .billTo {
            border-right: 1px solid #ddd;
        }

        .shipTo ul li {
            font-size: 16px;
            padding: 5px;
            width: 50%;
            float: left;
        }

        #fitStyleDetail {
            margin-top: 25px;
        }

        #fitStyleDetail li {
            margin-bottom: 20px;
            margin-left: 0;
            margin-right: 0;
            margin-top: 8px;
        }

        #fitStyleDetail li b {
            margin: 5px 0;
            border-bottom: 1px solid #3e454c;
            padding-bottom: 1px;
        }

        #fitStyleDetail li b, #fitStyleDetail li p {
            font-size: 13px !important;
        }

        #fitStyleDetail li p {
            margin-top: 5px;
        }

        .shipToNew {
            font-size: 9pt;
            color: #000;
        }
    </style>
</head>
<body>
<div id="wrapper">

    <span style="float: left; width: 1%; margin-top: 30px;">
         <img style="float: left;width:70px;" src="<?= URL::to('public/assets/client/images/header_logo.png');?>">
    </span>
    <p style="text-align:center; font-weight:bold; padding-top:5mm;">INVOICE</p>
    <br/>
    <table class="heading" style="width:100%;">
        <tr>
            <td style="width:80mm;">
                <h2 class="heading">Men's Custom Tailor</h2>
                <h2 class="heading">
                    2523 Ferndale Ln. <br/> Snellville, GA 30078
                </h2>
            </td>
            <td rowspan="2" valign="top" align="right" style="padding:3mm;">
                <table>
                    <tr>
                        <td>Order No :</td>
                        <td><?=(isset($orders[0]->OrderID)) ? $orders[0]->OrderID : '';?></td>
                    </tr>
                    <tr>
                        <td>Dated :</td>
                        <td><?=(isset($orders[0]->OrderDate)) ? $orders[0]->OrderDate : '';?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <b></b> <br/>
                <br/>
                <br/>
                <br/>
            </td>
        </tr>
    </table>
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
        <p style="text-align: right;width: 40mm;">
            <strong>Phone: </strong> <?=$user->Phone;?>
        </p>
    </div>
    <table class="heading" style="width:100%;">
        <tr>
            <td>
                <b class="shipToBg">Bill To:</b><br/>
                <?=$user->Name;?><br/>
                <?=$user->Address . ',' . $user->City . ' ' . $user->Country . ' ' . $user->State;?>
                <br/>
            </td>
            <td class="shipToNew">
                <b class="shipToBg">Ship To:</b><br/>
                <ul>
                    <li>
                        <strong>Neck Size: </strong> &nbsp;&nbsp; <?=$size->NeckSize;?>
                    </li>
                    <li>
                        <strong>Chest Size: </strong> &nbsp;&nbsp; <?=$size->Chest;?>
                    </li>
                    <li>
                        <strong>Sleeve Length: </strong> &nbsp;&nbsp; <?=$size->LeftSleeve;?>
                    </li>
                    <li>
                        <strong>Waist: </strong> &nbsp;&nbsp; <?=$size->Waist;?>
                    </li>
                </ul>
            </td>
        </tr>
    </table>

    <div id="content">

        <div id="invoice_body">
            <table>
                <tr style="background:#eee;">
                    <td style="width:8%;"><b></b></td>
                    <td><b>PRODUCT</b></td>
                    <td style="width:15%;"><b>Price</b></td>
                    <td style="width:15%;"><b>Quantity</b></td>
                    <td style="width:15%;"><b>Total</b></td>
                </tr>
            </table>

            <table>
                <?php
                $Discount = $Shipping = $TotalPrice = 0;
                foreach ($orders as $rs) {
                $pr = $rs->FabricPrice * $rs->Qty;
                $TotalPrice += $pr;
                $Shipping = $rs->Shiping;
                $Discount = $rs->Discount;
                ?>
                <tr>
                    <td style="width:8%;">
                        <img width="50" height="60" src="<?= URL::to('resources/assets/images/' . $rs->Image); ?>"
                             alt="#"/>
                    </td>
                    <td style="text-align:left; padding-left:10px;">
                        <?=$rs->Name;?>
                    </td>
                    <td class="mono" style="width:15%;"><?=number_format($rs->FabricPrice, 2);?></td>
                    <td style="width:15%;" class="mono"><?=$rs->Qty;?></td>
                    <td style="width:15%;" class="mono"><?=number_format($rs->FabricPrice, 2);?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="3"></td>
                    <td>Shipping :</td>
                    <td class="mono"><?=number_format($Shipping, 2);?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>Total :</td>
                    <td class="mono"><?php
                        $TotalPrice = (float)($TotalPrice + $Shipping) - $Discount;
                        echo number_format($TotalPrice, 2);
                        ?></td>
                </tr>
            </table>
        </div>
        <div id="invoice_total">
            Total Amount :
            <table>
                <tr>
                    <td style="width:15%;">USD</td>
                    <td style="width:15%;" class="mono">
                        <?php
                        echo number_format($TotalPrice, 2);
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <br/>
        <hr/>
    </div>

    <br/>

</div>

<htmlpagefooter name="footer">
    <hr/>
    <div id="footer">
        <table>
            <tr>
                <td></td>
                <td>Men's Custom Tailor</td>
                <td></td>
            </tr>
        </table>
    </div>
</htmlpagefooter>
<sethtmlpagefooter name="footer" value="on"/>

</body>
</html>