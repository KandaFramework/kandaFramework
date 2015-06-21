<?php
namespace wideImage;

use wideImage\WideImage_Image;
use wideImage\Operation\WideImage_Operation_Resize;

 /**
 * @author Gasper Kozak
 * @copyright 2007-2011

    This file is part of WideImage.
		
    WideImage is free software; you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation; either version 2.1 of the License, or
    (at your option) any later version.
		
    WideImage is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.
		
    You should have received a copy of the GNU Lesser General Public License
    along with WideImage; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

	* @package Internals
  **/
	
	/**
	 * @package Exceptions
	 */
	class WideImage_UnknownImageOperationException extends WideImage_Exception {}
	
	/**
	 * Operation factory
	 * 
	 * @package Internals
	 **/
	class WideImage_OperationFactory
	{
		static protected $cache = array();
		
		static function get($operationName)
		{
			$lcname = strtolower($operationName);
			if (!isset(self::$cache[$lcname]))
			{
				$opClassName = "WideImage_Operation_" . ucfirst($operationName);
				 
                                
                                $Class =  __NAMESPACE__."\\Operation\\".$opClassName;
                                
				self::$cache[$lcname] = new $Class;
			}
			return self::$cache[$lcname];
		}
	}
