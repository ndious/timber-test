<?php
namespace Blog\Components\Blocks;

use Tiimber\Renderer\Base\Block;

class NavigationBlock extends Block
{
  const SCOPE = 'Basic';

  public function render(): string
  {
    return <<<HTML
<nav>
  Ceci est une nav
</nav>
HTML;
  }
}
