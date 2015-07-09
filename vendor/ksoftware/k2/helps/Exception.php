<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace helps;


class Exception{

	  public static getError($message,$error=1)
	  {
 		throw new Exception($message, $error);
	  }


}