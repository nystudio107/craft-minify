<?php
/**
 * Minify plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) nystudio107
 * @license   MIT License https://opensource.org/licenses/MIT
 */

namespace nystudio107\minify\twigextensions;

use Twig\Error\SyntaxError;
use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;

/**
 * Minify twig token parser
 *
 * @author    nystudio107
 * @package   Minify
 * @since     1.2.0
 */
class MinifyTokenParser extends AbstractTokenParser
{
    // Public Methods
    // =========================================================================

    /**
     * Parses {% minify %}...{% endminify %} tags
     *
     * @param Token $token
     *
     * @return MinifyNode
     * @throws SyntaxError
     */
    public function parse(Token $token): MinifyNode
    {
        $lineNo = $token->getLine();
        $stream = $this->parser->getStream();

        $attributes = [
            'html' => false,
            'css' => false,
            'js' => false,
        ];

        if ($stream->test(Token::NAME_TYPE, 'html')) {
            $attributes['html'] = true;
            $stream->next();
        }

        if ($stream->test(Token::NAME_TYPE, 'css')) {
            $attributes['css'] = true;
            $stream->next();
        }

        if ($stream->test(Token::NAME_TYPE, 'js')) {
            $attributes['js'] = true;
            $stream->next();
        }

        $stream->expect(Token::BLOCK_END_TYPE);
        $nodes['body'] = $this->parser->subparse([$this, 'decideMinifyEnd'], true);
        $stream->expect(Token::BLOCK_END_TYPE);

        return new MinifyNode($nodes, $attributes, $lineNo, $this->getTag());
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return 'minify';
    }

    /**
     * @param Token $token
     *
     * @return bool
     */
    public function decideMinifyEnd(Token $token): bool
    {
        return $token->test('endminify');
    }
}
