<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="main-title"><?php echo $post->post_title; ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<?php echo $post->post_content; ?>		
		</div>
	</div>
<?php get_footer(); ?>

