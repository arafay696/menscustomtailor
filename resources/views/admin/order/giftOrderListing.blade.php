@extends('admin.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Gift Order Listing</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Gift Order List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Purchase Email</th>
                                    <th>Recipient Email</th>
                                    <th>Amount</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($orders as $order) { ?>
                                <tr>
                                    <td class="center">
                                        <?=$order->purchaser_email;?>
                                    </td>
                                    <td class="center">
                                        <?=$order->rec_email;?>
                                    </td>
                                    <td class="center">
                                        <?=number_format((float)$order->amount, 2);?>
                                    </td>
                                    <td class="center">
                                        <?php echo date('d F Y h.i A', strtotime($order->datetime));?>
                                    </td>
                                    <td class="center">
                                        <span class="label <?=($order->status == 1) ? 'label-warning' : 'label-success'; ?>">
                                        <?=($order->status == 1) ? "No Used" : "Used";?>
                                        </span>
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