<?php
/**
 * Minify plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify\twigextensions;

use nystudio107\minify\Minify;

/**
 * Minify twig node parser
 *
 * @author    nystudio107
 * @package   Minify
 * @since     1.2.0
 */
class Minify_Node extends \Twig_Node
{
    // Properties
    // =========================================================================


    // Public Methods
    // =========================================================================

    /**
     * @param \Twig_Compiler $compiler
     *
     * @return null
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $html = $this->getAttribute('html');
        $css = $this->getAttribute('css');
        $js = $this->getAttribute('js');

        $compiler
            ->addDebugInfo($this);

        $compiler
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("\$_compiledBody = ob_get_clean();\n");

        if ($html)
        {
            $compiler
                ->write("echo " . Minify::className() . "::\$plugin->minify->htmlMin(\$_compiledBody);\n");
        }
        elseif ($css)
        {
            $compiler
                ->write("echo " . Minify::className() . "::\$plugin->minify->cssMin(\$_compiledBody);\n");
        }
        elseif ($js)
        {
            $compiler
                ->write("echo " . Minify::className() . "::\$plugin->minify->jsMin(\$_compiledBody);\n");
        }
        else
        {
            $compiler
                ->write("echo " . Minify::className() . "::\$plugin->minify->minify(\$_compiledBody);\n");
        }

    }
}
