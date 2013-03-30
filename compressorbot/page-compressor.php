<?php
/*
Template Name: Compressor Page Template
*/


get_template_part('templates/page', 'header');?>
<div class="row">
	<?php get_template_part('templates/content', 'loop'); ?>
</div>
<div class="row">
	<?php get_template_part('templates/content', 'css-compressor'); ?>
	<?php get_template_part('templates/content', 'js-compressor'); ?>
	<?php get_template_part('templates/content', 'html-compressor'); ?>
	<?php get_template_part('templates/content', 'compressor-options'); ?>
</div>