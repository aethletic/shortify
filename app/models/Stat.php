<?php

/**
 * Класс для работы со статистикой
 */
class Stat
{
	/**
	 * Получить данные из БД по коду (идетификатору) короткой ссылки
	 *
	 * @param string $code Код (идентификатор) короткой ссылки
	 *
	 * @return array Информация о короткой ссылке
	 */
	public static function getByCode($code)
	{
		return DB::init()->table('links')->where('code', '=', $code)->get()[0];
	}

	/**
	 * Запись информации о посетителе и увеличение счетчика clicks
	 *
	 * @param string $code Код (идентификатора) короткой ссылками
	 */
	public static function addNewClick($code)
	{
		$db = DB::init();
		$row = $db->table('links')->where('code', '=', $code)->get()[0];

		$userIP = Utils::getUserIP();

		if ($userIP) {
			$geoData = Utils::getUserGeoByIP($userIP);
		} else {
			$userIP = "Unknown IP address";
			$geoData = false;
		}

		$newVisitor['ip'] = $userIP;
		$newVisitor['useragent'] = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown useragent';
		$newVisitor['visit_date'] = time();

		if ($geoData) {
			$newVisitor['city'] = $geoData['geoplugin_city'] ?? 'Unknown city';
			$newVisitor['region'] = $geoData['geoplugin_region'] ?? 'Unknown region';
			$newVisitor['country'] = $geoData['geoplugin_countryName'] ?? 'Unknown country';
			$newVisitor['countryCode'] = $geoData['geoplugin_countryCode'] ?? 'Unknown country code';
		}

		$visitorsData = json_decode($row['visitors'], true);
		$visitorsData[] = $newVisitor;

		$updateData = [
			'clicks' => (int) $row['clicks'] + 1,
			'visitors' => json_encode($visitorsData),
		];

		$db->table('links')->where('code', '=', $code)->update($updateData);
	}

	/**
	 * Получить топ ссылок по переходам
	 *
	 * @param int $count Количество ссылок
	 */
	public static function getTopByVisits($count = 10)
	{
		return DB::init()->table('links')->orderBy('clicks', 'desc')->limit(10)->get();
	}

	/**
	 * Получить данные о городах, для отображения в диаграмме
	 *
	 * @param string $code Код (идентификатора) короткой ссылками
	 *
	 * @return array Массив с городами и их кол-вом
	 */
	public static function getCitiesCount($code)
	{
		$visitors = DB::init()->table('links')->where('code', '=', $code)->select('visitors')->get();

		$cities_data = [];
		$cities_labels = [];

		foreach ($visitors as $visitorRow) {
			$visitorsData = json_decode($visitorRow['visitors'], true);

			foreach ($visitorsData as $visitorData) {
				$label = trim($visitorData['city']) == '' ? 'Unknown' : "{$visitorData['city']} ({$visitorData['country']})";

				$cities_labels[$label] = "'$label'";
				$cities_data[$label] = $cities_data[$label] !== '' ? $cities_data[$label] + 1 : 0;
			}
		}

		$result['data'] = $cities_data;
		$result['labels'] = $cities_labels;

		return $result;
	}
}
