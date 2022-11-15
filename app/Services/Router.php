<?php

namespace App\Services;

use Error;
use Exception;

class Router
{
	/**
	 * List of routes
	 *
	 * @var array
	 */
	private static $routes = [];

	/**
	 * Method of creating route
	 *
	 * @param [type] $uri
	 * @param [type] $controller
	 * @return void
	 */
	public static function api($uri, $controller)
	{
		self::$routes[] = [
			"uri" => $uri,
			"controller" => $controller
		];
	}

	/**
	 * Method of enabling routes
	 *
	 * @return void
	 */
	public static function enable()
	{
		$query = $_GET["q"];

		foreach (self::$routes as $route) {
			if ($route["uri"] === "/" . $query) {
				try {
					$class = "Api\\Controllers\\" . $route["controller"];
					new $class;
				} catch (Error $e) {
					echo "Controller " . $route["controller"] . " does not exists: " . $e->getMessage();
				}
			}

			http_response_code(404);
		}
	}
}
