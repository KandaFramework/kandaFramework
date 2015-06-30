<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace helps;



class Assets{

	public $basename = '/assets/';

	public $cssbase = '/assets/css/';

	public $jsbase = '/assets/js/';

	private $files = '';

	public function __construct(){



	}

	public function begin(){

		if(is_dir($base)){

		}else{
			mkdir($base);			
		}
	}
	
	public static function setCopy($dir){

		$files = (scandir($dir));

	    if(count($files) == 0)
	    	return true;

	    unset($files[0],$files[1]);

	    foreach ($files as $key => $value) {
	    	 	
	    	 	echo $value.'<br>';
	    	 	
	    }

	}

	public function setCss(){

		print_r(scandir($this->cssbase));

	}
	
	public function setJs(){




	}

 
}