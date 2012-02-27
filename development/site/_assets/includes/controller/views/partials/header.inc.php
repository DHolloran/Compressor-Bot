<?php date_default_timezone_set('America/Chicago'); ?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if !IE 7]><style type="text/css">#wrap {display:table;height:100%}</style><![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>CompressorBot::<?php echo "$pageTitle"; ?></title>
  <meta name="description" content="">

  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?php echo"$rootDir"; ?>/_assets/img/icons/favicon.ico">
  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo"$rootDir"; ?>/_assets/css/style.css?v=2">
  <!-- Prefix free to add vendor specific prefixes -->
  <!--<script src="<?php echo"$rootDir"; ?>/_assets/js/libs/prefixfree.min.js"></script>-->
  <!--Modenizer-->
  <!--<script src="<?php echo"$rootDir"; ?>/_assets/js/libs/modernizr-2.5.2.min.js"></script>-->
</head>
<body>
  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
<div id="container">
  <!-- HEADER Section -->
    <header>
      <div class="wrapper">
        <!-- Site Nav -->
          <nav>
          <!--http://compressorbot.com-->
            <h1><a href="<?php echo"$rootDir"; ?>/">Compressor<span>Bot</span></a></h1>
            <ul>
              <!--http://compressorbot.com/compress-->
              <li><a href="<?php echo"$rootDir"; ?>/compress">Compress</a></li>
              <!--http://compressorbot.com/decompress-->
              <li><a href="<?php echo"$rootDir"; ?>/decompress">Decompress</a></li>
            </ul>
          </nav>
      <!-- Login Form -->
          <form action="#" method="POST" name="login_form" id="login_form" class="hidden">
            <input type="text" name="login_username" placeholder="user name">
            <input type="password" name="login_password" placeholder="password">
            <input type="submit" value="Login">
          </form>
      <!-- User Logged In/Logout -->
        <ul id="logged_in">
          <li>Welcome back <a href="#edit_modal" class="modal_link">DHolloran</a></li>
          <li><a href="#">Logout</a></li>
        </ul><!-- END #logged_in -->
      </div><!-- END .wrapper -->
    </header>
