<?php
require __DIR__ . '/vendor/autoload.php';
ini_set('display_errors', 1);
use Blog\Application;
(new Application())->start();
