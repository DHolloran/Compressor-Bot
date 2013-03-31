<div class="header-loader-animation">&nbsp;</div>
<header class="banner navbar navbar-static-top" role="banner">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo home_url(); ?>/"><span class="theme-color">Compressor</span>Bot</a>
			<nav class="nav-main nav-collapse" role="navigation">
				<?php
					if (has_nav_menu('primary_navigation')) :
						wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav'));
					endif;
				?>
			</nav>
		</div>
	</div>

	<div class="search-bar">
		<div class="container">
			<div class="hidden-phone hidden-tablet pull-left"><?php get_template_part('templates/page', 'header'); ?></div>
		</div>
	</div> <!-- /.search-bar -->

</header>