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

 
?>

<div class="main">
	<div id="supersized-loader"></div><div id="supersized"></div>
	<div class="infinite">
		<script type="text/javascript">
			$(document).ready(function() {
				var img1 = '<?php bloginfo('template_url'); ?>/images/main-bg.jpg'
				
			}); //end document ready
		</script>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<img src="<?php bloginfo('template_url'); ?>/images/main.png" />	
				</div>
				<div class="col-xs-12">
					<div class="content">
						<!--<p class="main-text">“We believe architecture should be visually appealing and harness a natural approach and work as one within the surroundings.”</p>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
