<?php
namespace Blog\Actions\CatalogueType;

const ADD_ELEMENT = '@@elem/ADD_IN_CATALOGUE';
function addElement($price, $name, $desc) {
  return [
    'type' => ADD_ELEMENT,
    'price' => $price,
    'name' => $name,
    'desc' => $desc,
  ];
}
