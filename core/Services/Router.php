<?php

namespace Core\Services;

use Error;

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
	 * @param string $uri
	 * @param array $controller
	 * @return void
	 */
	public static function api($uri, $controller)
	{
		self::$routes[] = [
			"uri" => $uri,
			"controller" => $controller[0],
			"method" => $controller[1]
		];
	}

	/**
	 * Method of enabling routes
	 *
	 * @return void
	 */
	public static function enable()
	{
		isset($_GET["query"]) ? $query = $_GET["query"] : $query = "";

		foreach (self::$routes as $route) {
			if ($route["uri"] === "/" . $query) {
				try {
					$method = $route["method"];
					$controller = new $route["controller"]();
					$controller->$method();
				} catch (Error $e) {
					echo "Controller " . $route["controller"] . " does not exists: " . $e->getMessage();
				}
				die();
			}

			http_response_code(404);
		}
	}
}
