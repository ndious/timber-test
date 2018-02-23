<?php
namespace Blog\Pages;

use Tiimber\View;

use Blog\Layouts\BasicLayout;

class ErrorPage extends View
{
  const EXTEND = BasicLayout::class;

  const EVENTS = [
    'error::*',
  ];

  public function render(): string
  {
    return <<<HTML
<p>Oups an error has been raised.</p>
HTML;
  }
}
