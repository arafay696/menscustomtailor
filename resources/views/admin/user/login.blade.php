<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MCT Admin - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL::asset('public/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo URL::asset('public/assets/admin/bower_components/metisMenu/dist/metisMenu.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URL::asset('public/assets/admin/dist/css/sb-admin-2.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo URL::asset('public/assets/admin/bower_components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

    <style>
        .errorMsgs, .successMsgs {
            position: fixed;
            right: 0;
            top: 84px;
            z-index: 99999;
            display: none;
            max-width: 500px;
            min-width: 500px;
            width: 500px;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    @if(Session::has('globalErrMsg'))
        <div style="display:block;" class="setOutputSession errorMsgs alert {{ Session::get('alert-class', 'alert-info') }}">
            <span>{{ Session::get('globalErrMsg') }}</span>
            <span class="fa fa-1x fa-times pull-right closeSessionOutput"></span>
        </div>

    @endif

    @if(Session::has('globalSuccessMsg'))
        <div style="display:block;" class="setOutputSession successMsgs alert {{ Session::get('alert-class', 'alert-info') }}">
            <span>{{ Session::get('globalSuccessMsg') }}</span>
            <span class="fa fa-1x fa-times pull-right closeSessionOutput"></span>
        </div>

    @endif
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                        </div>
                    @endif
                    <form action="<?php echo URL::to('admin/auth'); ?>" method="post" role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <fieldset>
                            <div class="form-group">
                                <select name="company" class="form-control">
                                    <?php foreach($merchants as $merchant) { ?>
                                    <option>{{$merchant->Company}}</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo URL::asset('public/assets/admin/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo URL::asset('public/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo URL::asset('public/assets/admin/bower_components/metisMenu/dist/metisMenu.min.js'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo URL::asset('public/assets/admin/dist/js/sb-admin-2.js'); ?>"></script>
<script src="<?php echo URL::asset('public/assets/admin/js/app.js'); ?>"></script>
</body>

</html>
