<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace kanda\helps;



class Assets{

	public $base = '/assets/';

	public $basename = '';

	public $css = [];

	public $js = [];

	public $dirname = '';

	public $assets = [];

	
	public  function init(){
		
		if(!empty($this->css)){
			$this->Copy($this->css,'css');
		}

		if(!empty($this->js)){
			$this->Copy($this->js,'js');
		}

	  return $this;

	}

	private function Copy($files,$type)
	{
		$src = [];
	    
		$this->createDir($this->basename);
 	
		$path = realpath($this->base);

		$count = strlen($this->base);

		$objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
		
		$i=0;

		$count_file = count($files);

		foreach($objects as $path){
		  
		    if(in_array(substr($path->getPathName(),$count),$files))
		     {


		     	$dir  = explode(DS,$path->getPathName());
		     	$filename = end($dir);
		     	array_pop($dir);
		     	
		     	$newdir = implode(DS,$dir);
		     	
		     	$newdir = substr($newdir,$count);
		     	
		     	$new = $this->basename.DS.$newdir;

		     	$this->createDir($new);
		     	
		     	$copy = $this->dirName().$newdir.DS.$filename;

 				copy($path->getPathName(),$copy);
			 

		     }

		     ++$i;

		}

		$reduce = function($recude,$src)
		{
			$this->assets[] = '/assets/'.$this->basename.'/'.$src;
		};
		array_reduce($files, $reduce,null);
		
		 
		static::createAssets($this->assets,$type);
		return true;

 	 }

 	static function createAssets($src,$type)
 	 {

 	 	if(empty(Session::getSession()->$type))
		{
			Session::setSession([
				  $type => $src,	
			]);
			return true;
		}
		Session::setSession([
				  $type => array_merge(Session::getSession()->$type,$src),	
		]);
		return true;				 

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

	 
	static function end($end=''){
		
		return $end;
	   
	}

	
}