<?php
/**
 * Minify plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify;

use Craft;
use nystudio107\minify\twigextensions\MinifyTwigExtension;

/**
 * Minify plugin base class
 *
 * @author    nystudio107
 * @package   Minify
 * @since     1.2.0
 */
class Minify extends \craft\base\Plugin
{

    /**
     * Static property that is an instance of this plugin class so that it can
     * be accessed via Minify::$plugin
     *
     * @var static
     */
    public static $plugin;

    /**
     * Set our $plugin static property to this class so that it can be accessed
     * via Minify::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time
     * initialization here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you
     * automatically; you do not need to load it in your init() method.
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        $this->name = $this->getName();

        // Add in our Twig extensions
        Craft::$app->view->twig->addExtension(new MinifyTwigExtension());
    }

    /**
     * Returns the user-facing name of the plugin, which can override the name
     * in composer.json
     *
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('minify', 'Minify');
    }
}
