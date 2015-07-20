<?php
static::$title = 'Bannder';
use kanda\helpers\Url;
use kanda\fileupload\FileUpload;
?>
<style>
 
	ul#Banner li{
		border: 1px solid #ebebeb;
		display: inline-flex;
		height: 150px;
		padding: 10px;
		position: relative;
		width: 260px;
		text-align: center;
		margin-bottom: 10px;
	}
	ul#Banner li:hover  span.banner{
		display: block;
	}

	ul#Banner li span{
		background-color: #ebebeb;
		bottom: 0;
		left: 0;
		position: absolute;
		text-align: center;
		width: 100%;
		cursor: pointer;
		display: none;

	}
</style>
<div class="module">
	<div class="module-head">
		<h3><?php echo static::$title ?></h3>
	</div>
	<div class="module-body">
		<form method="GET" name=" " action="#" class="form-horizontal row-fluid" enctype="multipart/form-data" >
			<fieldset>
				<div class="control-group">
					<label class="control-label" for="nome">Foto</label>
					<div class="controls">
                                          <?php 
                                          echo FileUpload::widget('file',
                                           [
                                             'conditions'=>[
                                              'url'=> Url::toRouter(['banner/file-upload']),
                                                'dataType'=>'json',
                                             ],
                                             'extra'=>[
                                               'done' =>"function (e, data){ $.each(data.result.files, function(index, file) { var img = '<img src=\"'+file.src+'\" />'; $('#Banner').append('<li id=\"'+file.id+'\" >'+img+'</li>')  })}",
			                    ],   
                                               
                                           ]);
                                          ?>
					</div>
				</div>

				<div class="control-group">

					<div id="progress">
						<div class="bar" style="width: 0%;"></div>
					</div>
				</div>
			</fieldset>
		</form> 
		<div>
			<ul id="Banner">
				<?php
				$model = $model->all();

				foreach ($model as $data)
				{
					?>
					<li id="<?php echo $data->id ?>">
						<img width="220" height="140" src="<?php echo $assets.$data->name ?>" alt="" />
						<a href="#" onclick="Delete('<?php echo Url::to(['delete','id'=>$data->id]) ?>');return false;" ><span class="banner">Deletar</span></a>
					</li>
					<?php
				}
				?>
			</ul>
		</div> 	
	</div>
</div>
<script src="/vendor/fileupload/js/vendor/jquery.ui.widget.js" ></script>
<script src="/vendor/fileupload/js/jquery.iframe-transport.js" ></script>
<script src="/vendor/fileupload/js/jquery.fileupload.js" ></script>

<script>

	var Delete = function(url){

		$.get(url,{},function(data){

			if(data.success){
				$('ul#Banner li#'+data.success).fadeOut();
			};

		},'JSON');
	}; 
	 
</script>