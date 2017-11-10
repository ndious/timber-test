<?php
namespace Blog\Components\Blocks;

use Tiimber\View;

class FooterBlock extends View
{ 
  const TPL = <<<HTML
<footer>
  {{yolo}} {{id}}
</footer>
HTML;

}