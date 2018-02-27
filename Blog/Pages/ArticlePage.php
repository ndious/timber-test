<?php
namespace Blog\Pages;

use Tiimber\Renderer\Base\View;
use Blog\Layouts\BasicLayout;

class ArticlePage extends View
{
  const EXTEND = BasicLayout::class;

  const EVENTS = [
    'request::article::index'
  ];

  public function render(): string
  {
    $planet = 'article';

    return <<<HTML
<p>hello {$planet}.</p>
HTML;
  }
}
