<?php
namespace Blog\Pages;

use Tiimber\View;

use Blog\Layouts\BasicLayout;

class IndexPage extends View
{
  const EXTEND = BasicLayout::class;

  const EVENTS = [
    'request::*',
    'error::*',
  ];
  
  const TPL = <<<HTML
<p>hello {{planet}}.</p>
HTML;

  public function render(array $params): array
  {
    return [
      'planet' => 'world'
    ];
  }

}