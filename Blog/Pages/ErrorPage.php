<?php
namespace Blog\Pages;

use Tiimber\View;

use Blog\Layouts\BasicLayout;

class ErrorPage extends View
{
  const EXTEND = BasicLayout::class;

  const EVENTS = [
    'error::500',
  ];

  public function render(): string
  {
    return <<<HTML
<h1>Oups an error has been raised.</h1>
<p>{$this->props->error}</p>
HTML;
  }
}
