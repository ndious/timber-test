<?php
namespace Blog\Views\User;

use Tiimber\View;
use Tiimber\Http\{Request, Response};

class UserAuthView extends View
{
  const EVENTS = [
    'render::navigation' => 'login'
  ];

  const TPL = <<<HTML
{{#user}}
  <b>Hello {{username}}!</b>
{{/user}}
{{^user}}
  <form method="post" action="/user/auth">
    <input type="text" name="username" placeholder="Username">
    <button type="submit">Submit</button>
  </form>
{{/user}}
HTML;

  private $session;

  public function onCall(Request $req, Response $res)
  {
    $this->session = $req->getSession();
  }

  public function stateToProps(array $state, array $props): array
  {
    return [
      'user' => $state->auth->has('user'),
      'username' => $state->auth->get('user'),
    ];
  }

  public function render(): string
  {
    return <<<HTML
  {{#user}}
    <b>Hello {{username}}!</b>
  {{/user}}
  {{^user}}
    <form method="post" action="/user/auth">
      <input type="text" name="username" placeholder="Username">
      <button type="submit">Submit</button>
    </form>
  {{/user}}
  HTML;
    return [
      'user' => $this->session->has('user'),
      'username' => $this->session->get('user')
    ];
  }
}
