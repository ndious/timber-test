<?php
namespace Blog;

use Tiimber\Traits\{ApplicationTrait as Tiimber, ServerTrait as Server};
use Tiimber\Loggers\SysLogger as Logger;

use Rb\Redux\{Store, Reducer\ComposedReducer};

use RedBeanPHP\R;

use function Blog\Reducers\Catalogue\getReducer;

class Application
{
  use Tiimber;
  use Server;
  
  private function prepare()
  {
    $this->setRoot(dirname(__DIR__));
    $this->setCacheFolder(dirname(__DIR__) . '/cache');
    R::setup();
    $this->setHost('0.0.0.0');
    $this->setPort(9083);
    (new Logger());
  }

  private function declareStore()
  {
    $reducer = new ComposedReducer();
    $reducer->addReducer('catalogue', getReducer());
    Store::create($reducer, ['catalogue' => []]);
  }

  public function start()
  {
    $this->prepare();
    $this->chop();
    $this->info('Serveur listening at 0.0.0.0:9083');
    $this->runHttpServer($this->runApp());
  }
}
