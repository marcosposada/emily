<?php
/**
 * @version   1.26 September 14, 2012
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// no direct access
?>

<?php global $post, $posts, $query_string; ?>

	<div class="rt-wordpress">
		<div class="rt-blog">
	
			<?php if ($gantry->get('blog-page-title') != '') : ?>
			
			<h1 class="rt-pagetitle">
				<?php echo $gantry->get('blog-page-title'); ?>
			</h1>
			
			<?php endif; ?>
			
			<div class="rt-leading-articles">
			
				<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
				if ($gantry->get('blog-query') != '') : 
				
					$custom_query = new WP_Query('posts_per_page='.$gantry->get('blog-count').'&paged='.$paged.'&'.$gantry->get('blog-query'));
				
				else: 
				
					$custom_query = new WP_Query('posts_per_page='.$gantry->get('blog-count').'&paged='.$paged.'&orderby='.$gantry->get('blog-order').'&cat='.$gantry->get('blog-cat').'&post_type='.$gantry->get('blog-type'));
				
				endif; 
				
				?>
		
				<?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
			
				<!-- Begin Post -->
			
				<div class="rt-article">					
					<div class="rt-article-bg">
						<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							
							<?php if($gantry->get('blog-title')) : ?>
			
							<!-- Begin Title -->
						
							<div class="rt-headline">
								
								<?php if($gantry->get('blog-link-title')) : ?>
								
								<h1 class="rt-article-title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</h1>
									
								<?php else : ?>
									
								<h1 class="rt-article-title">
									<?php the_title(); ?>
								</h1>
									
								<?php endif; ?>
									
							</div>
							<div class="clear"></div>
								
							<!-- End Title -->
								
							<?php endif; ?>
							
							<div class="rt-article-content">
							
								<?php if($gantry->get('blog-meta-comments') || $gantry->get('blog-meta-date') || $gantry->get('blog-meta-modified') || $gantry->get('blog-meta-author')) : ?>
									
								<!-- Begin Meta -->
								
								<div class="rt-articleinfo">
								
									<?php if($gantry->get('blog-meta-date')) : ?>
									
									<!-- Begin Date & Time -->
				
									<span class="rt-date-posted"><!--<?php _re('Posted on'); ?> --><span><?php the_time('l, d F, Y H:i'); ?></span></span>
									
									<!-- End Date & Time -->
									
									<?php endif; ?>
									
									<?php if($gantry->get('blog-meta-modified')) : ?>
									
									<!-- Begin Modified Date -->
				
									<span class="rt-date-modified"><?php _re('Last Updated on'); ?> <?php the_modified_date('l, d F, Y H:i', '<span>', '</span>'); ?></span>
									
									<!-- End Modified Date -->
									
									<?php endif; ?>
										
									<?php if($gantry->get('blog-meta-author')) : ?>
								
									<!-- Begin Author -->
								
									<span class="rt-author"><?php _re('Written by'); ?> <span><?php the_author(); ?></span></span>
									
									<!-- End Author -->
									
									<?php endif; ?>
									
									<?php if($gantry->get('blog-meta-comments')) : ?>
										
										<!-- Begin Comments -->
										
										<?php if($gantry->get('blog-meta-link-comments')) : ?>
										
										<div class="rt-comment-block">
											<a href="<?php the_permalink(); ?>#comments">
												<span class="rt-comment-text"><?php comments_number(_r('0 Comments'), _r('1 Comment'), _r('% Comments')); ?></span>
											</a>
										</div>
		
										<?php else : ?>
					
										<div class="rt-comment-block">
											<span class="rt-comment-text"><?php comments_number(_r('0 Comments'), _r('1 Comment'), _r('% Comments')); ?></span>
										</div>
										
										<?php endif; ?>
										
										<!-- End Comments -->
									
									<?php endif; ?>
									
								</div>
								
								<!-- End Meta -->
								
								<?php endif; ?>

								<!-- Begin Thumbnail -->
					
								<p>
									<?php if(function_exists('the_post_thumbnail') && has_post_thumbnail()) : the_post_thumbnail('gantryThumb', array('class' => 'rt-image '.$gantry->get('thumb-position'))); endif; ?>					
								</p>

								<!-- End Thumbnail -->
									
								<!-- Begin Post Content -->		
							
								<?php if($gantry->get('blog-content') == 'content') : ?>
								
								<?php the_content(false); ?>
													
								<?php else : ?>
													
								<?php the_excerpt(); ?>
														
								<?php endif; ?>
								
								<?php if(preg_match('/<!--more(.*?)?-->/', $post->post_content)) : ?>
								
								<p class="rt-readon-surround">																			
									<a href="<?php the_permalink(); ?>" class="readon"><span><?php _re('Read more ...'); ?></span></a>
								</p>
								
								<?php endif; ?>
								
								<div class="clear"></div>
								
								<!-- End Post Content -->
							
							</div>							
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				
				<!-- End Post -->
				
				<?php endwhile;?>
				
				<!-- Begin Navigation -->

				<?php if($custom_query->max_num_pages > 1) : ?>
											
				<div class="rt-pagination nav">
					<div class="alignleft">
						<?php next_posts_link('&laquo; '._r('Older Entries'), $custom_query->max_num_pages); ?>
					</div>
					<div class="alignright">
						<?php previous_posts_link(_r('Newer Entries').' &raquo;', $custom_query->max_num_pages) ?>
					</div>
					<div class="clear"></div>
				</div><br />
							
				<?php endif; ?>
		
				<!-- End Navigation -->
	
			</div>
		</div>
	</div>