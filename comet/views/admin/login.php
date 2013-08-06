<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign into Comet CMS Control Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kami Design">
    <link href="<?php echo base_url(); ?>assets/admin/css/main.css" rel="stylesheet">
    <style type="text/css">
        *, a:focus { outline: none; }
        body {
            font-size: 16px;
            font-family: 'Merriweather Sans', sans-serif;
            color: #47505e;
            font-weight: lighter;
            background: #eee;
            position: relative;
            min-height: 100%;
            margin: 150px 0 0 0;
        }

        textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, 
        input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, 
        input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, 
        input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus, .uneditable-input:focus {
            border-color: #22c7b6;
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
        }

        textarea, input[type="text"], input[type="password"], 
        input[type="datetime"], input[type="datetime-local"], 
        input[type="date"], input[type="month"], input[type="time"], 
        input[type="week"], input[type="number"], input[type="email"], 
        input[type="url"], input[type="search"], input[type="tel"], 
        input[type="color"], .uneditable-input {
            border: 2px solid rgba(255,255,255,0.3);
            background: none;
            color: #fff;
            border-radius: 0;
            font-size: 18px;
            height: 40px;
            line-height: 40px;
        }

        .login-form {
            width: 400px;
            margin: 0 auto;
            text-align: center;
            background: #394c5a;
            padding: 20px;
        }

        .btn-login {
            background: #d95c4b;
            box-shadow: none;
            border-radius: 0;
            border: none;
            text-shadow: none;
            color: #fff;
            margin-bottom: 10px;
        }

        .btn-login:hover {
            background: #22c7b6;
            color: #fff;
        }

        .forgot-block {
            background: rgba(255,255,255,0.3);
            padding: 13px 0;
            color: #fff;
            display: block;
        }

        .forgot-block:hover {
            background: #22c7b6;
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body>

<?php echo form_open("admin/login", array('class' => 'login-form'));?>

    <input type="text" name="identity" class="input-block-level" placeholder="Email / Username">
    <input type="password" name="password" class="input-block-level" placeholder="Password">

    <button class="btn btn-large btn-login btn-block" type="submit">Sign in</button>

    <a class="forgot-block" href="#">Forgot Password?</a>

<?php echo form_close();?>

</body>
</html>
