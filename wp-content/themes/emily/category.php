<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="main-title"><?php echo get_queried_object()->name; ?></h2>
		</div>
	</div>
	<div class="row">
		<?php 
		//echo var_export(get_queried_object()->name);
			$args = array ( 'category' => get_queried_object()->term_id, 'order' => 'ASC', 'posts_per_page' => -1 );
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post); ?>
				<div class="col-xs-4 col-md-4 col-lg-3">
					<div class="product">
						<div class="product-image">
							<?php	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );	?>
							<img src="<?php echo $img[0]; ?>" />
						</div>
						<a href="<?php echo $post->guid; ?>"><?php echo $post->post_title ?></a>
						<span>Click for more info</span>
					</div>
				</div>
			<?php endforeach; ?>
	</div>
<?php get_footer(); ?>
