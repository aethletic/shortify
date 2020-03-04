<?php

/**
 * Класс для работы с базой данных
 */
class DB
{
	public static function init()
	{
		$factory = new \Database\Connectors\ConnectionFactory();
		return $factory->make(array(
		    'driver'    => 'sqlite',
		    'database' => __DIR__ . '/../../database/database.sqlite',
		));
	}
}
