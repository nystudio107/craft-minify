<?php
/**
 * Minify plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify\services;

use craft\helpers\ArrayHelper;
use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Minify
 * @since     1.2.13
 *
 * @property  MinifyService $minify
 */
trait ServicesTrait
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, array $config = [])
    {
        // Merge in the passed config, so it our config can be overridden by Plugins::pluginConfigs['vite']
        // ref: https://github.com/craftcms/cms/issues/1989
        $config = ArrayHelper::merge([
            'components' => [
                'minify' => MinifyService::class,
            ],
        ], $config);

        parent::__construct($id, $parent, $config);
    }

    /**
     * Returns the helper service
     *
     * @return MinifyService The helper service
     * @throws InvalidConfigException
     */
    public function getMinify(): MinifyService
    {
        return $this->get('minify');
    }
}
