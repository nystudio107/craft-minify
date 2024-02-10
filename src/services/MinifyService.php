<?php
/**
 * Minify plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify\services;

use Craft;
use craft\base\Component;
use JSMin\JSMin;
use Minify_CSSmin;
use Minify_HTML;
use nystudio107\minify\Minify;

/**
 * Minify service
 *
 * @author    nystudio107
 * @package   Minify
 * @since     1.2.0
 */
class MinifyService extends Component
{
    private bool $shouldMinify = true;

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        if (Minify::$plugin->getSettings()->disableTemplateMinifying) {
            $this->shouldMinify = false;
        }

        if (Craft::$app->getConfig()->getGeneral()->devMode
            && Minify::$plugin->getSettings()->disableDevModeMinifying) {
            $this->shouldMinify = false;
        }
    }

    /**
     * Minify all the things
     *
     * @param string $htmlText
     *
     * @return string
     */
    public function minify(string $htmlText = ""): string
    {
        if ($this->shouldMinify) {
            $options = [
                'cssMinifier' => '\Minify_CSSmin::minify',
                'jsMinifier' => '\JSMin\JSMin::minify',
            ];
            $htmlText = Minify_HTML::minify($htmlText, $options);
        }

        return $htmlText;
    }

    /**
     * Minify the passed in HTML
     *
     * @param string $htmlText
     *
     * @return string
     */
    public function htmlMin(string $htmlText = ""): string
    {
        if ($this->shouldMinify) {
            $htmlText = Minify_HTML::minify($htmlText);
        }

        return $htmlText;
    }

    /**
     * Minify the passed in CSS
     *
     * @param string $cssText
     *
     * @return string
     */
    public function cssMin(string $cssText = ""): string
    {
        if ($this->shouldMinify) {
            $cssText = Minify_CSSmin::minify($cssText);
        }

        return $cssText;
    }

    /**
     * Minify the passed in JS
     *
     * @param string $jsText
     *
     * @return string
     */
    public function jsMin(string $jsText = ""): string
    {
        if ($this->shouldMinify) {
            $jsText = JSMin::minify($jsText);
        }

        return $jsText;
    }
}
