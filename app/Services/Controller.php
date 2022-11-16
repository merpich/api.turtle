<?php

namespace App\Services;

abstract class Controller
{
	abstract protected function __construct();
	abstract protected function launch();
}
