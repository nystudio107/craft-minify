<?php
/**
 * Minify plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

/**
 * Minify config.php
 *
 * This file exists only as a template for the Minify settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'minify.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [

    // if set to `true` then Minify will not minify anything
    "disableTemplateMinifying" => false,

    // if set to `true` then Minify will not minify anything if `devMode` is enabled
    "disableDevModeMinifying" => false,

];
