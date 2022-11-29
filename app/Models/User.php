<?php

namespace App\Models;

use Core\Services\Model;
use PDO;

class User extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_users()
	{
		$response = $this->pdo->query("SELECT * FROM `users`");
		return $response->fetchAll(PDO::FETCH_ASSOC);
	}
}
