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
				$user_id = $this->user->insert($this->data);
				$user_data = [
					"id" => $user_id,
					"nickname" => $this->data["nickname"],
					"email" => $this->data["email"]
				];
				$token = Helper::create_JWT($user_data);

				http_response_code(201);
				echo json_encode([
					"message" => "Success",
					"token" => $token
				], JSON_UNESCAPED_UNICODE);
			} else {
				echo json_encode([
					"message" => "email"
				], JSON_UNESCAPED_UNICODE);
			}
		} else {
			echo json_encode([
				"message" => "nickname"
			], JSON_UNESCAPED_UNICODE);
		}
	}
}
