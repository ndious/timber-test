<?php
namespace Blog\Components;

use Blog\Components\Blocks\NavigationBlock;
use Blog\Components\Blocks\FooterBlock;

trait BasicComponents
{ 
  public function Navigation()
  {
    return [
      'view' => new NavigationBlock(),
    ];
  }

  public function Footer()
  {
    return [
      'view' => new FooterBlock(),
    ];
  }
}
