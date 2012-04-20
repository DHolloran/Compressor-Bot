<?php
  // Require PageView
  require_once "{$rootDir}/_assets/includes/controller/PageView.php";
  // Require Functions
  require_once "{$rootDir}/_assets/includes/helpers/functions.php";
  $loginView = 'login_form';
  //Check if user is logged in
  /*session_start();
  //Check if user has access to view page
  if($pageTitle === 'Compress' || $pageTitle === 'Decompress'){
    if(!isset($_SESSION['logged_in'])){
      header($homePage);
      exit;
    }
  }
  if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']){
    $loginView = 'logged_in';
  }*/
  // Set Default Timezone
  date_default_timezone_set('America/Chicago');
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if !IE 7]><style type="text/css">#wrap {display:table;height:100%}</style><![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<!-- Flow Analytics Chart --><script type="text/javascript">(function(d,c){var a,b,g,e;a=d.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===d.location.protocol?"https:":"http:")+'//api.mixpanel.com/site_media/js/api/mixpanel.2.js';b=d.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);c._i=[];c.init=function(a,d,f){var b=c;"undefined"!==typeof f?b=c[f]=[]:f="mixpanel";g="disable track track_links track_forms register register_once unregister identify name_tag set_config".split(" ");for(e=0;e<
g.length;e++)(function(a){b[a]=function(){b.push([a].concat(Array.prototype.slice.call(arguments,0)))}})(g[e]);c._i.push([a,d,f])};window.mixpanel=c})(document,[]);
mixpanel.init("9e095061dd428a02a99c44e0706ebc2e");</script><!-- End Flow Analytics -->
<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>CompressorBot::<?php echo "$pageTitle"; ?></title>
  <meta name="description" content="">

  <!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?php echo"{$assets}/img/icons/favicon.png"; ?>">
  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo"{$assets}/css/style.css?v=9";?>">
  <!-- Prefix free to add vendor specific prefixes -->
  <!--<script src="<?php //echo"$assets/js/libs/prefixfree.min.js"; ?>"></script>-->
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
            <h1><a href="<?php echo"{$homePage}"; ?>">Compressor<span>Bot</span></a></h1>
            <ul>
              <!--http://compressorbot.com/compress-->
              <li><a href="<?php echo"{$homePage}/compress";?>">Compress</a></li>
              <!--http://compressorbot.com/decompress-->
              <li><a href="<?php echo"{$homePage}/decompress";?>">Decompress</a></li>
            </ul>
          </nav>
          <?php
            // $model = new PageView();
            // $model->show($loginView,'partials')
          ?>
      </div><!-- END .wrapper -->
    </header>
