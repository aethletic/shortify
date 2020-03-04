<?php

/**
 * Основной класс приложения
 */
class App
{
	/**
	 * Создание ссылки
	 *
	 * @param string	$fullUrl	Исходная ссылка
	 * @param string	$code		Короткий код (идентификатор)
	 * @param int		$expire 	Срок действия ссылки (1 - один день, 2 - неделя, 3 - месяц, 0 - бессконечно)
	 *
	 * @return array
	 */
	public static function createShortUrl($fullUrl, $code, $expire)
	{
		switch ($expire) {
		    case 0:
		        $expire_name = "Бессконечно";
		        $expire_date = 0;
		        break;
		    case 1:
		        $expire_name = "1 минута";
				$expire_date = strtotime("+1 minute", time());
		        break;
		    case 2:
		        $expire_name = "5 минут";
				$expire_date = strtotime("+5 minute", time());
		        break;
			case 3:
		        $expire_name = "30 минут";
				$expire_date = strtotime("+30 minute", time());
		        break;
			case 4:
		        $expire_name = "1 час";
				$expire_date = strtotime("+1 hour", time());
		        break;
		    case 5:
		        $expire_name = "День";
				$expire_date = strtotime("+1 day", time());
		        break;
			case 6:
		        $expire_name = "Неделя";
				$expire_date = strtotime("+1 week", time());
		        break;
			case 7:
		        $expire_name = "Месяц";
				$expire_date = strtotime("+1 month", time());
		        break;
		}

		$insertData = [
			'full_url' => $fullUrl, // исходная ссылка на которую происходит редирект с короткой ссылки
			'code' => $code, // код (идентификатор) короткой ссылки
			'create_date' => time(), // дата создания ссылки
			'expire_id' => $expire, // идентификатор срока действия ссылки
			'expire_name' => $expire_name, // просто хардом забиваем название и читаем на фронте
			'expire_date' => $expire_date, // дата истечения сроки действия ссылки
			'clicks' => 0, // кол-во переходов по ссылке (клики)
			'visitors' => '{}', // json массив с данными пользователей перешедших по ссылке
		];

		DB::init()->table('links')->insert($insertData);

		return [
			'shortUrl' => Utils::getBaseUrl() . '/' . $code,
			'statUrl' => Utils::getBaseUrl() . '/stat/' . $code,
		];
	}

	/**
	 * Проверка на существование кода (идентификатора) короткой ссылки в базе данных
	 * @param string $code Код (идентификатор)
	 */
	public static function existCode($code)
	{
		return DB::init()->table("links")->where("code", "=", $code)->count();
	}

	/**
	 * Получить исходную ссылку по её коду (идентификатору)
	 *
	 * @param string $code Код (идентификатор)
	 */
	public static function getFullUrlByCode($code)
	{
		return DB::init()->table('links')->select('full_url')->where('code', '=', $code)->get()[0]['full_url'];
	}

	/**
	 * Проверка срока даты
	 *
	 * @param int $expireDate Timestamp expire_date из БД
	 *
	 * @return bool
	 */
	public static function isExpiredDate($expireDate) {
		if ($expireDate == 0) { // ноль - это бесконечнный срок
			return false;
		}

		$diff = $expireDate - time();
		return $diff < 0 ? true : false;
	}

	/**
	 * Проверка срока даты по коду (идентификатору) короткой ссылки
	 *
	 * @param string Код (идентификатор) короткой ссылки
	 *
	 * @return bool
	 */
	public static function isExpiredUrl($code) {
		$date = DB::init()->table('links')->select('expire_date')->where('code', '=', $code)->get()[0]['expire_date'];
		return self::isExpiredDate($date);
	}

	/**
	 * Удалить из БД всю информацию о ссылке
	 *
	 * @param string Код (идентификатор) короткой ссылки
	 *
	 * @return bool
	 */
	public static function deleteExpiredUrl($code)
	{
		return DB::init()->table('links')->where('code', '=', $code)->delete();
	}
}
