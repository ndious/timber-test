<?php
namespace Blog\Actions\User;

use Tiimber\Action;
use Tiimber\Http\{Request, Response};
use Tiimber\Traits\LoggerTrait;

class AuthAction extends Action
{
  use LoggerTrait;

  const EVENTS = [
    'request::user::auth'
  ];

  public function onPost(Request $req, Response $res)
  {
    $this->info($req->getPost()->get('username'));
    $req->getSession()->set('user', $req->getPost()->get('username'));
    $res->redirect('/');
  }
}
