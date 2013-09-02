<?php
/**
 * Template Name: Showcase
 */
$catID = get_the_category($post->ID);
get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<?php if(get_post_meta($post->ID, 'gallery', true)) { ?>
					<div class="product-gallery">
						<ul class="slides">
							<?php 
								$galleryitems = get_post_meta($post->ID, 'gallery', true);
								$galleryitems = explode(',', $galleryitems);
								
								$i = 0;
								foreach ($galleryitems as $image) {
									$element = "<a href=".$image."><img src=".$image." class='gallery' /></a>"; 
									if ($i == 0) {
										echo  "<li>". $element ."</li>";
									}else{
										echo  "<li>". $element ."</li>";
									}
									$i++;
								}		
							?>
						</ul>
						
					</div>
					<div class="product-thumbnails">
						<ul class="slides">
							<?php 

								$ii = 0;
								foreach ($galleryitems as $image) {
									$element = "<img src=".$image." class='gallery' width='80' />"; 
									if ($i == 0) {
										echo  "<li>". $element ."</li>";
									}else{
										echo  "<li>". $element ."</li>";
									}
									$ii++;
								}		
							?>
						</ul>
						
					</div>
					
				<?php } else {?>
					<div class="featured-image">
						<?php	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $bbq->ID ), 'full' );	?>
						<a href="<?php echo $img[0]; ?>"><img src="<?php echo $img[0]; ?>" /></a>
					</div>
				<?php }?>
				<span class="zoom">Click to zoom</span>
			</div>
			<div class="col-lg-7">
				<div class="row">
					<div class="col-lg-12"><h2 class="product-title"><?php echo the_title(); ?></h2></div>
				</div>
				<div class="row">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<div class="product-content">
							
							<?php echo the_content();?>
						</div>

					<?php endwhile; endif; ?>
								
				</div>
				<hr />
				<?php if (get_post_meta($post->ID, 'download-specs', true)) { ?>
					<?php $link = get_post_meta($post->ID, 'download-specs', true); ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="download">
								<a href="<?php echo $link; ?>" target="_blank"><i class="icon icon-download icon-2x"> <span>Download Specs for this Product</span></i></a>	
							</div>
						</div>
					</div>
				<hr />
				<?php }?>
				
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h4 class="main-title">Check our other <?php echo strtolower($catID[0]->name); ?></h4>
			</div>
		</div>
		<div class="row">
			<?php 
			
			//echo var_export($catID[0]->term_id);
			$args = array(
				'posts_per_page' => -1,
				'offset'           => 0,
				'category'         => $catID[0]->term_id,
				'orderby'          => 'post_date',
				'order'            => 'ASC',
				'post_type'        => 'post',
				'post_status'      => 'publish',
				'suppress_filters' => true ); 
			?>
			<?php $barbecues = get_posts( $args ); $i = 0; ?> 
				<?php foreach ( $barbecues as $bbq ) : setup_postdata( $bbq ); ?>
					<?php if ($bbq->ID != $post->ID) { ?>
						<div class="col-lg-2">
							<div class="product">
								<div class="product-image">
									<?php	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $bbq->ID ), 'full' );	?>
									<img src="<?php echo $img[0]; ?>" />
								</div>	
								<a href="<?php echo $bbq->guid; ?>"><?php echo $bbq->post_title ?></a>
								<span>Click for more info</span>	
							</div>
						</div>
					<?php } ?>
				<?php endforeach;	wp_reset_postdata();	?>
		</div>
</div>
<?php get_footer(); ?>

