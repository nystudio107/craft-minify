<?php
/**
 * Minify plugin for Craft CMS 3.x
 *
 * Some Description
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

/**
 * Minify config.php
 *
 * Completely optional configuration settings for Minify if you want to
 * customize some of its more esoteric behavior, or just want specific control
 * over things.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'minify.php' and
 * make your changes there.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [

    // if set to `true` then Minify will not minify anything
    "disableTemplateMinifying" => false,

    // if set to `true` then Minify will not minify anything if `devMode` is enabled
    "disableDevmodeMinifying" => false,

];
