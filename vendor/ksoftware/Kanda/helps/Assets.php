<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace helps;



class Assets{

	public $base = '/assets/';

	public $basename = '';

	public $css = [];

	public $js = [];

	public $dirname = '';

	protected static $public = '';

	
	public  function init(){


		if(!empty($this->css)){
			$this->Copy($this->css);
		}

		if(!empty($this->js)){
			$this->Copy($this->js);
		}
	}

	private function Copy($files)
	{
		static::$public = '';
	    
		$this->createDir($this->basename);
 	
		$path = realpath($this->base);

		$count = strlen($this->base);

		$objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
		foreach($objects as $path){
		  
		  if(in_array(substr($path->getPathName(),$count),$files))
		     {

		     	$dir  = explode(DS,$path->getPathName());
		     	$filename = end($dir);
		     	array_pop($dir);
		     	$newdir = implode(DS,$dir);
		     	$newdir = substr($newdir,$count);
		     	$new = $this->basename.DS.$newdir;

		     	$dir = $this->createDir($new);
 				copy($path->getPathName(),$this->dirName().$newdir.DS.$filename);

		     }

		}

		die;
	    //criando o path assets do pulbic
		$src = function($array,$src){
				
				static::$public .= Html::script(null,['src'=>'/assets/'.$this->basename.'/'.$src])."\n"	;

		};
    	array_reduce($files,$src,null);

		if(isset(Session::getSession()->EndAssets))
		static::$public .= Html::script(Session::getSession()->EndAssets)."\n";
 	
 	 }

	
	public function dirName(){
		return ASSETS.$this->basename.DS;
	}
	
	public function createDir($dirname){

		$dirname = ASSETS.$dirname;

		if(!is_dir($dirname))	 	
			mkdir($dirname);
		
		return $dirname;
	}

	 
	static function end(){
			
	    Session::clear('EndAssets');		
		return static::$public;

	}

	
}