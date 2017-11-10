<?php
namespace Blog\Reducers\Catalogue;

use const Blog\Actions\CatalogueType\{ADD_ELEMENT};

$elements = function ($store, $action) {
  switch ($action['type']) {
    case ADD_ELEMENT:
      return array_merge(
        $store,
        [
          'price' => $price,
          'name' => $name,
          'desc' => $desc,
        ]
      );
    default:
      return $store;
  }
};

function getReducer()
{
  return $elements;
}
