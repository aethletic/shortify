<?php

$router->get('/db', function() {
    echo '<pre>';
    print_r(Stat::getCitiesCount('qq'));
    // print_r(DB::init()->table('links')->get());
    // print_r(Utils::getUserGeoByIP(Utils::getUserIP()));
    echo '</pre>';
});

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
