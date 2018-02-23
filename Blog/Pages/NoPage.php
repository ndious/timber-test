<?php
namespace Blog\Pages;

use Tiimber\View;
use Blog\Layouts\BasicLayout;

class NoPage extends View
{
  const EXTEND = BasicLayout::class;

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
