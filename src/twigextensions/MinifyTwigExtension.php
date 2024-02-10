<?php
/**
 * Minify plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify\twigextensions;

use Twig\Extension\AbstractExtension;

/**
 * Minify twig extension
 *
 * @author    nystudio107
 * @package   Minify
 * @since     1.2.0
 */
class MinifyTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName(): string
    {
        return 'minify';
    }

    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array An array of Twig_TokenParserInterface or
     * Twig_TokenParserBrokerInterface instances
     */
    public function getTokenParsers(): array
    {
        return [
            new MinifyTokenParser(),
        ];
    }
}
