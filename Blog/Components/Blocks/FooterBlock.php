<?php
namespace Blog\Components\Blocks;

use Tiimber\Renderer\Base\Block;

class FooterBlock extends Block
{
  const SCOPE = 'Basic';

  public function render(): string
  {
    return <<<HTML
<footer>
  {$this->props->propsParam}
</footer>
HTML;
  }
}
