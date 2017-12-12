<?php
namespace Blog\Pages;

use Tiimber\View;

use Blog\Layouts\BasicLayout;

class IndexPage extends View
{
  const EXTEND = BasicLayout::class;

  const EVENTS = [
    'request::index',
    'error::*',
  ];

  public function render(): string
  {
    $planet = 'world';

    return <<<HTML
<p>hello $planet.</p>
HTML;
  }
}
