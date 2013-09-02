<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div class="container">
	<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php echo the_content(); ?>
			<?php endwhile; // end of the loop. ?>
	</div><!--single.php-->
<?php get_footer(); ?>