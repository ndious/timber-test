<?php
require __DIR__ . '/vendor/autoload.php';
ini_set('display_errors', 1);
use Tiimber\ImmutableBag;

class Reducer
{
  protected $state;

  private $nextState;

  public final function init($state = null)
  {
    if ($state !== null) {
      $this->state = new ImmutableBag($state);
    } else {
      $this->state = new ImmutableBag($this->defaultState);
    }
  }

  private final function cleanAction($action)
  {
    if (isset($action['type'])) {
      unset($action['type']);
    }
    return $action;
  }

  protected final function __clone()
  {
    $state = [];
    foreach($this->state as $key => $value) {
      $state[$key] = $value;
      if (isset($this->nextState[$key])) {
        $state[$key] = $this->nextState[$key];
      }
    }
    $this->state = new ImmutableBag($state);
    $this->nextState = null;
  }


  public final function __invoke($state, $action)
  {
    $this->init($state);
    $this->onAction($this, $action);
    return clone $this;
  }
}

class ObjectReducer extends Reducer
{
  public function __construct($action = null)
  {
    if ($action !== null) {
      $action = $this->cleanAction($action);
      $this->state = new ImmutableBag($action);
    }
  }

  protected final function assign($params)
  {
    $this->nextState = $this->cleanAction($params);
    return $this;
  }

  public function __get($property)
  {
    return $this->state->get($property);
  }
}

class CollectionReducer
{
  public $defaultState = [];

  const DELETE = 'delete_row';

  protected final function map($callback)
  {
    $this->nextState = [];
    foreach($this->state as $key => $value) {
      $this->nextState[$key] = $callback($value, $key);
    }
    return clone $this;
  }
}

class Article extends ObjectReducer 
{
  public $defaultState = [
    'title' => '',
    'author' => '',
  ];

  public function onAction($state, $action) 
  {
    switch ($action['type']) {
      case 'ADD_ARTICLE':
        return new self($action);
      case 'CHANGE_ARTICLE_TITLE':
        return $state->assign([
          'title' => $action['title'],
        ]);
      default:
        return $state;
    }
  }
}
$article = new Article();

class Articles extends CollectionReducer
{
  public function onAction($state = [], $action)
  {
    switch ($action['type']) {
      case 'ADD_ARTICLE':
        return [
          $article(null, $action),
        ];
      
      default:
        return $state;
    }
  }
};

$reducer = new Articles();

$store = \Rb\Redux\Store::create($reducer, []);

$store->dispatch([
  'type' => 'ADD_ARTICLE',
  'title' => 'Blabla',
  'author' => 'nduf',
]);

var_dump($store->getState());