<?php defined('_JEXEC') or die;
/*
 * @package     mod_uk_slideshow
 * @copyright   Copyright (C) 2019 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

?>

<div class="mod_uk_slideshow uk-position-relative<?php echo $slideshow_class; ?>" data-uk-slideshow<?php echo $sw_params; ?>>
    <ul class="uk-slideshow-items">
        <?php
        foreach ($items as $item)
        {
            $item_slide_class = trim($item->class) ? ' ' . trim($item->class) : '';
            $item_class = $item_class || $item_slide_class ? ' class="' . $item_class . $item_slide_class . '"' : '';
        ?>
        <li<?php echo $item_class; ?>>
            
            <?php if ($item->img_bg) { ?>
            <img src="<?php echo $item->img_bg; ?>" alt="<?php echo $item->title; ?>" data-uk-cover>
            <?php } ?>

            <div class="uk-container uk-position-relative uk-height-1-1 uk-flex uk-flex-middle<?php if ($item->pos && !$item->img_front) echo ' uk-flex-right'; ?>">
                
                <?php if ($item->img_front) { ?>
                <div class="uk-height-1-1 uk-child-width-1-2@s" data-uk-grid>
                                        
                    <?php if ($item->pos) { ?>
                    <div class="uk-flex uk-flex-middle uk-flex-center uk-visible@s">
                        <img src="<?php echo $item->img_front; ?>" alt="<?php echo $item->title; ?>">
                    </div>
                    <div class="uk-flex uk-flex-middle">
                        <div>
                    <?php } else { ?>
                    <div class="uk-flex uk-flex-middle">
                        <div>
                    <?php } ?>
                    
                <?php } else { ?>

                <div class="uk-width-2-3@m">
                
                <?php } ?>
                    
                    
                    <?php if ($item->title) { ?>
                    <h3><?php echo $item->title; ?></h3>
                    <?php } ?>

                    <?php if ($item->content) { ?>
                    <div><?php echo $item->content; ?></div>
                    <?php } ?>

                    <?php if ($item->link) { ?>
                    <div class="uk-margin-small-top"><a class="uk-button uk-button-primary" href="<?php echo $item->link; ?>"><?php echo $item->link_text; ?></a></div>
                    <?php } ?>
                    
                <?php if ($item->img_front) { ?>
                    <?php if ($item->pos) { ?>
                        </div>
                    </div>
                    <?php } else { ?>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-middle uk-flex-center uk-visible@s">
                        <img src="<?php echo $item->img_front; ?>" alt="<?php echo $item->title; ?>">
                    </div>
                    <?php } ?>
                <?php } ?>
                
                </div>

            </div>

        </li>
        <?php } ?>
    </ul>

    <?php if ($slidenav) { ?>
    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous data-uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next data-uk-slideshow-item="next"></a>
    <?php } ?>

    <?php if ($dotnav) { ?>
    <div class="uk-position-bottom-center uk-position-small">
        <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
    </div>
    <?php } ?>

</div>
