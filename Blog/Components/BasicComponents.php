<?php
namespace Blog\Components;

use Blog\Components\Blocks\NavigationBlock;
use Blog\Components\Blocks\FooterBlock;

trait BasicComponents
{
  public function Navigation(): array
  {
    return [
      'view' => NavigationBlock::class,
    ];
  }

  public function Footer(): array
  {
    return [
      'view' => FooterBlock::class,
    ];
  }
}
