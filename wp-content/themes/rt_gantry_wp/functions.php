<?php
/**
 * @version   1.0 August 16, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

/**
 * Check to see if Gantry is Active
 * 
 * @return bool
 */
function gantry_theme_is_gantry_active()
{
    $active = false;
    $active_plugins = get_option('active_plugins');
    if (in_array('gantry/gantry.php', $active_plugins)) {
        $active = true;
    }
    if (!function_exists('is_plugin_active_for_network'))
        require_once(ABSPATH . '/wp-admin/includes/plugin.php');
    if (is_plugin_active_for_network('gantry/gantry.php')) {
        $active = true;
    }
    return $active;
}

/**
 * @return void
 */
function gantry_admin_missing_nag()
{
    $msg = __('The active theme requires the Gantry Framework Plugin to be installed and active');
    echo "<div class='update-nag'>$msg</div>";
}

/**
 * @return void
 */
function gantry_missing_nag()
{
    echo "This theme requires the Gantry Framework Plugin to be installed and active.";
    die(0);
}


if (!gantry_theme_is_gantry_active()) {
    if (!is_admin()) {
        add_filter('template_include', 'gantry_missing_nag', -10, 0);
    }
    else {
        add_action('admin_notices', 'gantry_admin_missing_nag');
    }
}

// This will always set the Posts Per Page option to 1 to fix the WordPress bug
// when the pagination would return 404 page. To set the number of posts shown
// on the blog page please use the field under Theme Settings > Content > Blog > Post Count
function gantry_posts_per_page() {
    if(get_option('posts_per_page') != '1') update_option('posts_per_page', '1');
}

add_action('init', 'gantry_posts_per_page');