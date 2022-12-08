<?php

namespace Core;

use \Firebase\JWT\JWT;

class Helper
{
	public static function dump($array)
	{
		echo "<pre>";
			print_r($array);
		echo "</pre>";
	}

	public static function get_data()
	{
		return json_decode(file_get_contents("php://input"), true);
	}

	public static function send_data($data)
	{
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	public static function create_JWT($data)
	{
		date_default_timezone_set("Etc/GMT+3");

		$key = "franky_is_my_turtle";
		$payload = [
			"iss" => "http://api.turtle",
			"aud" => "http://localhost:3000",
			"iat" => time(),
			"nbf" => time(),
			"data" => $data
		];

		$token = JWT::encode($payload, $key, "HS256");
		return $token;
	}
}
