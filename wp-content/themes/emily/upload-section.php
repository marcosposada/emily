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
global $upload;

$upload = get_post(31);
setup_postdata($upload);
//echo var_export($upload);

?>

<div id="upload">
	<div class="infinite">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title">
						<h2><?php echo $upload->post_title; ?></h2>
						<div class="content">
							<?php echo the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
