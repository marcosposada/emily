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
global $services;

$services = get_post(6);
setup_postdata($services);
//echo var_export($services);

$design = get_post(34);


$documentation = get_post(36);


$management = get_post(38);


?>

<div id="services">
	<div class="infinite">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="title">
						<h2><?php echo $services->post_title; ?></h2>
						<div class="content">
							<?php echo the_content(); ?>
							
						</div>
					</div>
				</div>
				<br />
				<div class="col-xs-12">
					<div class="panel-group" id="accordion">
						<div class="col-xs-4">
							<div class="panel panel-default">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a id="design" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							          <?php echo $design->post_title; ?>
							        </a>
							      </h4>
							    </div>
							    <div id="collapseOne" class="panel-collapse collapse">
							      <div class="panel-body">
							        <?php echo $design->post_content; ?>
							        
							      </div>
							    </div>
							  </div>
						</div><!--col-4-->
					  	<div class="col-xs-4">
							<div class="panel panel-default">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a id="documentation" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
							          <?php echo $documentation->post_title; ?>
							        </a>
							      </h4>
							    </div>
							    <div id="collapseTwo" class="panel-collapse collapse">
							      <div class="panel-body">
							        <?php echo $documentation->post_content; ?>
							      </div>
							    </div>
							  </div>
						</div><!--col-4-->
						<div class="col-xs-4">
							<div class="panel panel-default">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a id="management" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
							          <?php echo $management->post_title; ?>
							        </a>
							      </h4>
							    </div>
							    <div id="collapseThree" class="panel-collapse collapse">
							      <div class="panel-body">
							        <?php echo $management->post_content; ?>
							      </div>
							    </div>
							  </div>
						</div><!--col-4-->
					 
					 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
