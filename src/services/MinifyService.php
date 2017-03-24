<?php
/**
 * Minify plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify\services;

use nystudio107\minify\Minify;
use nystudio107\minify\models\Settings;

use Craft;
use craft\base\Component;

/**
 * Minify service
 *
 * @author    nystudio107
 * @package   Minify
 * @since     1.2.0
 */
class MinifyService extends Component
{

    private $shouldMinify = true;

    /**
     * @inheritdoc
     */
    public function init()
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
    public function minify($htmlText = "")
    {
        if ($this->shouldMinify) {
            $options = [
                'cssMinifier' => '\Minify_CSSmin::minify',
                'jsMinifier' => '\JSMin::minify',
            ];
            $htmlText = \Minify_HTML::minify($htmlText, $options);
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
    public function htmlMin($htmlText = "")
    {
        if ($this->shouldMinify) {
            $htmlText = \Minify_HTML::minify($htmlText);
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
    public function cssMin($cssText = "")
    {
        if ($this->shouldMinify) {
            $cssText = \Minify_CSSmin::minify($cssText);
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
    public function jsMin($jsText = "")
    {
        if ($this->shouldMinify) {
            $jsText = \JSMin::minify($jsText);
        }

        return $jsText;
    }
}
