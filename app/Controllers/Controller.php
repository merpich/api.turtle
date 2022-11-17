<?php

namespace App\Controllers;

class Controller
{
	public function index()
	{
		echo json_encode(["status" => 200]);
	}
}
