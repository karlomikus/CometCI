<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign in &middot; Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }

    </style>
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>/assets/js/html5shiv.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/ico/favicon.png">
</head>

<body>

<div class="container">

    <?php echo form_open("admin/login", array('class' => 'form-signin'));?>

        <h2 class="form-signin-heading">Please sign in</h2>

        <input type="text" name="identity" class="input-block-level" placeholder="Email address">
        <input type="password" name="password" class="input-block-level" placeholder="Password">

        <label class="checkbox">
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember me
        </label>

        <button class="btn btn-large btn-primary" type="submit">Sign in</button>

    <?php echo form_close();?>

</div> <!-- /container -->

<script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-transition.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-alert.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-modal.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-scrollspy.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-tab.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-popover.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-button.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-collapse.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-carousel.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-typeahead.js"></script>

</body>
</html>
