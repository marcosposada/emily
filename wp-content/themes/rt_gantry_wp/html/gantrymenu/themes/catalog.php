<?php
/**
 * @version   1.26 September 14, 2012
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
require_once(dirname(__FILE__).'/gantry_fusion/theme.php');
GantryWidgetMenu::registerTheme(dirname(__FILE__).'/gantry_fusion','gantry_fusion', __('Gantry Fusion'), 'GantryFusionMenuTheme');
require_once(dirname(__FILE__).'/gantry_splitmenu/theme.php');
GantryWidgetMenu::registerTheme(dirname(__FILE__).'/gantry_splitmenu','gantry_splitmenu', __('Gantry SplitMenu'), 'GantrySplitMenuTheme');
require_once(dirname(__FILE__).'/gantry_touch/theme.php');
GantryWidgetMenu::registerTheme(dirname(__FILE__).'/gantry_touch','gantry_touch', __('Gantry Touch'), 'GantryTouchMenuTheme');