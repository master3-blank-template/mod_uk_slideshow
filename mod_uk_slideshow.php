<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_slideshow
 * @copyright   Copyright (C) 2019 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Helper\ModuleHelper;

$vars = [
    'slideshow_class', 'item_class',
    'dotnav', 'slidenav', 'animation', 'velocity', 'autoplay', 'autoplay_interval', 'finite', 'pause_on_hover', 'index', 'ratio', 'min_height', 'max_height',
    'items'
];

foreach ($vars as $var) {
    $$var = $params->get($var);
}

$slideshow_class = trim($slideshow_class) ? ' ' . trim($slideshow_class) : '';
$item_class = trim($item_class);

$sw_params = [];
if (!$min_height && !$max_height && $ratio != '') $sw_params[] = 'ratio:' . $ratio;
if ($min_height) $sw_params[] = 'min-height:' . (int)$min_height;
if ($max_height) $sw_params[] = 'max-height:' . (int)$max_height;
$sw_params[] = 'animation:' . $animation;
if ((int)$velocity > 1) $sw_params[] = 'velocity:' . (int)$velocity;
if ($autoplay) {
    $sw_params[] = 'autoplay:true';
    if ((int)$autoplay_interval != 7000 && (int)$autoplay_interval > 0) $sw_params[] = 'autoplay_interval:' . (int)$autoplay_interval;
}
if ($finite) $sw_params[] = 'finite:true';
if ($pause_on_hover) $sw_params[] = 'pause-on-hover:true';
if ((int)$index > 0) $sw_params[] = 'index:' . (int)$index;
$sw_params = $sw_params ? '="' . implode(';', $sw_params) . '"' : '';

if ($items) {
    require(ModuleHelper::getLayoutPath('mod_uk_slideshow', $params->get('layout', 'default')));
}
