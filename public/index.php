<?php

ini_set('display_errors', false);
date_default_timezone_set('Europe/Samara');

require __DIR__ . '/../app/bootstrap.php';
require __DIR__ . '/../app/routes.php';

$router->run();
