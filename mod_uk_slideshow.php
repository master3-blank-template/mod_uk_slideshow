<?php defined('_JEXEC') or die;

$vars = ['moduleclass_sfx', 'dotnav', 'slidenav', 'animation', 'velocity', 'autoplay', 'autoplay_interval', 'finite', 'pause_on_hover', 'index', 'ratio', 'min_height', 'max_height', 'items'];
foreach ($vars as $var)
    $$var = $params->get($var);

$sw_params = [];
if (!$min_height && !$max_height && $ratio != '') $sw_params[] = 'ratio:' . $ratio;
if ($min_height) $sw_params[] = 'min-height:' . (int)$min_height;
if ($max_height) $sw_params[] = 'max-height:' . (int)$max_height;
$sw_params[] = 'animation:' . $animation;
if ((int)$velocity > 1) $sw_params[] = 'velocity:' . (int)$velocity;
if ($autoplay)
{
    $sw_params[] = 'autoplay:true';
    if ((int)$autoplay_interval != 7000 && (int)$autoplay_interval > 0) $sw_params[] = 'autoplay_interval:' . (int)$autoplay_interval;
}
if ($finite) $sw_params[] = 'finite:true';
if ($pause_on_hover) $sw_params[] = 'pause-on-hover:true';
if ((int)$index > 0) $sw_params[] = 'index:' . (int)$index;
if ($sw_params) $sw_params = '="' . implode(';', $sw_params) . '"';
    
require(JModuleHelper::getLayoutPath('mod_uk_slideshow', $params->get('layout', 'default')));