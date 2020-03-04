<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/bootstrap.php';

$rows = DB::init()->table('links')->get();

foreach ($rows as $row) {
    if (App::isExpiredDate($row['expire_date'])) {
        DB::init()->table('links')->where('code', '=', $row['code'])->delete();
        Logger::info("Удалена короткая ссылка - {$row['code']}");
    }
}
