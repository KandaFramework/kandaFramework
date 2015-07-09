<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace helps;


class Json{


	static function encode($param=[],$header=true)
	{

		if(!is_array($param))
			Exception::getError('Param deve ser um array.');

		if($header)
			header('Content-type::application/Json');

		return json_encode($param);
		

	}

	static function decode($param=[],$header=true)
	{

		if(!is_array($param))
			Exception::getError('Param deve ser um array.');

		if($header)
			header('Content-type::application/Json');
		
		return json_decode($param);

	}

}