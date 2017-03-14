<?php
namespace Blog\Views\Articles;

use Tiimber\View;
use Tiimber\Exceptions\ViewException;
use Tiimber\Http\{Request, Response};

use RedBeanPHP\R;

class ShowView extends View
{

  const EVENTS = [
    'request::article::show' => 'content'
  ];

  const TPL = <<<EOF
{{#user}}
  <form method="post">
    <input type="hidden" name="id" value="{{article.id}}">
    <p><input type="text" name="title" placeholder="Title" value="{{article.title}}"></p>
    <p><textarea name="content">{{article.content}}</textarea></p>
    <p><button type="submit">Submit</button></p>
  </form>
{{/user}}
{{^user}}
  <h1>{{article.title}}</h1>
  <p>{{article.content}}</p>
{{/user}}
EOF;

  private $article;
  private $logged;

  public function onGet(Request $req, Response $res)
  {
    $this->article = R::load('article', (integer)$req->getArgs()->get('id'));
    $this->logged = $req->getSession()->has('user');

    if ($this->article->id !== 0 && $this->logged) {
      $this->raise(ViewException::NOT_FOUND);
    }
  }

  public function render(): array
  {
    return ['article' => $this->article, 'user' => $this->logged];
  }
}
