<?php
/**
 * @version   1.26 September 14, 2012
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
 
class GantrySplitMenuTheme extends AbstractRokMenuTheme {

    protected $defaults = array(
        'fusion_load_css' => 0,
        'fusion_enable_js' => 1,
        'fusion_opacity' => 1,
        'fusion_effect' => 'slidefade',
        'fusion_hidedelay' => 500,
        'fusion_menu_animation' => 'Quad.easeOut',
        'fusion_menu_duration' => 400,
        'fusion_pill' => 0,
        'fusion_pill_animation' => 'Back.easeOut',
        'fusion_pill_duration' => 400,
        'fusion_centeredOffset' => 0,
        'fusion_tweakInitial_x' => 0,
        'fusion_tweakInitial_y' => 0,
        'fusion_tweakSubsequent_x' => 0,
        'fusion_tweakSubsequent_y' => 0,
        'fusion_enable_current_id' => 0
    );

    public function getFormatter($args){
        require_once(dirname(__FILE__).'/formatter.php');
        return new GantrySplitMenuFormatter($args);
    }

    public function getLayout($args){
        global $gantry;
        require_once(dirname(__FILE__).'/layout.php');
        return new GantrySplitMenuLayout($args);
    }
}
