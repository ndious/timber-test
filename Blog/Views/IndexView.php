<?php
namespace Blog\Views;

use Tiimber\View;

class IndexView extends View
{
  const EVENTS = [
    'request::index' => 'content'
  ];

  const TPL = <<<HTML
<p>hello {{planet}}.</p>
HTML;

  public function render(): string
  {
    return <<<HTML
<p>hello {{planet}}.</p>
HTML;
    return ['planet' => 'earth'];
  }
}
