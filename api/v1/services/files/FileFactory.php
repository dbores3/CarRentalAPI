<?php

include_once 'jsonFile.php';
include_once 'csvFile.php';

/**
 * @desc File factory pattern class
 * @author David Bores
**/

class FileFactory
{	
	// Gets the type of file & returns the respective class
	public static function get($ext)
	{
		$className = $ext . "File";
		if (class_exists($className)) {
			return new $className;
		}

		throw new Exception("Files with {$ext} extension are not valid.");
	}
}