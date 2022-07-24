<?php

	namespace Api\Services\Files;

	/**
	 * @desc Abstract File class
	 * @author David Bores
	**/

	abstract class File
	{
		abstract public function read();
	}