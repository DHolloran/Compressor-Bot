<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
  <div id="wrap">
    <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->

    <?php
      do_action('get_header');
      get_template_part('templates/header-top-navbar');
    ?>
    <div class="wrap container" role="document">
      <div class="content row">
        <div class="main <?php echo roots_main_class(); ?>" role="main">
          <?php include roots_template_path(); ?>
        </div><!-- /.main -->
        <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
  </div>
  <?php get_template_part('templates/footer'); ?>

</body>
</html>
