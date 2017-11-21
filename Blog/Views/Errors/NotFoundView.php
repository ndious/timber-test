<?php

namespace Blog\Views\Errors;

use Tiimber\View;

class NotFoundView extends View
{
  const EVENTS = [
    'error::404' => 'content'
  ];
  
  public function render(): string
  {
    return <<<HTML
<div>Page not found</div>
HTML;
  }
}