<?php
namespace LeagueWrap\Facade;

use LeagueWrap;

class Champion extends Facade {

	/**
	 * The champion api class to be used for all requests.
	 *
	 * @var Api\Champion
	 */
	protected static $champion = null;

	public static function __callStatic($method, $arguments)
	{
		if (self::$champion instanceof LeagueWrap\Api\Champion)
		{
			return call_user_func_array([self::$champion, $method], $arguments);
		}
		else
		{
			self::$champion = Api::champion();
			return call_user_func_array([self::$champion, $method], $arguments);
		}
	}

	/**
	 * Set the champion api to null.
	 *
	 * @return void
	 */
	public static function fresh()
	{
		self::$champion = null;
	}
	
}
