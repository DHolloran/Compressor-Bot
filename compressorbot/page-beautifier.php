<?php
/*
Template Name: Beautifier Page Template
*/


get_template_part('templates/page', 'header');?>
<div class="row">
	<?php get_template_part('templates/content', 'loop'); ?>
</div>
<div class="row">
	<?php get_template_part('templates/content', 'css-beautifier'); ?>
	<?php get_template_part('templates/content', 'js-beautifier'); ?>
	<?php get_template_part('templates/content', 'html-beautifier'); ?>
	<?php get_template_part('templates/content', 'beautifier-options'); ?>
</div>