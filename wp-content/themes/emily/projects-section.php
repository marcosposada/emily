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
 * @package Colouralia
 * @subpackage Emily Armstrong
 */
$args = array(
	'posts_per_page'   => -1,
	'offset'           => 0,
	'category'         => '5',
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true ); 
	
$projects = get_posts( $args );

?>

<div id="projects">
	<div class="infinite">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title">
						<h2>Projects</h2>
					</div>
				</div>
				<?php foreach ($projects as $project) { ?>
					<div class="col-md-4 col-lg-4">
						<div class="project">
							<?php echo get_the_post_thumbnail( $project->ID, 'full'); ?>
							<div class="project-link">
								<a href="<?php echo $project->guid; ?>"><?php echo $project->post_title; ?></a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
