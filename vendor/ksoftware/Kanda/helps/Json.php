<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace helps;


class Json{


	static function encode($param=[])
	{

		if(!is_array($param))
			Exception::getError('Param deve ser um array.');

		header('Content-type::application/Json');
		return json_encode($param);
		

	}

	static function decode($param=[])
	{

		if(!is_array($param))
			Exception::getError('Param deve ser um array.');

		header('Content-type::application/Json');
		return json_decode($param);

	}

}