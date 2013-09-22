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
global $hello;

$hello = get_post(27);
setup_postdata($hello);
//echo var_export($hello);

?>

<div id="hello">
	<div class="infinite">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title">
						<h2><?php echo $hello->post_title; ?></h2>
						<div class="content">
							<?php echo the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
