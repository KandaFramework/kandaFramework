<?php

use kanda\helpers\Url;
use kanda\fileupload\FileUpload;

 
echo FileUpload::widget('file',[
	'conditions'=>[
			'url' => Url::toRouter(['/']),
		],
	'extra'=>[
	]	
	]);