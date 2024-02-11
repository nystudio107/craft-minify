<?php
/**
 * Minify plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify;

use Craft;
use craft\base\Plugin;
use nystudio107\minify\models\Settings;
use nystudio107\minify\services\ServicesTrait;
use nystudio107\minify\twigextensions\MinifyTwigExtension;

/**
 * Class Minify
 *
 * @author    nystudio107
 * @package   Minify
 * @since     1.2.0
 *
 * @method Settings getSettings()
 */
class Minify extends Plugin
{
    // Traits
    // =========================================================================

    use ServicesTrait;

    /**
     * @var Minify
     */
    public static $plugin;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;
        $this->name = $this->getName();

        // Add in our Twig extensions
        Craft::$app->view->registerTwigExtension(new MinifyTwigExtension());

        Craft::info(
            Craft::t(
                'minify',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
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

    // Protected Methods
    // =========================================================================

    /**
     * @return Settings
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }
}
