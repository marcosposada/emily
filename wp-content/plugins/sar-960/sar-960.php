<?php
/*
Plugin Name: SAR 960
Version: v1.0
Author: Chris Brabender
Description: SAR 960 Provides the 960gs shortcodes right in the wordpress editor.

Copyright 2010  Chris Brabender  (email: chrisb[at]smithandrowe[dot]com[dot]au)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

if(!class_exists("Sar960")){

	class Sar960 {

		var $plugin_url;

		var $use_custom;

		function Sar960() { //constructor

			// define the plugin URL so we can add the CSS
			$this->plugin_url  = $this->plugin_url = defined('WP_PLUGIN_URL') ? WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)) : trailingslashit(get_bloginfo('wpurl')) . PLUGINDIR . '/' . dirname(plugin_basename(__FILE__));

			// define column shortcodes
			add_shortcode('960_one', array(&$this, 'sarcol_one_col'));
			add_shortcode('960_two', array(&$this, 'sarcol_two_col'));
			add_shortcode('960_three', array(&$this, 'sarcol_three_col'));
			add_shortcode('960_four', array(&$this, 'sarcol_four_col'));
			add_shortcode('960_five', array(&$this, 'sarcol_five_col'));
			add_shortcode('960_six', array(&$this, 'sarcol_six_col'));
			add_shortcode('960_seven', array(&$this, 'sarcol_seven_col'));
			add_shortcode('960_eight', array(&$this, 'sarcol_eight_col'));
			add_shortcode('960_nine', array(&$this, 'sarcol_nine_col'));
			add_shortcode('960_ten', array(&$this, 'sarcol_ten_col'));
			add_shortcode('960_eleven', array(&$this, 'sarcol_eleven_col'));
			add_shortcode('960_twelve', array(&$this, 'sarcol_twelve_col'));
			add_shortcode('960_div', array(&$this, '960_div'));
			// add to tinyMCE
			add_action('init', array(&$this, 'add_tinymce'));

		} // end function EasyColumns

		function sarcol_one_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_1') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_two_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_2') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_three_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_3') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_four_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_4') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_five_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_5') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_six_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_6') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_seven_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_7') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_eight_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_8') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_nine_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_9') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_ten_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_10') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_eleven_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_11') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_twelve_col($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'grid_12') . '>'.$this->sarcol_strip_autop($content).'</div>';
		}
		
		function sarcol_div($atts, $content = null) {
			return '<div' . $this->sarcol_div_atts($atts,'') . '>' . $this->sarcol_strip_autop($content) . '</div>';
		}

		function sarcol_add_divider(){
			return '<div class="sarcol-divider"></div>';
		}

		function sarcol_div_atts($atts,$col_type) {
			extract(shortcode_atts(array('id' => '','class' => '','style' => ''),$atts));

			$att_str = ' class="';
			if($col_type != ''){
				$att_str .= $col_type;
			}
			if($col_type != '' && $class != ''){
				$att_str .= ' ';
			}
			if($class != ''){
				$att_str .= $class;
			}
			$att_str .= '"';
			if($id != ''){
				$att_str .= ' id="' . $id . '"';
			}
			if($style != ''){
				$att_str .= ' style="' . $style . '"';
			}
			return $att_str;
		}

		function sarcol_strip_autop($content){
			$content = do_shortcode(shortcode_unautop( $content ));
			$content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);
			return $content;
		}

		function sarcol_add_css(){
		?>
			<?php
			if($this->use_custom)
			{
				
			} // end if($this->use_custom)
		}// end wpcol_add_css

		// begin functions for adding plugin to tinyMCE
		function add_tinymce() {
			if(!current_user_can('edit_posts') && ! current_user_can('edit_pages')) {
				return;
			}
			if(get_user_option('rich_editing') == 'true') {
				add_filter('mce_external_plugins', array(&$this, 'add_tinymce_plugin'));
				add_filter('mce_buttons', array(&$this, 'add_tinymce_button'));
			}
		}
		function add_tinymce_plugin($plugin_array) {
			$plugin_array['sar960'] = $this->plugin_url . '/tinymce/editor_plugin.js';
			return $plugin_array;
		}
		function add_tinymce_button($buttons) {
			array_push($buttons, "separator", 'sar960');
			return $buttons;
		}
		// end functions for adding plugin to tinyMCE

		/*
		install and initialize the plugin
		*/
		function install()
		{
		} // end install

		/*
		uninstall the plugin - removes options
		*/
		function uninstall() {
		} // end uninstall


	} // end class EasyColumns

} // end if class exists

// initialize the EasyColumns class
if (class_exists("Sar960")) {
	$wp_sar_columns = new Sar960();
}

// set up actions and filters
if (isset($wp_sar_columns)) {
	add_action('wp_head', array(&$wp_sar_columns, 'sarcol_add_css'), 100);
	if (function_exists('register_uninstall_hook'))
	{
		register_uninstall_hook(__FILE__, array(&$wp_wp_columns, 'uninstall'));
	}
}
?>