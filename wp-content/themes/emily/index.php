<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>
<div class="container">
	<div class="row">
		
		
		
		<!-- Loop begins for Products-->
		<?php $args = array(
			'offset'           => 0,
			'category'         => 3,
			'orderby'          => 'post_date',
			'order'            => 'ASC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true ); 
		?>
		<?php $barbecues = get_posts( $args ); $i == 0 ?>
		<div class="col-xs-12 col-lg-12">
			<div class="bbq-description">
				<h4>Gas Kettle Barbecues</h4>
				<p>Products of OUTDOORCHEF are characterised by a very high quality, as well as having a special innovative product technology. A highly acclaimed design and detailed features – which were developed in Switzerland – make your barbecue an uncomplicated and comfortable experience.</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="bbq-container">
			
			<?php foreach ( $barbecues as $bbq ) : setup_postdata( $bbq ); ?>
				<div class="bbq col-xs-6">
					<div class="product-image">
						<?php	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $bbq->ID ), 'full' );	?>
						<img src="<?php echo $img[0]; ?>" />
					</div>
					<a href="<?php echo $bbq->guid; ?>"><?php echo $bbq->post_title ?></a>
					<span>Click for more info</span>
				</div>
			<?php endforeach;	wp_reset_postdata();	?>
		</div>
	</div><!-- end of row -->
	<div class="row">
		<hr />
		<div class="col-xs-12 col-lg-4">
			<div class="featured-block">
				<h2>Healthy Barbecuing</h2>
				<img src="<?php echo bloginfo('template_url'); ?>/images/home/featured-01.jpg" />
			</div>
		</div>
		<div class="col-xs-12  col-lg-4">
			<div class="featured-block">
				<h2>Two In One</h2>
				<img src="<?php echo bloginfo('template_url'); ?>/images/home/featured-02.jpg" />
			</div>
		</div>
		<div class="col-xs-12  col-lg-4">
			<div class="featured-block">
				<h2>The Globular All-Rounder</h2>
				<img src="<?php echo bloginfo('template_url'); ?>/images/home/featured-03.jpg" />
			</div>
		</div>
	</div>
<?php get_footer(); ?>