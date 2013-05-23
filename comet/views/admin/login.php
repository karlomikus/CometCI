<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign into Comet CMS Control Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Karlo Mikus">
    <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/admin/css/login.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>/assets/js/html5shiv.js"></script>
    <![endif]-->
</head>

<body>

<?php echo form_open("admin/login", array('class' => 'login-form'));?>

    <input type="text" name="identity" class="input-block-level" placeholder="Email address">
    <input type="password" name="password" class="input-block-level" placeholder="Password">

    <button class="btn btn-large btn-login btn-block" type="submit">Sign in</button>

    <a class="forgot-block" href="#">Forgot Password?</a>

<?php echo form_close();?>

</body>
</html>
