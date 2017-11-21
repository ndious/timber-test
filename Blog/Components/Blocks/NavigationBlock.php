<?php
namespace Blog\Components\Blocks;

use Tiimber\View;

class NavigationBlock extends View
{ 
  public function render(): string
  {
    return <<<HTML
<nav>
  Ceci est une nav
</nav>
HTML;
  }
}