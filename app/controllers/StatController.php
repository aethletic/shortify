<?php

class StatController
{
    /**
     * Страница со статистикой (только инпут и кнопка)
     */
    public static function statPage()
    {
        return View::render('stat.html');
    }

    /**
     * Страница с топ ссылками
     */
    public static function topPage()
    {
        $topData['top'] = Stat::getTopByVisits(10);
        return View::render('top.html', $topData);
    }

    /**
     * Отображение статистики на странице
     *
     * @param string $shortUrl Короткая ссылка или её код (идентификатор)
     */
    public static function getStat($shortUrl)
    {
    	if (strpos($shortUrl, '/') !== false) {
    		$code = end(explode('/', $shortUrl));
    	} else {
            $code = $shortUrl;
        }

        if (!App::existCode($code) or $code == null) {
    		return View::render('stat.html', [
    			'caption' => 'Oops, whoops!',
    			'message' => 'Данная ссылка не существует либо была удалена.',
    			'error' => true,
    		]);
    	}

    	$statData = Stat::getByCode($code);
        $statData['visitors'] = array_reverse(array_filter(json_decode($statData['visitors'], true))); // переворачиваем массив, чтобы сверху были новые переходы
        $statData['short_url'] = Utils::getBaseUrl() . '/' . $code;
    	$statData['show_stat'] = true; // говорим шаблониазтору показывать блок со статистикой

        $citiesData = Stat::getCitiesCount($code);
        $statData['chartLabels'] = '[' . implode(',', $citiesData['labels']) . ']';
        $statData['chartData'] = '[' . implode(',', $citiesData['data']) . ']';

    	return View::render('stat.html', $statData);
    }
}
