@extends('admin.default')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Discount Generator</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Generate Discount
                    </div>
                    <form name="myForm" role="form" method="post"
                          action="<?php echo URL::to('admin/discount/generateIt'); ?>">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="spacer-2x"></span>
                                </div>
                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label>Dicount Code</label>
                                        <input class="form-control" type="text" name="code">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Discount Percentage</label>
                                            <input type="number" class="form-control" name="discountPercentage">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">
                                                Active
                                            </option>
                                            <option value="0">
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <input id="startdate" class="form-control" type="text" name="startDate" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <input id="enddate" class="form-control" name="endDate" placeholder="Enter text">
                                        </div>
                                    </div>



                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" name="description">

                                        </textarea>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-12">
                                    <button type="reset" class="btn btn-primary pull-right" style="margin-left: 4px;">
                                        Reset Button
                                    </button>
                                    <button type="submit" class="btn btn-success pull-right">
                                        Generate
                                    </button>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

                        </div>

                    </form>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection