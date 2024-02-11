<?php
/**
 * Minify plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify\services;

use yii\base\InvalidConfigException;

/**
 * @author    nystudio107
 * @package   Minify
 * @since     5.0.0
 *
 * @property  MinifyService $minify
 */
trait ServicesTrait
{
    // Public Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function config(): array
    {
        return [
            'components' => [
                'minify' => MinifyService::class,
            ],
        ];
    }

    // Public Methods
    // =========================================================================

    /**
     * Returns the helper service
     *
     * @return MinifyService The minify service
     * @throws InvalidConfigException
     */
    public function getMinify(): MinifyService
    {
        return $this->get('minify');
    }
}
