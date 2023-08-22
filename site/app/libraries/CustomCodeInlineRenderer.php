<?php

namespace app\libraries;

use League\CommonMark\Node\Inline\AbstractInline;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Extension\CommonMark\Renderer\Inline\CodeRenderer;
use League\CommonMark\Renderer\HtmlRenderer;

class CustomCodeInlineRenderer implements NodeRendererInterface {
    /** @var \League\CommonMark\Extension\CommonMark\Renderer\Inline\CodeRenderer */
    protected $baseRenderer;

    public function __construct() {
        $this->baseRenderer = new CodeRenderer();
    }

    public function render(Node $inline, ChildNodeRendererInterface $htmlRenderer) {
        setcookie("inline","0");
        $element = $this->baseRenderer->render($inline, $htmlRenderer);
        $attrs = [
            "class" => "inline-code hljs"
        ];
        return new HtmlElement('code', $attrs, $element);
    }
}
