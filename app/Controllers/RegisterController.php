<?php

namespace App\Controllers;

use App\Models\User;
use Core\Helper;

class RegisterController
{
	/**
	 * Input data
	 *
	 * @var array
	 */
	private $data = [];

	public function __construct()
	{
		$this->user = new User();
		$this->data = Helper::get_data();
	}

	public function index()
	{
		$this->create_user($this->data);
	}

	private function create_user()
	{
		$db_data = $this->user->select("nickname", $this->data["nickname"]);

		if (empty($db_data)) {
			$db_data = $this->user->select("email", $this->data["email"]);

			if (empty($db_data)) {
				$this->data["password_hash"] = password_hash($this->data["password"], PASSWORD_BCRYPT);
				$this->user->insert($this->data);

				echo json_encode([
					"status" => 201,
					"message" => "Пользователь создан"
				], JSON_UNESCAPED_UNICODE);
			} else {
				echo json_encode([
					"status" => 401,
					"message" => "Электронная почта уже занята"
				], JSON_UNESCAPED_UNICODE);
			}
		} else {
			echo json_encode([
				"status" => 401,
				"message" => "Никнейм уже занят"
			], JSON_UNESCAPED_UNICODE);
		}
	}
}
