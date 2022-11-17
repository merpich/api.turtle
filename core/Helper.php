<?php

namespace App;

class Helper
{
	public static function dump($array)
	{
		echo "<pre>";
			print_r($array);
		echo "</pre>";
	}
}
