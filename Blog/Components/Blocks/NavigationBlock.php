<?php
namespace Blog\Components\Blocks;

use Tiimber\View;

class NavigationBlock extends View
{ 
  const TPL = <<<HTML
<nav>
  Ceci est une nav
</nav>
HTML;
}