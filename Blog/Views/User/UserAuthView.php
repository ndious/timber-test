<?php
namespace Blog\Views\User;

use Tiimber\View;
use Tiimber\Http\{Request, Response};

class UserAuthView extends View
{
  const EVENTS = [
    'render::navigation' => 'login'
  ];

  const TPL = <<<EOF
{{#user}}
  <b>Hello {{username}}!</b>
{{/user}}
{{^user}}
  <form method="post" action="/user/auth">
    <input type="text" name="username" placeholder="Username">
    <button type="submit">Submit</button>
  </form>
{{/user}}
EOF;

  private $session;

  public function onCall(Request $req, Response $res)
  {
    $this->session = $req->getSession();
  }

  public function render(): array
  {
    return [
      'user' => $this->session->has('user'),
      'username' => $this->session->get('user')
    ];
  }
}
