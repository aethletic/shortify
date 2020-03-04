<?php

// скрипт подключения всех библиотек и классов

use Bramus\Router\Router;

require __DIR__ . '/../vendor/autoload.php';

$dirs = [
    __DIR__ . '/controllers/*.php',
    __DIR__ . '/models/*.php',
];

foreach ($dirs as $dir) {
    $files = glob($dir);
    foreach ($files as $key => $file) {
        require_once $file;
    }
}

$router = new Router();
