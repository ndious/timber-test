<?php
namespace Blog\Pages;

use Tiimber\View;
use Blog\Layouts\BasicLayout;

class ArticlePage extends View
{
  const EXTEND = BasicLayout::class;

  const EVENTS = [
    'request::article::index',
    'error::*',
  ];
  
  const TPL = <<<HTML
<p>hello {{planet}}.</p>
HTML;

  public function render(): string
  {
    return [
      'planet' => 'article'
    ];
  }
}