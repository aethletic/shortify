<?php

/**
 * Класс шаблонизатора
 */
class View
{
    private static function init()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
        return new \Twig\Environment($loader, [
            'cache' => __DIR__ . '/../../vars/cache/twig',
            'auto_reload' => true,
            'debug' => true,
        ]);
    }

    public static function render($view, $data = [])
    {
        echo self::init()->render($view, $data);
    }
}
