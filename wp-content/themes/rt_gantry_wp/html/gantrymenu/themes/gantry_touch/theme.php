<?php
/**
 * @version   1.26 September 14, 2012
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
 
class GantryTouchMenuTheme extends AbstractRokMenuTheme {

    protected $defaults = array(

    );

    public function getFormatter($args){
        require_once(dirname(__FILE__).'/formatter.php');
        return new GantryTouchMenuFormatter($args);
    }

    public function getLayout($args){
        require_once(dirname(__FILE__).'/layout.php');
        return new GantryTouchMenuLayout($args);
    }
}
