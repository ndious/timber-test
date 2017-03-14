<?php

namespace Blog\Views;

use Tiimber\View;
use Tiimber\Http\{Request, Response};

class NavigationView extends View
{
  const EVENTS = [
    'request::*' => 'navigation',
    'error::*' => 'navigation'
  ];
  
  const TPL = <<<EOF
<nav>
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/articles">Show articles</a></li>
    {{#user}}
      <li><a href="/article/new">New article</a></li>
    {{/user}}
    <li>{{{login}}}</li>
  </ul>
</nav>
EOF;

  private $logged;

  public function onCall(Request $req, Response $res) 
  {
    $this->logged = $req->getSession()->has('user');
  }

  public function render(): array
  {
    return [
      'user' => $this->logged
    ];
  }
}