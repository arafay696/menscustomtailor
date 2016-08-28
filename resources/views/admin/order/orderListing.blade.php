@extends('admin.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order Listing</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Order List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Order #</th>
                                    <th>Customer Name</th>
                                    <th>Order Placed</th>
                                    <th>Order Date</th>
                                    <th>Promise Date</th>
                                    <th>Order Amount</th>
                                    <th>Paid</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($orders as $order) { ?>
                                <tr style="background-color: <?php echo ($order->StatusText == 'New Order') ? ($order->OrderType == 'Customer') ? '#ffdfbf' : '' : '#DFFFDF'; ?>">
                                    <td class="center">

                                    </td>
                                    <td class="center" style="text-decoration: underline;">
                                        <a href="<?php echo URL::to('admin/order/'.$order->OrderID.'/'.$order->CustomerID.'') ?>">
                                            <?=$order->GOrderNo;?>
                                        </a>
                                    </td>
                                    <td class="center">
                                        <?=$order->Name;?>
                                    </td>
                                    <td>
                                        <?=$order->PlacedFor;?>
                                    </td>
                                    <td class="center">
                                        <?php echo date('d F Y h.i A', strtotime($order->OrderDate));?>
                                    </td>
                                    <td class="center">
                                        <?php echo date('d F Y h.i A', strtotime($order->PromiseDate));?>
                                    </td>
                                    <td class="center">
                                        <?=number_format($order->Price,2);?>
                                    </td>
                                    <td class="center">
                                        <?=number_format($order->Paid,2);?>
                                    </td>
                                    <td class="center">
                                        <?=$order->OrderStatus;?>
                                    </td>
                                    <td class="center">
                                        <?=$order->StatusText;?>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->
@endsection