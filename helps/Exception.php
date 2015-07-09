<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace helps;


class Exception{

	  public static function getError($message,$error=1)
	  {
 		throw new Exception($message, $error);
	  }


}