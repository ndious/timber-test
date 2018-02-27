<?php
namespace Blog\Layouts;

use Tiimber\Renderer\Base\View;

use Blog\Components\BasicComponents;

class BasicLayout extends View
{
  use BasicComponents;

  public function render(): string
  {
    $this->setState(['test' => 'yeah']);

    return <<<HTML
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
      {$this->props->children}
    </div>
    <Footer propsParam={test} />
  </body>
</html>
HTML;
  }

}
