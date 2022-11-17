<?php

namespace App\Services;

use DB\Connect;

class Model extends Connect
{
	/**
	 * Database connection
	 *
	 * @var [type]
	 */
	protected $db_connect;

	public function __construct()
	{
		parent::__construct();
		$this->db_connect = new Connect();
	}
}
