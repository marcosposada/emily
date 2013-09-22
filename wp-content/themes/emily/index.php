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
<?php get_template_part('main-section'); ?>
<?php get_template_part('about-section'); ?>
<?php get_template_part('services-section'); ?>
<?php get_template_part('projects-section'); ?>
<?php get_template_part('hello-section'); ?>
<?php get_footer(); ?>