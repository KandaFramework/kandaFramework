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

	
	public function init(){


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
	     //pagegado as pastas do assets default		
		$scandir= scandir($this->base);
		unset($scandir[0],$scandir[1]);

		//criando o path assets do pulbic
		$src = function($array,$src){
				
				static::$public .= Html::script(null,['src'=>'/assets/'.$this->basename.'/'.$src])."\n"	;

		};
    	array_reduce($files,$src,null);

		 
		$basename =  $this->createDir($this->basename);

		foreach ($files as $value)
		{
			
			$path = explode('/',$value);

			if(!empty($path))
			{
				
				foreach ($path as $dir)
				{
					if(in_array($dir, $scandir))
					{
						$this->createDir($this->basename.DS.$dir);
					}
				}
			}	
			
			$default = $this->base.$value;
			 		
			if(!file_exists($this->dirName().$value))
			{
				copy($default,$this->dirName().$value);	
				
			} 
				
			
		}
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