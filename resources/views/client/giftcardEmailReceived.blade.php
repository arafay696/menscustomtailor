<table width="598" cellpadding="0" cellspacing="0" height="auto" class="table" vspace="0" hspace="0" align="left"
       border="0">
    <tbody>
    <tr>
        <td style="height:30px;border-right:30px solid #fff;"><font size="2" face="Arial">
                <br/>

                <p class="margin10_5" style="font-weight:bold"><strong>{{ $name }}</strong></p>

                <p class="margin10_5">{{ $Subject }}</p>

                <p class="margin10_5">
                    <img src="<?= URL::to('public/assets/client/images/gift-card-preview.jpg'); ?>" />
                    <span style="position: relative; font-size: 18px; font-weight: bold; left: -280px; top: -220px;">
                        {{$rec_name}}
                    </span>
                    <span style="position: relative; font-weight: bold; font-size: 34px; left: 211px; top: -132px;">
                        ${{$price}}.00
                    </span>
                    Gift Card received from {{ $from }} cost ${{ $price }}. Use following below code to avail your discount.
                </p>
                <p>
                    Message: {{$msg}}
                </p>
                <p class="margin10_5">
                    Your Coupon Code: {{ $code }}
                </p>

                <p class="margin10_5">Yours sincerely,</p>

                <p></p>

                <p></p>

                <p style="font-style: italic;">Team Men's Custom Tailor</p><br/>

                <p class="margin10_5" style="font-size: 10px;color: #999999">Please do not reply to this email.</p>

                <p style="font-size: 10px;color: #999999" class="margin10_5">
                    This email has been generated by Hosting.io and intended to recipient.
                </p>

                <p class="margin10_5" style="font-size: 10px;color: #999999" align="right"></font></td>
    </tr>
    </tbody>
</table>
<hr>
