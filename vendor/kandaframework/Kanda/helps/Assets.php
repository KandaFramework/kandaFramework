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

	public function __construct(){

		$this->begin();
		return $this;
	}

	public function begin(){

		if(!empty($this->css)){
			$this->Copy($this->js);
		}

		if(!empty($this->js)){
			$this->Copy($this->js);
		}
	}

	private function Copy($files)
	{

	     //pagegado as pastas do assets default		
		$scandir= scandir($this->base);
		unset($scandir[0],$scandir[1]);


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
			$new = $this->dirName().$value;
			
			if(!file_exists($new)) 
				copy($default,$new);
			
		}

	}
	
	public function dirName()
	{
		return ASSETS.$this->basename.DS;
	}
	
	public function createDir($dirname){

		$dirname = ASSETS.$dirname;

		if(!is_dir($dirname))	 	
			mkdir($dirname);
		
		return $dirname;
	}

	
}