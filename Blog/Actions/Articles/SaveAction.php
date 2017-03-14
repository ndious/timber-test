<?php

namespace Blog\Actions\Articles;

use Tiimber\Action;
use Tiimber\Http\{Request, Response};

use RedBeanPHP\R;

class SaveAction extends Action
{
  const EVENTS = [
    'request::article::show'
  ];
  
  private function prepare($id)
  {
    if ($id !== 0) {
      $this->article = R::load('article', $id);
    } else {
      $this->article = R::dispense('article');
    }
  }
  
  public function onPost(Request $req, Response $res)
  {
    $this->prepare((integer)$req->getArgs()->get('id'));

    $this->article->title = $req->getPost()->get('title');
    $this->article->content = $req->getPost()->get('content');
    $this->article->status = true;

    $id = R::store($this->article);
    $res->redirect('/article/'.$id);
  }
}