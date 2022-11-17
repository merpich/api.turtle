<?php

namespace Core\Services;

abstract class Controller
{
	abstract protected function __construct();
	abstract protected function launch();
}
