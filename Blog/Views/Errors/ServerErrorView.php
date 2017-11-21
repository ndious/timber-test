<?php

namespace Blog\Views\Errors;

use Tiimber\View;
use Tiimber\Http\{Request, Response};

class ServerErrorView extends View
{
  const EVENTS = [
    'error::500' => 'content'
  ];
  
  const TPL = <<<HTML
<div>{{message}}</div>
<pre>{{stack}}</pre>
HTML;

  private $error;
  
  public function onCall(Request $req, Response $res)
  {
    $this->error = $req->getArgs()->get('error');
  }
  
  public function render(): string
  {
    return  <<<HTML
<div>{{message}}</div>
<pre>{{stack}}</pre>
HTML;
    return [
      'message' => $this->error->getMessage(),
      'stack' => $this->error->getTraceAsString()
    ];
  }
}