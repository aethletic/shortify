<?php

/**
 * Класс для записи логов
 */
class Logger
{
    private const LOG_DIR = __DIR__ . '/../../vars/logs/cron';

    public static function info($text)
    {
        $text = "[" . date("d.m.Y H:i:s") . "] [info] {$text}\n";
        file_put_contents(self::LOG_DIR . '/log_' . date("d-m-Y") . '.txt', $text, FILE_APPEND);
    }
}
