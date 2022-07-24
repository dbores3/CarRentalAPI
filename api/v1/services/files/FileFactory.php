<?php

	namespace Api\Services\Files;
	use Exception;

	/**
	 * @desc File factory pattern class
	 * @author David Bores
	**/

	class FileFactory
	{	
		// Gets the type of file & returns the respective class
		public static function get($ext)
		{	
			// Forms the class name & checks if exists
			$className = "Api\Services\Files\\". $ext . "File";
			if (class_exists($className)) {
				return new $className;
			}

			throw new Exception("Files with {$ext} extension are not valid.");
		}
	}