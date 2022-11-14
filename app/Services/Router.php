<?php

namespace App\Services;

class Router
{
	private static $routes = [];

	public static function api($uri, $page_name)
	{
		self::$routes[] = [
			"uri" => $uri,
			"api" => $page_name
		];
	}

	public static function enable()
	{
		$query = $_GET["q"];

		foreach (self::$routes as $route) {
			if ($route["uri"] === "/" . $query) {
				die();
			}
		}

		http_response_code(404);
	}
}
