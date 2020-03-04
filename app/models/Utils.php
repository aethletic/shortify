<?php

/**
* Утилитарный класс
*/
class Utils
{
	/**
	 * Генерация случайного кода (идентификатора)
	 *
	 * @param int $lenght Длинна кода (идентификатора)
	 *
	 * @return string Код идентификатор
	 */
	public static function generateCode($lenght = 7)
	{
		$chars = array_merge(range('a','z'), range('A','Z'), range(0,9));

		$code = '';

		for ($i = 0; $i < $lenght; $i++) {
			$code .= $chars[array_rand($chars)];
		}

		return $code;
	}

	/**
	 * Получить базовый урл текущего сайта
	 * Пример: https://example.com/
	 *
	 * @return string Базовый урл текущего сайта
	 */
	public static function getBaseURL()
	{
		return sprintf("%s://%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME']);
	}

	/**
	 * Отправить json ответ для фронта
	 */
	public static function responseJson($response = [])
	{
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}

	/**
	 * Получить тело post-запроса
	 *
	 * @return array Тело post-запроса
	 */
	public static function getPhpInput()
	{
		return json_decode(file_get_contents('php://input'), true);
	}

	/**
	 * Получить IP адресс посетителя
	 *
	 * @return string IP адресс посетителя
	 */
	public static function getUserIP() {
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        return $_SERVER['HTTP_CLIENT_IP'];
	    }
	    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        return $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else {
	        return $_SERVER['REMOTE_ADDR'];
	    }
	}

	/**
	 * Получить геопозицию посетителя по его IP адрессу
	 *
	 * @param string IP адресс посетителя
	 *
	 * @return array|bool Массив с данными в случае успеха или false в случае ошибки
	 */
	public static function getUserGeoByIP($ip) {
		if (strpos($ip, ':') !== false or strpos($ip, '.') == false) {
			return false;
		}

		$geoData = json_decode(file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ip), true);

		return $geoData['geoplugin_status'] == 200 ? $geoData : false;
	}
}
