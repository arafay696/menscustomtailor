@extends('admin.default')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order Detail</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Order Detail - <?= (isset($orderDetail->OrderID)) ?
                                $orderDetail->OrderID
                                : '';
                        ?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>
                                <tr>
                                    <th class="center">
                                        Dealer Code
                                    </th>
                                    <td class="center">
                                        MCT
                                    </td>
                                    <th>
                                        Customer Name
                                    </th>
                                    <td class="center">
                                        <?= (isset($orderDetail->Name)) ?
                                                $orderDetail->Name
                                                : '';
                                        ?>
                                    </td>
                                    <th class="center">
                                        Order #
                                    </th>
                                    <td class="center">
                                        <?= (isset($orderDetail->GOrderNo)) ?
                                                $orderDetail->GOrderNo
                                                : '';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="center">
                                        Customer Phone #
                                    </th>
                                    <td class="center">
                                        <?= (isset($orderDetail->Phone)) ?
                                                $orderDetail->Phone
                                                : '';
                                        ?>
                                    </td>
                                    <th>
                                        Customer Address
                                    </th>
                                    <td class="center">
                                        <?= (isset($orderDetail->ShippingAddress)) ?
                                                $orderDetail->ShippingAddress
                                                : '';
                                        ?>
                                    </td>
                                    <th class="center">
                                        Email Address
                                    </th>
                                    <td class="center">
                                        <?= (isset($orderDetail->Email)) ?
                                                $orderDetail->Email
                                                : '';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="center">
                                        Submit Date
                                    </th>
                                    <td class="center">
                                        <?= (isset($orderDetail->DeliveryDate)) ?
                                                date('d F Y', strtotime($orderDetail->DeliveryDate))
                                                : '';
                                        ?>
                                    </td>
                                    <th>
                                        Best time to Call
                                    </th>
                                    <td class="center">
                                        <?= (isset($orderDetail->Email)) ?
                                                $orderDetail->Email
                                                : '';
                                        ?>
                                    </td>
                                    <th class="center">
                                        Order Date
                                    </th>
                                    <td class="center">
                                        <?= (isset($orderDetail->OrderDate)) ?
                                                date('d F Y h.i A', strtotime($orderDetail->OrderDate))
                                                : '';
                                        ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Order Detail
                    </div>

                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#ShirtSize" data-toggle="tab">Shirt Size</a>
                            </li>
                            <li>
                                <a href="#ShirtStyle" data-toggle="tab">Shirt Style</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="ShirtSize">

                                <div class="dataTable_wrapper">
                                    <form action="<?=URL::to('admin/order/editSize');?>" method="post"
                                          enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <input type="hidden" name="customerID" value="<?=$customerID;?>"/>
                                        <div class="col-lg-12" style="margin:7px 15px;">
                                            <button type="submit" class="btn btn-success pull-right">
                                                Update Size
                                            </button>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover"
                                               id="dataTables-example">
                                            <tbody>
                                            <tr>
                                                <th class="center">
                                                    Height Feet
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" name="HeightFeet">
                                                        <option selected="">Height Feet</option>
                                                        <option <?php echo (isset($sizeDetail->HeightFeet) && $sizeDetail->HeightFeet == "3") ? "selected='selected'" : "" ?> value="3">
                                                            3
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightFeet) && $sizeDetail->HeightFeet == "4") ? "selected='selected'" : "" ?> value="4">
                                                            4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightFeet) && $sizeDetail->HeightFeet == "5") ? "selected='selected'" : "" ?> value="5">
                                                            5
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightFeet) && $sizeDetail->HeightFeet == "6") ? "selected='selected'" : "" ?> value="6">
                                                            6
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightFeet) && $sizeDetail->HeightFeet == "7") ? "selected='selected'" : "" ?> value="7">
                                                            7
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightFeet) && $sizeDetail->HeightFeet == "8") ? "selected='selected'" : "" ?> value="8">
                                                            8
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightFeet) && $sizeDetail->HeightFeet == "9") ? "selected='selected'" : "" ?> value="9">
                                                            9
                                                        </option>
                                                    </select>
                                                </td>

                                                <th>
                                                    Height Inches
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" name="HeightInches" size="1">
                                                        <option value="0" selected="">Height Inches</option>
                                                        <option <?php echo (isset($sizeDetailDetail->HeightInches) && $sizeDetail->HeightInches == "1") ? "selected='selected'" : "" ?> value="1">
                                                            1
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightInches) && $sizeDetail->HeightInches == "2") ? "selected='selected'" : "" ?> value="2">
                                                            2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightInches) && $sizeDetail->HeightInches == "3") ? "selected='selected'" : "" ?> value="3">
                                                            3
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightInches) && $sizeDetail->HeightInches == "4") ? "selected='selected'" : "" ?> value="4">
                                                            4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightInches) && $sizeDetail->HeightInches == "5") ? "selected='selected'" : "" ?> value="5">
                                                            5
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightInches) && $sizeDetail->HeightInches == "6") ? "selected='selected'" : "" ?> value="6">
                                                            6
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightInches) && $sizeDetail->HeightInches == "7") ? "selected='selected'" : "" ?> value="7">
                                                            7
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightInches) && $sizeDetail->HeightInches == "8") ? "selected='selected'" : "" ?> value="8">
                                                            8
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightInches) && $sizeDetail->HeightInches == "9") ? "selected='selected'" : "" ?> value="9">
                                                            9
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightInches) && $sizeDetail->HeightInches == "10") ? "selected='selected'" : "" ?> value="10">
                                                            10
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->HeightInches) && $sizeDetail->HeightInches == "11") ? "selected='selected'" : "" ?> value="11">
                                                            11
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="center">
                                                    Neck Height
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" name="NeckHeight">
                                                        <option>Select Neck Height</option>
                                                        <option value="Short" <?php echo (isset($sizeDetail->NeckHeight) && $sizeDetail->NeckHeight == "Short") ? "selected='selected'" : "" ?>>
                                                            Short
                                                        </option>
                                                        <option value="Average" <?php echo (isset($sizeDetail->NeckHeight) && $sizeDetail->NeckHeight == "Average") ? "selected='selected'" : "" ?>>
                                                            Average
                                                        </option>
                                                        <option value="Long" <?php echo (isset($sizeDetail->NeckHeight) && $sizeDetail->NeckHeight == "Long") ? "selected='selected'" : "" ?>>
                                                            Long
                                                        </option>
                                                    </select>
                                                </td>
                                                <th>
                                                    Neck Size
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" name="NeckHeight">
                                                        <option>Select Neck Height</option>
                                                        <option value="Short" <?php echo (isset($sizeDetail->NeckHeight) && $sizeDetail->NeckHeight == "Short") ? "selected='selected'" : "" ?>>
                                                            Short
                                                        </option>
                                                        <option value="Average" <?php echo (isset($sizeDetail->NeckHeight) && $sizeDetail->NeckHeight == "Average") ? "selected='selected'" : "" ?>>
                                                            Average
                                                        </option>
                                                        <option value="Long" <?php echo (isset($sizeDetail->NeckHeight) && $sizeDetail->NeckHeight == "Long") ? "selected='selected'" : "" ?>>
                                                            Long
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="center">
                                                    Chest Description
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" name="ChestDescription">
                                                        <option>Select Chest Description</option>
                                                        <option <?php echo (isset($sizeDetail->ChestDescription) && $sizeDetail->ChestDescription == "Slender") ? "selected='selected'" : "" ?> value="Slender">
                                                            Slender
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->ChestDescription) && $sizeDetail->ChestDescription == "Regular Build") ? "selected='selected'" : "" ?> value="Regular Build">
                                                            Regular Build
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->ChestDescription) && $sizeDetail->ChestDescription == "Very Muscular") ? "selected='selected'" : "" ?> value="Very Muscular">
                                                            Very Muscular
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->ChestDescription) && $sizeDetail->ChestDescription == "Husky / Hefty") ? "selected='selected'" : "" ?> value="Husky / Hefty">
                                                            Husky / Hefty
                                                        </option>
                                                    </select>
                                                </td>
                                                <th>
                                                    Chest Size
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" name="Chest">
                                                        <option>Select Chest Size</option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "30") ? "selected='selected'" : "" ?> value="30">
                                                            30
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                                            30 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                                            30 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                                            30 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "31") ? "selected='selected'" : "" ?> value="31">
                                                            31
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                                            31 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                                            31 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                                            31 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "32") ? "selected='selected'" : "" ?> value="32">
                                                            32
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                                            32 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                                            32 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                                            32 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "33") ? "selected='selected'" : "" ?> value="33">
                                                            33
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                                            33 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                                            33 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                                            33 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "34") ? "selected='selected'" : "" ?> value="34">
                                                            34
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                                            34 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                                            34 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                                            34 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "35") ? "selected='selected'" : "" ?> value="35">
                                                            35
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                                            35 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                                            35 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "35 3/4") ? "selected='selected'" : "" ?> value="35 3/4">
                                                            35 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "36") ? "selected='selected'" : "" ?> value="36">
                                                            36
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                                            36 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                                            36 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                                            36 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "37") ? "selected='selected'" : "" ?> value="37">
                                                            37
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                                            37 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                                            37 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                                            37 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "38") ? "selected='selected'" : "" ?> value="38">
                                                            38
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                                            38 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                                            38 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                                            38 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "39") ? "selected='selected'" : "" ?> value="39">
                                                            39
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                                            39 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                                            39 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                                            39 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "40") ? "selected='selected'" : "" ?> value="40">
                                                            40
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                                            40 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                                            40 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                                            40 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "41") ? "selected='selected'" : "" ?> value="41">
                                                            41
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                                            41 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                                            41 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                                            41 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "42") ? "selected='selected'" : "" ?> value="42">
                                                            42
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                                            42 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                                            42 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                                            42 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "43") ? "selected='selected'" : "" ?> value="43">
                                                            43
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                                            43 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                                            43 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                                            43 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "44") ? "selected='selected'" : "" ?> value="44">
                                                            44
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                                            44 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                                            44 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                                            44 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "45") ? "selected='selected'" : "" ?> value="45">
                                                            45
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                                            45 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                                            45 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                                            45 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "46") ? "selected='selected'" : "" ?> value="46">
                                                            46
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "46 1/4") ? "selected='selected'" : "" ?> value="46 1/4">
                                                            46 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "46 1/2") ? "selected='selected'" : "" ?> value="46 1/2">
                                                            46 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "46 3/4") ? "selected='selected'" : "" ?> value="46 3/4">
                                                            46 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "47") ? "selected='selected'" : "" ?> value="47">
                                                            47
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "47 1/4") ? "selected='selected'" : "" ?> value="47 1/4">
                                                            47 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "47 1/2") ? "selected='selected'" : "" ?> value="47 1/2">
                                                            47 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "47 3/4") ? "selected='selected'" : "" ?> value="47 3/4">
                                                            47 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "48") ? "selected='selected'" : "" ?> value="48">
                                                            48
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "48 1/4") ? "selected='selected'" : "" ?> value="48 1/4">
                                                            48 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "48 1/2") ? "selected='selected'" : "" ?> value="48 1/2">
                                                            48 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "48 3/4") ? "selected='selected'" : "" ?> value="48 3/4">
                                                            48 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "49") ? "selected='selected'" : "" ?> value="49">
                                                            49
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "49 1/4") ? "selected='selected'" : "" ?> value="49 1/4">
                                                            49 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "49 1/2") ? "selected='selected'" : "" ?> value="49 1/2">
                                                            49 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "49 3/4") ? "selected='selected'" : "" ?> value="49 3/4">
                                                            49 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "50") ? "selected='selected'" : "" ?> value="50">
                                                            50
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "50 1/4") ? "selected='selected'" : "" ?> value="50 1/4">
                                                            50 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "50 1/2") ? "selected='selected'" : "" ?> value="50 1/2">
                                                            50 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "50 3/4") ? "selected='selected'" : "" ?> value="50 3/4">
                                                            50 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "51") ? "selected='selected'" : "" ?> value="51">
                                                            51
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "51 1/4") ? "selected='selected'" : "" ?> value="51 1/4">
                                                            51 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "51 1/2") ? "selected='selected'" : "" ?> value="51 1/2">
                                                            51 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "51 3/4") ? "selected='selected'" : "" ?> value="51 3/4">
                                                            51 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "52") ? "selected='selected'" : "" ?> value="52">
                                                            52
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "52 1/4") ? "selected='selected'" : "" ?> value="52 1/4">
                                                            52 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "52 1/2") ? "selected='selected'" : "" ?> value="52 1/2">
                                                            52 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "52 3/4") ? "selected='selected'" : "" ?> value="52 3/4">
                                                            52 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "53") ? "selected='selected'" : "" ?> value="53">
                                                            53
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "53 1/4") ? "selected='selected'" : "" ?> value="53 1/4">
                                                            53 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "53 1/2") ? "selected='selected'" : "" ?> value="53 1/2">
                                                            53 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "53 3/4") ? "selected='selected'" : "" ?> value="53 3/4">
                                                            53 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "54") ? "selected='selected'" : "" ?> value="54">
                                                            54
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "54 1/4") ? "selected='selected'" : "" ?> value="54 1/4">
                                                            54 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "54 1/2") ? "selected='selected'" : "" ?> value="54 1/2">
                                                            54 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "54 3/4") ? "selected='selected'" : "" ?> value="54 3/4">
                                                            54 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "55") ? "selected='selected'" : "" ?> value="55">
                                                            55
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "55 1/4") ? "selected='selected'" : "" ?> value="55 1/4">
                                                            55 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "55 1/2") ? "selected='selected'" : "" ?> value="55 1/2">
                                                            55 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "55 3/4") ? "selected='selected'" : "" ?> value="55 3/4">
                                                            55 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "56") ? "selected='selected'" : "" ?> value="56">
                                                            56
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "56 1/4") ? "selected='selected'" : "" ?> value="56 1/4">
                                                            56 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "56 1/2") ? "selected='selected'" : "" ?> value="56 1/2">
                                                            56 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "56 3/4") ? "selected='selected'" : "" ?> value="56 3/4">
                                                            56 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "57") ? "selected='selected'" : "" ?> value="57">
                                                            57
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "57 1/4") ? "selected='selected'" : "" ?> value="57 1/4">
                                                            57 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "57 1/2") ? "selected='selected'" : "" ?> value="57 1/2">
                                                            57 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "57 3/4") ? "selected='selected'" : "" ?> value="57 3/4">
                                                            57 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "58") ? "selected='selected'" : "" ?> value="58">
                                                            58
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "58 1/4") ? "selected='selected'" : "" ?> value="58 1/4">
                                                            58 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "58 1/2") ? "selected='selected'" : "" ?> value="58 1/2">
                                                            58 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "58 3/4") ? "selected='selected'" : "" ?> value="58 3/4">
                                                            58 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "59") ? "selected='selected'" : "" ?> value="59">
                                                            59
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "59 1/4") ? "selected='selected'" : "" ?> value="59 1/4">
                                                            59 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "59 1/2") ? "selected='selected'" : "" ?> value="59 1/2">
                                                            59 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "59 3/4") ? "selected='selected'" : "" ?> value="59 3/4">
                                                            59 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "60") ? "selected='selected'" : "" ?> value="60">
                                                            60
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "60 1/4") ? "selected='selected'" : "" ?> value="60 1/4">
                                                            60 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "60 1/2") ? "selected='selected'" : "" ?> value="60 1/2">
                                                            60 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "60 3/4") ? "selected='selected'" : "" ?> value="60 3/4">
                                                            60 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "61") ? "selected='selected'" : "" ?> value="61">
                                                            61
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "61 1/4") ? "selected='selected'" : "" ?> value="61 1/4">
                                                            61 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "61 1/2") ? "selected='selected'" : "" ?> value="61 1/2">
                                                            61 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "61 3/4") ? "selected='selected'" : "" ?> value="61 3/4">
                                                            61 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "62") ? "selected='selected'" : "" ?> value="62">
                                                            62
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "62 1/4") ? "selected='selected'" : "" ?> value="62 1/4">
                                                            62 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "62 1/2") ? "selected='selected'" : "" ?> value="62 1/2">
                                                            62 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "62 3/4") ? "selected='selected'" : "" ?> value="62 3/4">
                                                            62 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "63") ? "selected='selected'" : "" ?> value="63">
                                                            63
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "63 1/4") ? "selected='selected'" : "" ?> value="63 1/4">
                                                            63 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "63 1/2") ? "selected='selected'" : "" ?> value="63 1/2">
                                                            63 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "63 3/4") ? "selected='selected'" : "" ?> value="63 3/4">
                                                            63 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "64") ? "selected='selected'" : "" ?> value="64">
                                                            64
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "64 1/4") ? "selected='selected'" : "" ?> value="64 1/4">
                                                            64 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "64 1/2") ? "selected='selected'" : "" ?> value="64 1/2">
                                                            64 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "64 3/4") ? "selected='selected'" : "" ?> value="64 3/4">
                                                            64 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "65") ? "selected='selected'" : "" ?> value="65">
                                                            65
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "65 1/4") ? "selected='selected'" : "" ?> value="65 1/4">
                                                            65 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "65 1/2") ? "selected='selected'" : "" ?> value="65 1/2">
                                                            65 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "65 3/4") ? "selected='selected'" : "" ?> value="65 3/4">
                                                            65 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "66") ? "selected='selected'" : "" ?> value="66">
                                                            66
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "66 1/4") ? "selected='selected'" : "" ?> value="66 1/4">
                                                            66 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "66 1/2") ? "selected='selected'" : "" ?> value="66 1/2">
                                                            66 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "66 3/4") ? "selected='selected'" : "" ?> value="66 3/4">
                                                            66 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "67") ? "selected='selected'" : "" ?> value="67">
                                                            67
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "67 1/4") ? "selected='selected'" : "" ?> value="67 1/4">
                                                            67 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "67 1/2") ? "selected='selected'" : "" ?> value="67 1/2">
                                                            67 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "67 3/4") ? "selected='selected'" : "" ?> value="67 3/4">
                                                            67 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "68") ? "selected='selected'" : "" ?> value="68">
                                                            68
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "68 1/4") ? "selected='selected'" : "" ?> value="68 1/4">
                                                            68 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "68 1/2") ? "selected='selected'" : "" ?> value="68 1/2">
                                                            68 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "68 3/4") ? "selected='selected'" : "" ?> value="68 3/4">
                                                            68 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "69") ? "selected='selected'" : "" ?> value="69">
                                                            69
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "69 1/4") ? "selected='selected'" : "" ?> value="69 1/4">
                                                            69 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "69 1/2") ? "selected='selected'" : "" ?> value="69 1/2">
                                                            69 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "69 3/4") ? "selected='selected'" : "" ?> value="69 3/4">
                                                            69 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "70") ? "selected='selected'" : "" ?> value="70">
                                                            70
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "70 1/4") ? "selected='selected'" : "" ?> value="70 1/4">
                                                            70 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "70 1/2") ? "selected='selected'" : "" ?> value="70 1/2">
                                                            70 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "70 3/4") ? "selected='selected'" : "" ?> value="70 3/4">
                                                            70 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "71") ? "selected='selected'" : "" ?> value="71">
                                                            71
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "71 1/4") ? "selected='selected'" : "" ?> value="71 1/4">
                                                            71 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "71 1/2") ? "selected='selected'" : "" ?> value="71 1/2">
                                                            71 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "71 3/4") ? "selected='selected'" : "" ?> value="71 3/4">
                                                            71 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "72") ? "selected='selected'" : "" ?> value="72">
                                                            72
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "72 1/4") ? "selected='selected'" : "" ?> value="72 1/4">
                                                            72 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "72 1/2") ? "selected='selected'" : "" ?> value="72 1/2">
                                                            72 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "72 3/4") ? "selected='selected'" : "" ?> value="72 3/4">
                                                            72 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "73") ? "selected='selected'" : "" ?> value="73">
                                                            73
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "73 1/4") ? "selected='selected'" : "" ?> value="73 1/4">
                                                            73 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "73 1/2") ? "selected='selected'" : "" ?> value="73 1/2">
                                                            73 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "73 3/4") ? "selected='selected'" : "" ?> value="73 3/4">
                                                            73 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "74") ? "selected='selected'" : "" ?> value="74">
                                                            74
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "74 1/4") ? "selected='selected'" : "" ?> value="74 1/4">
                                                            74 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "74 1/2") ? "selected='selected'" : "" ?> value="74 1/2">
                                                            74 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "74 3/4") ? "selected='selected'" : "" ?> value="74 3/4">
                                                            74 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "75") ? "selected='selected'" : "" ?> value="75">
                                                            75
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "75 1/4") ? "selected='selected'" : "" ?> value="75 1/4">
                                                            75 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "75 1/2") ? "selected='selected'" : "" ?> value="75 1/2">
                                                            75 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "75 3/4") ? "selected='selected'" : "" ?> value="75 3/4">
                                                            75 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "76") ? "selected='selected'" : "" ?> value="76">
                                                            76
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "76 1/4") ? "selected='selected'" : "" ?> value="76 1/4">
                                                            76 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "76 1/2") ? "selected='selected'" : "" ?> value="76 1/2">
                                                            76 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Chest) && $sizeDetail->Chest == "76 3/4") ? "selected='selected'" : "" ?> value="76 3/4">
                                                            76 3/4
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Weight
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" title="Weight" size="1" name="Weight">
                                                        <option value="">Select Weight</option>
                                                        <?php
                                                        for($i = 90;$i <= 450;$i++) {
                                                        ?>
                                                        <option <?php echo (isset($sizeDetail->Weight) && $sizeDetail->Weight == $i) ? "selected='selected'" : "" ?> value="<?=$i;?>">
                                                            <?=$i;?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </td>

                                                <th>
                                                    Waist
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" title="Waist" size="1" name="Waist">
                                                        <option value="">Select Waist</option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "24") ? "selected='selected'" : "" ?> value="24">
                                                            24
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "24 1/4") ? "selected='selected'" : "" ?> value="24 1/4">
                                                            24 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "24 1/2") ? "selected='selected'" : "" ?> value="24 1/2">
                                                            24 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "24 3/4") ? "selected='selected'" : "" ?> value="24 3/4">
                                                            24 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "25") ? "selected='selected'" : "" ?> value="25">
                                                            25
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "25 1/4") ? "selected='selected'" : "" ?> value="25 1/4">
                                                            25 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "25 1/2") ? "selected='selected'" : "" ?> value="25 1/2">
                                                            25 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "25 3/4") ? "selected='selected'" : "" ?> value="25 3/4">
                                                            25 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "26") ? "selected='selected'" : "" ?> value="26">
                                                            26
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "26 1/3") ? "selected='selected'" : "" ?> value="26 1/4">
                                                            26 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "26 1/2") ? "selected='selected'" : "" ?> value="26 1/2">
                                                            26 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "26 3/4") ? "selected='selected'" : "" ?> value="26 3/4">
                                                            26 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "27") ? "selected='selected'" : "" ?> value="27">
                                                            27
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "27 1/4") ? "selected='selected'" : "" ?> value="27 1/4">
                                                            27 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "27 1/2") ? "selected='selected'" : "" ?> value="27 1/2">
                                                            27 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "27 3/4") ? "selected='selected'" : "" ?> value="27 3/4">
                                                            27 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "28") ? "selected='selected'" : "" ?> value="28">
                                                            28
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "28 1/4") ? "selected='selected'" : "" ?> value="28 1/4">
                                                            28 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "28 1/2") ? "selected='selected'" : "" ?> value="28 1/2">
                                                            28 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "28 3/4") ? "selected='selected'" : "" ?> value="28 3/4">
                                                            28 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "29") ? "selected='selected'" : "" ?> value="29">
                                                            29
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "29 1/4") ? "selected='selected'" : "" ?> value="29 1/4">
                                                            29 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "29 1/2") ? "selected='selected'" : "" ?> value="29 1/2">
                                                            29 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "29 3/4") ? "selected='selected'" : "" ?> value="29 3/4">
                                                            29 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "30") ? "selected='selected'" : "" ?> value="30">
                                                            30
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                                            30 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                                            30 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                                            30 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "31") ? "selected='selected'" : "" ?> value="31">
                                                            31
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                                            31 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                                            31 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                                            31 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "32") ? "selected='selected'" : "" ?> value="32">
                                                            32
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                                            32 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                                            32 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                                            32 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "33") ? "selected='selected'" : "" ?> value="33">
                                                            33
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                                            33 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                                            33 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                                            33 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "34") ? "selected='selected'" : "" ?> value="34">
                                                            34
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                                            34 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                                            34 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                                            34 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "35") ? "selected='selected'" : "" ?> value="35">
                                                            35
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                                            35 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                                            35 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "35 3/4") ? "selected='selected'" : "" ?> value="35 3/4">
                                                            35 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "36") ? "selected='selected'" : "" ?> value="36">
                                                            36
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                                            36 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                                            36 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                                            36 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "37") ? "selected='selected'" : "" ?> value="37">
                                                            37
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                                            37 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                                            37 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                                            37 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "38") ? "selected='selected'" : "" ?> value="38">
                                                            38
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                                            38 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                                            38 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                                            38 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "39") ? "selected='selected'" : "" ?> value="39">
                                                            39
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                                            39 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                                            39 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                                            39 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "40") ? "selected='selected'" : "" ?> value="40">
                                                            40
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                                            40 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                                            40 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                                            40 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "41") ? "selected='selected'" : "" ?> value="41">
                                                            41
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                                            41 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                                            41 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                                            41 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "42") ? "selected='selected'" : "" ?> value="42">
                                                            42
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                                            42 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                                            42 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                                            42 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "43") ? "selected='selected'" : "" ?> value="43">
                                                            43
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                                            43 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                                            43 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                                            43 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "44") ? "selected='selected'" : "" ?> value="44">
                                                            44
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                                            44 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                                            44 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                                            44 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "45") ? "selected='selected'" : "" ?> value="45">
                                                            45
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                                            45 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                                            45 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                                            45 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "46") ? "selected='selected'" : "" ?> value="46">
                                                            46
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "46 1/4") ? "selected='selected'" : "" ?> value="46 1/4">
                                                            46 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "46 1/2") ? "selected='selected'" : "" ?> value="46 1/2">
                                                            46 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "46 3/4") ? "selected='selected'" : "" ?> value="46 3/4">
                                                            46 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "47") ? "selected='selected'" : "" ?> value="47">
                                                            47
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "47 1/4") ? "selected='selected'" : "" ?> value="47 1/4">
                                                            47 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "47 1/2") ? "selected='selected'" : "" ?> value="47 1/2">
                                                            47 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "47 3/4") ? "selected='selected'" : "" ?> value="47 3/4">
                                                            47 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "48") ? "selected='selected'" : "" ?> value="48">
                                                            48
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "48 1/4") ? "selected='selected'" : "" ?> value="48 1/4">
                                                            48 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "48 1/2") ? "selected='selected'" : "" ?> value="48 1/2">
                                                            48 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "48 3/4") ? "selected='selected'" : "" ?> value="48 3/4">
                                                            48 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "49") ? "selected='selected'" : "" ?> value="49">
                                                            49
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "49 1/4") ? "selected='selected'" : "" ?> value="49 1/4">
                                                            49 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "49 1/2") ? "selected='selected'" : "" ?> value="49 1/2">
                                                            49 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "49 3/4") ? "selected='selected'" : "" ?> value="49 3/4">
                                                            49 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "50") ? "selected='selected'" : "" ?> value="50">
                                                            50
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "50 1/4") ? "selected='selected'" : "" ?> value="50 1/4">
                                                            50 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "50 1/2") ? "selected='selected'" : "" ?> value="50 1/2">
                                                            50 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "50 3/4") ? "selected='selected'" : "" ?> value="50 3/4">
                                                            50 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "51") ? "selected='selected'" : "" ?> value="51">
                                                            51
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "51 1/4") ? "selected='selected'" : "" ?> value="51 1/4">
                                                            51 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "51 1/2") ? "selected='selected'" : "" ?> value="51 1/2">
                                                            51 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "51 3/4") ? "selected='selected'" : "" ?> value="51 3/4">
                                                            51 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "52") ? "selected='selected'" : "" ?> value="52">
                                                            52
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "52 1/4") ? "selected='selected'" : "" ?> value="52 1/4">
                                                            52 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "52 1/2") ? "selected='selected'" : "" ?> value="52 1/2">
                                                            52 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "52 3/4") ? "selected='selected'" : "" ?> value="52 3/4">
                                                            52 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "53") ? "selected='selected'" : "" ?> value="53">
                                                            53
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "53 1/4") ? "selected='selected'" : "" ?> value="53 1/4">
                                                            53 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "53 1/2") ? "selected='selected'" : "" ?> value="53 1/2">
                                                            53 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "53 3/4") ? "selected='selected'" : "" ?> value="53 3/4">
                                                            53 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "54") ? "selected='selected'" : "" ?> value="54">
                                                            54
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "54 1/4") ? "selected='selected'" : "" ?> value="54 1/4">
                                                            54 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "54 1/2") ? "selected='selected'" : "" ?> value="54 1/2">
                                                            54 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "54 3/4") ? "selected='selected'" : "" ?> value="54 3/4">
                                                            54 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "55") ? "selected='selected'" : "" ?> value="55">
                                                            55
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "55 1/4") ? "selected='selected'" : "" ?> value="55 1/4">
                                                            55 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "55 1/2") ? "selected='selected'" : "" ?> value="55 1/2">
                                                            55 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "55 3/4") ? "selected='selected'" : "" ?> value="55 3/4">
                                                            55 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "56") ? "selected='selected'" : "" ?> value="56">
                                                            56
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "56 1/4") ? "selected='selected'" : "" ?> value="56 1/4">
                                                            56 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "56 1/2") ? "selected='selected'" : "" ?> value="56 1/2">
                                                            56 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "56 3/4") ? "selected='selected'" : "" ?> value="56 3/4">
                                                            56 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "57") ? "selected='selected'" : "" ?> value="57">
                                                            57
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "57 1/4") ? "selected='selected'" : "" ?> value="57 1/4">
                                                            57 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "57 1/2") ? "selected='selected'" : "" ?> value="57 1/2">
                                                            57 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "57 3/4") ? "selected='selected'" : "" ?> value="57 3/4">
                                                            57 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "58") ? "selected='selected'" : "" ?> value="58">
                                                            58
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "58 1/4") ? "selected='selected'" : "" ?> value="58 1/4">
                                                            58 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "58 1/2") ? "selected='selected'" : "" ?> value="58 1/2">
                                                            58 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "58 3/4") ? "selected='selected'" : "" ?> value="58 3/4">
                                                            58 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "59") ? "selected='selected'" : "" ?> value="59">
                                                            59
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "59 1/4") ? "selected='selected'" : "" ?> value="59 1/4">
                                                            59 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "59 1/2") ? "selected='selected'" : "" ?> value="59 1/2">
                                                            59 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "59 3/4") ? "selected='selected'" : "" ?> value="59 3/4">
                                                            59 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "60") ? "selected='selected'" : "" ?> value="60">
                                                            60
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "60 1/4") ? "selected='selected'" : "" ?> value="60 1/4">
                                                            60 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "60 1/2") ? "selected='selected'" : "" ?> value="60 1/2">
                                                            60 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "60 3/4") ? "selected='selected'" : "" ?> value="60 3/4">
                                                            60 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "61") ? "selected='selected'" : "" ?> value="61">
                                                            61
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "61 1/4") ? "selected='selected'" : "" ?> value="61 1/4">
                                                            61 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "61 1/2") ? "selected='selected'" : "" ?> value="61 1/2">
                                                            61 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "61 3/4") ? "selected='selected'" : "" ?> value="61 3/4">
                                                            61 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "62") ? "selected='selected'" : "" ?> value="62">
                                                            62
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "62 1/4") ? "selected='selected'" : "" ?> value="62 1/4">
                                                            62 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "62 1/2") ? "selected='selected'" : "" ?> value="62 1/2">
                                                            62 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "62 3/4") ? "selected='selected'" : "" ?> value="62 3/4">
                                                            62 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "63") ? "selected='selected'" : "" ?> value="63">
                                                            63
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "63 1/4") ? "selected='selected'" : "" ?> value="63 1/4">
                                                            63 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "63 1/2") ? "selected='selected'" : "" ?> value="63 1/2">
                                                            63 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "63 3/4") ? "selected='selected'" : "" ?> value="63 3/4">
                                                            63 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "64") ? "selected='selected'" : "" ?> value="64">
                                                            64
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "64 1/4") ? "selected='selected'" : "" ?> value="64 1/4">
                                                            64 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "64 1/2") ? "selected='selected'" : "" ?> value="64 1/2">
                                                            64 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Waist) && $sizeDetail->Waist == "64 3/4") ? "selected='selected'" : "" ?> value="64 3/4">
                                                            64 3/4
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="center">
                                                    Posture
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" name="Posture">
                                                        <option selected="" value="">Select Posture</option>
                                                        <option <?php echo (isset($sizeDetail->Posture) && $sizeDetail->Posture == "Flat") ? "selected='selected'" : "" ?> value="Flat">
                                                            Flat
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Posture) && $sizeDetail->Posture == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                            Average
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Posture) && $sizeDetail->Posture == "Rounded") ? "selected='selected'" : "" ?> value="Rounded">
                                                            Rounded
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Posture) && $sizeDetail->Posture == "Stout") ? "selected='selected'" : "" ?> value="Stout">
                                                            Stout
                                                        </option>
                                                    </select>
                                                </td>
                                                <th>
                                                    Hips
                                                </th>
                                                <td class="center">
                                                    <?= (isset($sizeDetail->Hips)) ?
                                                            $sizeDetail->Hips
                                                            : '';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="center">
                                                    Arm Type
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" name="ArmType">
                                                        <option selected="" value="">Select Arm Type</option>
                                                        <option <?php echo (isset($sizeDetail->ArmType) && $sizeDetail->ArmType == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                            Average
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->ArmType) && $sizeDetail->ArmType == "Slender") ? "selected='selected'" : "" ?> value="Slender">
                                                            Slender
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->ArmType) && $sizeDetail->ArmType == "Muscular") ? "selected='selected'" : "" ?> value="Muscular">
                                                            Muscular
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->ArmType) && $sizeDetail->ArmType == "Heavy") ? "selected='selected'" : "" ?> value="Heavy">
                                                            Heavy
                                                        </option>
                                                    </select>
                                                </td>
                                                <th>
                                                    Yoke
                                                </th>
                                                <td class="center">
                                                    <input class="form-control" type="text" name="Yoke"
                                                           value="<?= (isset($sizeDetail->Yoke)) ? $sizeDetail->Yoke : ''; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="center">
                                                    Body Proportions
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" size="1" name="BodyProportion">
                                                        <option selected="" value="">Select Body proportion</option>
                                                        <option <?php echo (isset($sizeDetail->BodyProportion) && $sizeDetail->BodyProportion == "Evenly Proportioned") ? "selected='selected'" : "" ?> value="Evenly Proportioned">
                                                            Evenly Proportioned
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->BodyProportion) && $sizeDetail->BodyProportion == "Short Torso / Long Legs") ? "selected='selected'" : "" ?> value="Short Torso / Long Legs">
                                                            Short Torso / Long Legs
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->BodyProportion) && $sizeDetail->BodyProportion == "Long Torso / Short Legs") ? "selected='selected'" : "" ?> value="Long Torso / Short Legs">
                                                            Long Torso / Short Legs
                                                        </option>
                                                    </select>
                                                </td>
                                                <th>
                                                    Tail
                                                </th>
                                                <td class="center">
                                                    <input class="form-control" type="text" name="Tail"
                                                           value="<?= (isset($sizeDetail->Tail)) ? $sizeDetail->Tail : ''; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="center">
                                                    Body Shape
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" name="BodyShape">
                                                        <option selected="" value="">Select Body Shape</option>
                                                        <option <?php echo (isset($sizeDetail->BodyShape) && $sizeDetail->BodyShape == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                            Average
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->BodyShape) && $sizeDetail->BodyShape == "Athletic") ? "selected='selected'" : "" ?> value="Athletic">
                                                            Athletic
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->BodyShape) && $sizeDetail->BodyShape == "Portly") ? "selected='selected'" : "" ?> value="Portly">
                                                            Portly
                                                        </option>
                                                    </select>
                                                </td>
                                                <th>
                                                    Left Sleeve
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" title="Sleeve Length"
                                                            name="SleeveLength">
                                                        <option value="">Select Sleeve Length</option>
                                                        <option value="24" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "24") ? "selected='selected'" : "" ?>>
                                                            24
                                                        </option>
                                                        <option value="24 1/4" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "24 1/4") ? "selected='selected'" : "" ?>>
                                                            24 1/4
                                                        </option>
                                                        <option value="24 1/2" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "24 1/2") ? "selected='selected'" : "" ?>>
                                                            24 1/2
                                                        </option>
                                                        <option value="24 3/4" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "24 3/4") ? "selected='selected'" : "" ?>>
                                                            24 3/4
                                                        </option>
                                                        <option value="25" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "25") ? "selected='selected'" : "" ?>>
                                                            25
                                                        </option>
                                                        <option value="25 1/4" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "25 1/4") ? "selected='selected'" : "" ?>>
                                                            25 1/4
                                                        </option>
                                                        <option value="25 1/2" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "25 1/2") ? "selected='selected'" : "" ?>>
                                                            25 1/2
                                                        </option>
                                                        <option value="25 3/4" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "25 3/4") ? "selected='selected'" : "" ?>>
                                                            25 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "26") ? "selected='selected'" : "" ?> value="26">
                                                            26
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "26 1/4") ? "selected='selected'" : "" ?> value="26 1/4">
                                                            26 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "26 1/2") ? "selected='selected'" : "" ?> value="26 1/2">
                                                            26 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "26 3/4") ? "selected='selected'" : "" ?> value="26 3/4">
                                                            26 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "27") ? "selected='selected'" : "" ?> value="27">
                                                            27
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "27 1/4") ? "selected='selected'" : "" ?> value="27 1/4">
                                                            27 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "27 1/2") ? "selected='selected'" : "" ?> value="27 1/2">
                                                            27 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "27 3/4") ? "selected='selected'" : "" ?> value="27 3/4">
                                                            27 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "28") ? "selected='selected'" : "" ?> value="28">
                                                            28
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "28 1/4") ? "selected='selected'" : "" ?> value="28 1/4">
                                                            28 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "28 1/2") ? "selected='selected'" : "" ?> value="28 1/2">
                                                            28 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "28 3/4") ? "selected='selected'" : "" ?> value="28 3/4">
                                                            28 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "29") ? "selected='selected'" : "" ?> value="29">
                                                            29
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "29 1/4") ? "selected='selected'" : "" ?> value="29 1/4">
                                                            29 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "29 1/2") ? "selected='selected'" : "" ?> value="29 1/2">
                                                            29 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "29 3/4") ? "selected='selected'" : "" ?> value="29 3/4">
                                                            29 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "30") ? "selected='selected'" : "" ?> value="30">
                                                            30
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                                            30 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                                            30 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                                            30 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "31") ? "selected='selected'" : "" ?> value="31">
                                                            31
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                                            31 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                                            31 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                                            31 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "32") ? "selected='selected'" : "" ?> value="32">
                                                            32
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                                            32 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                                            32 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                                            32 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "33") ? "selected='selected'" : "" ?> value="33">
                                                            33
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                                            33 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                                            33 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                                            33 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "34") ? "selected='selected'" : "" ?> value="34">
                                                            34
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                                            34 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                                            34 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                                            34 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "35") ? "selected='selected'" : "" ?> value="35">
                                                            35
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                                            35 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                                            35 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "36") ? "selected='selected'" : "" ?> value="35 3/4">
                                                            35 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "36") ? "selected='selected'" : "" ?> value="36">
                                                            36
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                                            36 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                                            36 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                                            36 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "37") ? "selected='selected'" : "" ?> value="37">
                                                            37
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                                            37 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                                            37 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                                            37 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "38") ? "selected='selected'" : "" ?> value="38">
                                                            38
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                                            38 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                                            38 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                                            38 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "39") ? "selected='selected'" : "" ?> value="39">
                                                            39
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                                            39 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                                            39 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                                            39 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "40") ? "selected='selected'" : "" ?> value="40">
                                                            40
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                                            40 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                                            40 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                                            40 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "41") ? "selected='selected'" : "" ?> value="41">
                                                            41
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                                            41 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                                            41 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                                            41 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "42") ? "selected='selected'" : "" ?> value="42">
                                                            42
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                                            42 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                                            42 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                                            42 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "43") ? "selected='selected'" : "" ?> value="43">
                                                            43
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                                            43 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                                            43 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                                            43 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "44") ? "selected='selected'" : "" ?> value="44">
                                                            44
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                                            44 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                                            44 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                                            44 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "45") ? "selected='selected'" : "" ?> value="45">
                                                            45
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                                            45 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                                            45 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                                            45 3/4
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="center">
                                                    Shoulder Type
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" size="1" name="Shoulder">
                                                        <option selected="" value="">Select Shoulder Type</option>
                                                        <option <?php echo (isset($sizeDetail->Shoulder) && $sizeDetail->Shoulder == "Sloping") ? "selected='selected'" : "" ?> value="Sloping">
                                                            Sloping
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Shoulder) && $sizeDetail->Shoulder == "Average") ? "selected='selected'" : "" ?> value="Average">
                                                            Average
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->Shoulder) && $sizeDetail->Shoulder == "Square") ? "selected='selected'" : "" ?> value="Square">
                                                            Square
                                                        </option>
                                                    </select>
                                                </td>
                                                <th>
                                                    Right Sleeve
                                                </th>
                                                <td class="center">
                                                    <select class="form-control" title="Sleeve Length"
                                                            name="SleeveLength">
                                                        <option value="">Select Sleeve Length</option>
                                                        <option value="24" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "24") ? "selected='selected'" : "" ?>>
                                                            24
                                                        </option>
                                                        <option value="24 1/4" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "24 1/4") ? "selected='selected'" : "" ?>>
                                                            24 1/4
                                                        </option>
                                                        <option value="24 1/2" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "24 1/2") ? "selected='selected'" : "" ?>>
                                                            24 1/2
                                                        </option>
                                                        <option value="24 3/4" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "24 3/4") ? "selected='selected'" : "" ?>>
                                                            24 3/4
                                                        </option>
                                                        <option value="25" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "25") ? "selected='selected'" : "" ?>>
                                                            25
                                                        </option>
                                                        <option value="25 1/4" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "25 1/4") ? "selected='selected'" : "" ?>>
                                                            25 1/4
                                                        </option>
                                                        <option value="25 1/2" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "25 1/2") ? "selected='selected'" : "" ?>>
                                                            25 1/2
                                                        </option>
                                                        <option value="25 3/4" <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "25 3/4") ? "selected='selected'" : "" ?>>
                                                            25 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "26") ? "selected='selected'" : "" ?> value="26">
                                                            26
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "26 1/4") ? "selected='selected'" : "" ?> value="26 1/4">
                                                            26 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "26 1/2") ? "selected='selected'" : "" ?> value="26 1/2">
                                                            26 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "26 3/4") ? "selected='selected'" : "" ?> value="26 3/4">
                                                            26 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "27") ? "selected='selected'" : "" ?> value="27">
                                                            27
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "27 1/4") ? "selected='selected'" : "" ?> value="27 1/4">
                                                            27 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "27 1/2") ? "selected='selected'" : "" ?> value="27 1/2">
                                                            27 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "27 3/4") ? "selected='selected'" : "" ?> value="27 3/4">
                                                            27 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "28") ? "selected='selected'" : "" ?> value="28">
                                                            28
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "28 1/4") ? "selected='selected'" : "" ?> value="28 1/4">
                                                            28 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "28 1/2") ? "selected='selected'" : "" ?> value="28 1/2">
                                                            28 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "28 3/4") ? "selected='selected'" : "" ?> value="28 3/4">
                                                            28 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "29") ? "selected='selected'" : "" ?> value="29">
                                                            29
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "29 1/4") ? "selected='selected'" : "" ?> value="29 1/4">
                                                            29 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "29 1/2") ? "selected='selected'" : "" ?> value="29 1/2">
                                                            29 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "29 3/4") ? "selected='selected'" : "" ?> value="29 3/4">
                                                            29 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "30") ? "selected='selected'" : "" ?> value="30">
                                                            30
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "30 1/4") ? "selected='selected'" : "" ?> value="30 1/4">
                                                            30 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "30 1/2") ? "selected='selected'" : "" ?> value="30 1/2">
                                                            30 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "30 3/4") ? "selected='selected'" : "" ?> value="30 3/4">
                                                            30 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "31") ? "selected='selected'" : "" ?> value="31">
                                                            31
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "31 1/4") ? "selected='selected'" : "" ?> value="31 1/4">
                                                            31 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "31 1/2") ? "selected='selected'" : "" ?> value="31 1/2">
                                                            31 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "31 3/4") ? "selected='selected'" : "" ?> value="31 3/4">
                                                            31 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "32") ? "selected='selected'" : "" ?> value="32">
                                                            32
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "32 1/4") ? "selected='selected'" : "" ?> value="32 1/4">
                                                            32 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "32 1/2") ? "selected='selected'" : "" ?> value="32 1/2">
                                                            32 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "32 3/4") ? "selected='selected'" : "" ?> value="32 3/4">
                                                            32 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "33") ? "selected='selected'" : "" ?> value="33">
                                                            33
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "33 1/4") ? "selected='selected'" : "" ?> value="33 1/4">
                                                            33 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "33 1/2") ? "selected='selected'" : "" ?> value="33 1/2">
                                                            33 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "33 3/4") ? "selected='selected'" : "" ?> value="33 3/4">
                                                            33 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "34") ? "selected='selected'" : "" ?> value="34">
                                                            34
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "34 1/4") ? "selected='selected'" : "" ?> value="34 1/4">
                                                            34 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "34 1/2") ? "selected='selected'" : "" ?> value="34 1/2">
                                                            34 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "34 3/4") ? "selected='selected'" : "" ?> value="34 3/4">
                                                            34 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "35") ? "selected='selected'" : "" ?> value="35">
                                                            35
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "35 1/4") ? "selected='selected'" : "" ?> value="35 1/4">
                                                            35 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "35 1/2") ? "selected='selected'" : "" ?> value="35 1/2">
                                                            35 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "36") ? "selected='selected'" : "" ?> value="35 3/4">
                                                            35 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "36") ? "selected='selected'" : "" ?> value="36">
                                                            36
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "36 1/4") ? "selected='selected'" : "" ?> value="36 1/4">
                                                            36 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "36 1/2") ? "selected='selected'" : "" ?> value="36 1/2">
                                                            36 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "36 3/4") ? "selected='selected'" : "" ?> value="36 3/4">
                                                            36 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "37") ? "selected='selected'" : "" ?> value="37">
                                                            37
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "37 1/4") ? "selected='selected'" : "" ?> value="37 1/4">
                                                            37 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "37 1/2") ? "selected='selected'" : "" ?> value="37 1/2">
                                                            37 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "37 3/4") ? "selected='selected'" : "" ?> value="37 3/4">
                                                            37 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "38") ? "selected='selected'" : "" ?> value="38">
                                                            38
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "38 1/4") ? "selected='selected'" : "" ?> value="38 1/4">
                                                            38 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "38 1/2") ? "selected='selected'" : "" ?> value="38 1/2">
                                                            38 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "38 3/4") ? "selected='selected'" : "" ?> value="38 3/4">
                                                            38 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "39") ? "selected='selected'" : "" ?> value="39">
                                                            39
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "39 1/4") ? "selected='selected'" : "" ?> value="39 1/4">
                                                            39 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "39 1/2") ? "selected='selected'" : "" ?> value="39 1/2">
                                                            39 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "39 3/4") ? "selected='selected'" : "" ?> value="39 3/4">
                                                            39 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "40") ? "selected='selected'" : "" ?> value="40">
                                                            40
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "40 1/4") ? "selected='selected'" : "" ?> value="40 1/4">
                                                            40 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "40 1/2") ? "selected='selected'" : "" ?> value="40 1/2">
                                                            40 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "40 3/4") ? "selected='selected'" : "" ?> value="40 3/4">
                                                            40 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "41") ? "selected='selected'" : "" ?> value="41">
                                                            41
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "41 1/4") ? "selected='selected'" : "" ?> value="41 1/4">
                                                            41 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "41 1/2") ? "selected='selected'" : "" ?> value="41 1/2">
                                                            41 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "41 3/4") ? "selected='selected'" : "" ?> value="41 3/4">
                                                            41 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "42") ? "selected='selected'" : "" ?> value="42">
                                                            42
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "42 1/4") ? "selected='selected'" : "" ?> value="42 1/4">
                                                            42 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "42 1/2") ? "selected='selected'" : "" ?> value="42 1/2">
                                                            42 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "42 3/4") ? "selected='selected'" : "" ?> value="42 3/4">
                                                            42 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "43") ? "selected='selected'" : "" ?> value="43">
                                                            43
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "43 1/4") ? "selected='selected'" : "" ?> value="43 1/4">
                                                            43 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "43 1/2") ? "selected='selected'" : "" ?> value="43 1/2">
                                                            43 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "43 3/4") ? "selected='selected'" : "" ?> value="43 3/4">
                                                            43 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "44") ? "selected='selected'" : "" ?> value="44">
                                                            44
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "44 1/4") ? "selected='selected'" : "" ?> value="44 1/4">
                                                            44 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "44 1/2") ? "selected='selected'" : "" ?> value="44 1/2">
                                                            44 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "44 3/4") ? "selected='selected'" : "" ?> value="44 3/4">
                                                            44 3/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "45") ? "selected='selected'" : "" ?> value="45">
                                                            45
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "45 1/4") ? "selected='selected'" : "" ?> value="45 1/4">
                                                            45 1/4
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "45 1/2") ? "selected='selected'" : "" ?> value="45 1/2">
                                                            45 1/2
                                                        </option>
                                                        <option <?php echo (isset($sizeDetail->LeftSleeve) && $sizeDetail->LeftSleeve == "45 3/4") ? "selected='selected'" : "" ?> value="45 3/4">
                                                            45 3/4
                                                        </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="center">
                                                    Shoulder Line
                                                </th>
                                                <td class="center">
                                                    <input class="form-control" type="text" name="ShoulderLine"
                                                           value="<?= (isset($sizeDetail->ShoulderLine)) ? $sizeDetail->ShoulderLine : ''; ?>">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="ShirtStyle">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <tbody>
                                        <?php
                                        if(count($shirtDetail) > 0){
                                        foreach ($shirtDetail as $key => $sd) {
                                        ?>
                                        <tr>
                                            <td style="font-weight: bold;" colspan="6" class="text-center">
                                                Shirt Style - <?=$key + 1;?>
                                                <a class="btn btn-primary pull-right"
                                                   href="<?= URL::to('admin/style/edit/' . $sd->ID . '/' . $orderID . '/' . $customerID . '');?>">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Shirt Type
                                            </th>
                                            <td class="center">
                                                Dress Shirt
                                            </td>
                                            <th>
                                                Pocket Style
                                            </th>
                                            <td class="center">
                                                <?= (isset($sd->PocketStyle)) ?
                                                        $sd->PocketStyle
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Monogram
                                            </th>
                                            <td class="center">
                                                <?= (isset($sd->Monogram)) ?
                                                        $sd->Monogram
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                No. of Shirts
                                            </th>
                                            <td class="center">
                                                <?= (isset($sd->Qty)) ?
                                                        $sd->Qty
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                No. of Pockets
                                            </th>
                                            <td class="center">
                                                <?= (isset($sd->NumberOfPockets)) ?
                                                        $sd->NumberOfPockets
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Position/Colors
                                            </th>
                                            <td class="center">
                                                <?= (isset($sd->MonoPosition)) ?
                                                        $sd->MonoPosition
                                                        : '';
                                                ?>/<?= (isset($sd->MonoColor)) ?
                                                        $sd->MonoColor
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Collar Stitch
                                            </th>
                                            <td class="center">
                                                <?= (isset($sd->CollarStitch)) ?
                                                        $sd->CollarStitch
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Shirt Bottom Style
                                            </th>
                                            <td class="center">
                                                <?= (isset($sd->ShirtBottomStyle)) ?
                                                        $sd->ShirtBottomStyle
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Intials
                                            </th>
                                            <td class="center">
                                                <?= (isset($sd->MonoInitials)) ?
                                                        $sd->MonoInitials
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Cuff Stitch
                                            </th>
                                            <td class="center">
                                                <?= (isset($sd->CuffStitch)) ?
                                                        $sd->CuffStitch
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Epaulettes
                                            </th>
                                            <td class="center">
                                                <?= (isset($sd->Epaulettes)) ?
                                                        $sd->Epaulettes
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Shirt Label
                                            </th>
                                            <td class="center">
                                                MCT
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                <?= (isset($sd->FabricCode)) ?
                                                        $sd->FabricCode
                                                        : '';
                                                ?>
                                            </td>
                                            <td class="center">
                                                <img src="<?= URL::to('public/assets/client/images/colrr_img.png');?>"
                                                     width="189" height="175">
                                            </td>
                                            <td>
                                                <img src="<?= URL::to('public/assets/client/images/two_button_barrel.png');?>"
                                                     width="189" height="175">
                                            </td>
                                            <td class="center" colspan="2">
                                                <img src="<?= URL::to('public/assets/client/images/back-image.jpg');?>"
                                                     width="189" height="175">
                                            </td>
                                            <td>
                                                <img src="<?= URL::to('public/assets/client/images/front-tab.jpg');?>"
                                                     width="189" height="175">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="center">
                                                Price: <?= (isset($sd->FabricPrice)) ?
                                                        $sd->FabricPrice
                                                        : '';
                                                ?>
                                            </td>
                                            <td class="center">
                                                <?= (isset($sd->CollarStyle)) ?
                                                        $sd->CollarStyle
                                                        : '';
                                                ?>
                                            </td>
                                            <td>
                                                <?= (isset($sd->CuffStyle)) ?
                                                        $sd->CuffStyle
                                                        : '';
                                                ?>
                                            </td>
                                            <td class="center" colspan="2">
                                                <?= (isset($sd->BackStyle)) ?
                                                        $sd->BackStyle
                                                        : '';
                                                ?>
                                            </td>
                                            <td>
                                                <?= (isset($sd->FrontStyle)) ?
                                                        $sd->FrontStyle
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <?php } } else{ ?>
                                        <tr>
                                            <td class="text-center" colspan="6">
                                                Not found
                                            </td>
                                        </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection