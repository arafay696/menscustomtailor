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
                        Order Detail - <?= (isset($orderDetail->GOrderNo)) ?
                                $orderDetail->GOrderNo
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
                        Order Detail - <?= (isset($orderDetail->GOrderNo)) ?
                                $orderDetail->GOrderNo
                                : '';
                        ?>
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
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                Height
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->HeightFeet)) ?
                                                        $sizeDetail->HeightFeet . '.' . $sizeDetail->HeightInches . '"'
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Weight
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->Weight)) ?
                                                        $sizeDetail->Weight
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Neck Height
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->NeckHeight)) ?
                                                        $sizeDetail->NeckHeight
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Neck Size
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->NeckSize)) ?
                                                        $sizeDetail->NeckSize
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Chest Description
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->ChestDescription)) ?
                                                        $sizeDetail->ChestDescription
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Chest
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->Chest)) ?
                                                        $sizeDetail->Chest
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Fitting Option
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->FittingOption)) ?
                                                        $sizeDetail->FittingOption
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Waist
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->Waist)) ?
                                                        $sizeDetail->Waist
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Posture
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->Posture)) ?
                                                        $sizeDetail->Posture
                                                        : '';
                                                ?>
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
                                                <?= (isset($sizeDetail->ArmType)) ?
                                                        $sizeDetail->ArmType
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Yoke
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->Yoke)) ?
                                                        $sizeDetail->Yoke
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Body Proportions
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->BodyProportion)) ?
                                                        $sizeDetail->BodyProportion
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Tail
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->Tail)) ?
                                                        $sizeDetail->Tail
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Body Shape
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->BodyShape)) ?
                                                        $sizeDetail->BodyShape
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Left Sleeve
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->LeftSleeve)) ?
                                                        $sizeDetail->LeftSleeve
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Shoulder Type
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->Shoulder)) ?
                                                        $sizeDetail->Shoulder
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Right Sleeve
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->RightSleeve)) ?
                                                        $sizeDetail->RightSleeve
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="center">
                                                Shoulder Line
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->ShoulderLine)) ?
                                                        $sizeDetail->ShoulderLine
                                                        : '';
                                                ?>
                                            </td>
                                            <th>
                                                Left Wrist
                                            </th>
                                            <td class="center">
                                                <?= (isset($sizeDetail->LeftSleeve)) ?
                                                        $sizeDetail->LeftSleeve
                                                        : '';
                                                ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
                                                Shirt Style - <?=$key+1;?>
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
                                               <img src="<?= URL::to('public/assets/client/images/colrr_img.png');?>" width="189" height="175">
                                            </td>
                                            <td>
                                                <img src="<?= URL::to('public/assets/client/images/two_button_barrel.png');?>" width="189" height="175">
                                            </td>
                                            <td class="center" colspan="2">
                                                <img src="<?= URL::to('public/assets/client/images/back-image.jpg');?>" width="189" height="175">
                                            </td>
                                            <td>
                                                <img src="<?= URL::to('public/assets/client/images/front-tab.jpg');?>" width="189" height="175">
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