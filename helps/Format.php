<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace kanda\helps;


class Format{

	 /**
	 * Formatando string
	 * @string string Valor a ser formatado
	 * return String formatada	
	 */
	 public static function stringFormat($string){

 		$map = array(
            'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a',
            'é' => 'e', 'ê' => 'e', 'í' => 'i', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ú' => 'u', 'ü' => 'u',
            'ç' => 'c', 'Á' => 'a', 'À' => 'a', 'Ã' => 'a',
            'Â' => 'a', 'É' => 'e', 'Ê' => 'e', 'Í' => 'i',
            'Ó' => 'o', 'Ô' => 'o', 'Õ' => 'o',
            'Ú' => 'u', 'Ü' => 'u', 'Ç' => 'c', '?' => '()');
        $str = str_replace(' ', '-', strtolower($string));
        return strtr($str, $map);


	 }

     public static function dateFormat($date){}


}