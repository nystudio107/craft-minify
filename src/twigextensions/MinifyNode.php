<?php
/**
 * Minify plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify\twigextensions;

use nystudio107\minify\Minify;
use Twig\Compiler;
use Twig\Node\Node;

/**
 * Minify twig node parser
 *
 * @author    nystudio107
 * @package   Minify
 * @since     1.2.0
 */
class MinifyNode extends Node
{
    // Public Methods
    // =========================================================================

    /**
     * @param Compiler $compiler
     */
    public function compile(Compiler $compiler): void
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

        if ($html) {
            $compiler
                ->write("echo " . Minify::class . "::\$plugin->minify->htmlMin(\$_compiledBody);\n");
        } elseif ($css) {
            $compiler
                ->write("echo " . Minify::class . "::\$plugin->minify->cssMin(\$_compiledBody);\n");
        } elseif ($js) {
            $compiler
                ->write("echo " . Minify::class . "::\$plugin->minify->jsMin(\$_compiledBody);\n");
        } else {
            $compiler
                ->write("echo " . Minify::class . "::\$plugin->minify->minify(\$_compiledBody);\n");
        }
    }
}
