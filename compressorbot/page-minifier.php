<?php
/*
Template Name: Minifier Page Template
*/


get_template_part('templates/page', 'header');?>
<div class="row">
	<?php get_template_part('templates/content', 'loop'); ?>
</div>
<div class="row">
	<?php get_template_part('templates/content', 'css-minifier'); ?>
	<?php get_template_part('templates/content', 'js-minifier'); ?>
	<?php get_template_part('templates/content', 'html-minifier'); ?>
	<?php get_template_part('templates/content', 'minifier-options'); ?>
</div>