<?php
/**
 * Minify plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify\twigextensions;

use nystudio107\minify\twigextensions\MinifyNode;

/**
 * Minify twig token parser
 *
 * @author    nystudio107
 * @package   Minify
 * @since     1.2.0
 */
class MinifyTokenParser extends \Twig_TokenParser
{
    // Public Methods
    // =========================================================================

    /**
     * Parses {% minify %}...{% endminify %} tags
     *
     * @param \Twig_Token $token
     *
     * @return \nystudio107\minify\twigextensions\MinifyNode
     */
    public function parse(\Twig_Token $token)
    {
        $lineNo = $token->getLine();
        $stream = $this->parser->getStream();

        $attributes = [
            'html' => false,
            'css' => false,
            'js' => false,
        ];

        if ($stream->test(\Twig_Token::NAME_TYPE, 'html')) {
            $attributes['html'] = true;
            $stream->next();
        }

        if ($stream->test(\Twig_Token::NAME_TYPE, 'css')) {
            $attributes['css'] = true;
            $stream->next();
        }

        if ($stream->test(\Twig_Token::NAME_TYPE, 'js')) {
            $attributes['js'] = true;
            $stream->next();
        }

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        $nodes['body'] = $this->parser->subparse([$this, 'decideMinifyEnd'], true);
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        return new MinifyNode($nodes, $attributes, $lineNo, $this->getTag());
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return 'minify';
    }

    /**
     * @param \Twig_Token $token
     *
     * @return bool
     */
    public function decideMinifyEnd(\Twig_Token $token)
    {
        return $token->test('endminify');
    }
}
