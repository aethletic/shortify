<?php

/*
    TODO:
        - сделать топ 10 ссылок по переходам
        - сделать удаление ссылок у которых истек срок через крон
        - выводить на главной странице ссылки добавленные пользовтаелем (хранить инфу в куках?)
*/
class HomeController
{
    /**
     * Домашняя страница
     */
    public static function homePage()
    {
        return View::render('home.html');
    }

    /**
     * Создание короткой ссылки
     */
    public static function createShortUrl()
    {
        // чтение php://input
    	$postData = Utils::getPhpInput();

    	$fullUrl = htmlspecialchars(trim($postData['fullUrl']));
    	$code = htmlspecialchars(trim($postData['code']));
    	$expire = htmlspecialchars(trim($postData['expire']));

        if (!$fullUrl) {
            return Utils::responseJson(['message' => 'Пожалуйста, укажите исходную ссылку', 'error' => true]);
        }

        if (!filter_var($fullUrl, FILTER_VALIDATE_URL)) {
            return Utils::responseJson(['message' => 'Пожалуйста, укажите корректную ссылку, например, https://example.com', 'error' => true]);
        }

        if ($expire == '' or !in_array($expire, range(0, 7))) {
            return Utils::responseJson(['message' => 'Пожалуйста, укажите корректный срок действия', 'error' => true]);
        }

        // удаляем в названии короткой ссылке все знаки кроме букв и цифр
        $code = trim(preg_replace('/[^a-zA-Z0-9]/', '', $code));

    	if (!$code) {
    		$code = Utils::generateCode();
    	}

        if (strlen($code) > 32 or strlen($code) < 2) {
            return Utils::responseJson(['message' => 'Длина имени ссылки от 2 до 32 символа', 'error' => true]);
        }

        // TODO: вынести список в отдельный файл
        $forbiddenCodes = ['stat', 'api', 'admin'];

        if (in_array($code, $forbiddenCodes)) {
            return Utils::responseJson(['message' => 'Имя ссылки (' . $code . ') не может быть использовано', 'error' => true]);
        }

    	if (App::existCode($code)) {
    		return Utils::responseJson(['message' => 'Имя ссылки "' . $code . '" уже используется', 'error' => true]);
    	}

    	$result = App::createShortUrl($fullUrl, $code, $expire);

    	return Utils::responseJson($result);
    }

    /**
     * Перенаправление с короткой ссылки на исходную
     *
     * @param string|null $code Код (идентификатор) ссылки
     */
    public static function redirect($code = null)
    {
    	if (!App::existCode($code) or $code == null) {
    		return View::render('home.html', [
    			'caption' => 'Oops, whoops!',
    			'message' => 'Данная ссылка не существует либо была удалена.',
    			'error' => true,
    		]);
    	}

        // проверяем срок ссылки.
        // если не успел отработать скрипт по крону,
        // то удаляем при вызове ссылки в браузере
        // и обновляем страницу (появится ошибка о том, что ссылка не существует)
        if (App::isExpiredUrl($code)) {
            App::deleteExpiredUrl($code);
            header("Refresh: 0");
        }

        // добавляем информацию о посетителе (ip, useragent, etc...)
        // + увеличиываем счетчик кликов
        Stat::addNewClick($code);

    	$fullUrl = App::getFullUrlByCode($code);
    	header("Location: {$fullUrl}");
    }
}
