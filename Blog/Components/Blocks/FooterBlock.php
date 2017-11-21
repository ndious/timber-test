<?php
namespace Blog\Components\Blocks;

use Tiimber\View;

class FooterBlock extends View
{ 
  public function render(): string
  {
    return  <<<HTML
<footer>
  {{yolo}} {{id}}
</footer>
HTML;
  }
}