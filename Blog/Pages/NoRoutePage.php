<?php
namespace Blog\Pages;

use Tiimber\View;
use Blog\Layouts\BasicLayout;

class NoRoutePage extends View
{
  const EXTEND = BasicLayout::class;

  const EVENTS = [
    'error::404',
  ];

  public function render(): string
  {
    return <<<HTML
<p>Page not found</p>
HTML;
  }
}
