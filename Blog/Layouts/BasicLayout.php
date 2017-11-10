<?php
namespace Blog\Layouts;

use Tiimber\View;

use Blog\Components\BasicComponents;

class BasicLayout extends View
{
  use BasicComponents;

  const TPL = <<<HTML
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tiimber</title>
  </head>
  <body>
    <header>
      <Navigation />
    </header>
    <div>
      {{{ children }}}
    </div>
    <Footer yolo={test} />
  </body>
</html>
HTML;

  public function render(array $state): array
  {
    return [
      'test' => 'Power by tiimber',
    ];
  }

}
