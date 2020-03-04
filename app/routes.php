<?php

// главная страница
$router->get('/', 'HomeController@homePage');

// статистика
$router->get('/stat', 'StatController@statPage');
$router->get('/stat/(.*)', 'StatController@getStat');

// топ
$router->get('/top', 'StatController@topPage');

// работа с фронтом
$router->post('/api/createShortUrl', 'HomeController@createShortUrl');
$router->get('/api/getStatByName/@name', 'StatController@getStatByName');

// роут редиректа, должен быть всегда в конце
$router->get('/(.*)', 'HomeController@redirect');
